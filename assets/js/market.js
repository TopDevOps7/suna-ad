let orders = [];
let sec_key = "";
let access_key = "";
let cancel_order_confirm;
let bitmart_memo;
let routine_run_flag = false;
let current_repeated_count = 0;
let direction = "sell";
let current_price = 0;
let limit_order = false;
let limit_price = 0;
let min_size = 0;
let max_size = 0;
let min_interval = 0;
let max_interval = 0;
let repeat_count = 0;
let get_routine_interval;

(() => {
  "use strict";
  
  function get_routine_info() {
    $.ajax({
      type: "POST",
      url: rPath + "utils/middle.php",
      dataType: "json",
      data: {get_routine_info: "get_routine_info"},
      success: function(res) {
        routine_run_flag = Number(res.data.routine_run_flag) === 1;
        current_repeated_count = Number(res.data.current_repeated_count);
        direction = res.data.direction;
        limit_order = Number(res.data.limit_order) === 1;
        limit_price = Number(res.data.limit_price);
        min_size = Number(res.data.min_size);
        max_size = Number(res.data.max_size);
        min_interval = Number(res.data.min_interval);
        max_interval = Number(res.data.max_interval);
        repeat_count = Number(res.data.repeat_count);
        change_routine_form();
      },
      error: () => {
        toastr.error("Failed to Get account balance!");
      }
    });
  }

  function change_routine_form() {
    $("#penetration_setting_form label").addClass("focus");
    $("#penetration_setting_form input").attr("disabled", routine_run_flag);
    $("[name=direction]").prop("checked", false);
    $(`#direction_${direction}`).prop("checked", true);
    $("#max_size").val(max_size);
    $("#min_size").val(min_size);
    $("#max_interval").val(max_interval);
    $("#min_interval").val(min_interval);
    $("#limit_price").val(limit_price);
    $(".repeat_count").val(repeat_count);
    $("#limit_order").prop("checked", limit_order);
    // if(limit_order) {
    //   $(".limit_div").removeClass("d-none");
    //   $(".size_div").addClass("d-none");
    // } else {
    //   $(".limit_div").addClass("d-none");
    //   $(".size_div").removeClass("d-none");
    // }
    if (!routine_run_flag) {
      $("#penetration_setting_form button").html("Start");
      $(".process_info_div").addClass("d-none");
      $("#current_price").attr("disabled", true);
    } else {
      $(".process_info_div").removeClass("d-none");
      $("#penetration_setting_form button").html("Cancel Process");
      $("#current_repeated_count").html(current_repeated_count);
      $(".repeat_count").html(repeat_count);
    }
  }

  function getBitmartInfo() {
    $.ajax({
      type: "POST",
      url: rPath + "utils/middle.php",
      dataType: "json",
      data: {get_bitmart_info: "get_bitmart_info"},
      success: function(res) {
        sec_key = res.data.bitmart_secret_key;
        access_key = res.data.bitmart_access_key;
        cancel_order_confirm = Number(res.data.cancel_order_confirm);
        bitmart_memo = res.data.bitmart_memo;
        $("#bitmart_access_key").val(access_key);
        $("#bitmart_secret_key").val(sec_key);
        $("#bitmart_memo").val(bitmart_memo);
        $("#cancel_order_confirm").prop("checked", cancel_order_confirm === 1);
        Redux.init();
        getBalance();
        getTrades();
      },
      error: () => {
        toastr.error("Failed to Get account balance!");
      }
    });
  }
  
  function getTrades() {
    $.ajax({
      type: "GET",
      url: "https://api-cloud.bitmart.com/spot/v2/trades?symbol=REDUX_USDT&order_mode=all",
      headers: {
        "X-BM-KEY": access_key
      },
      dataType: "json",
      async: false,
      success: function(res) {
        let trades = res.data.trades;
        let str_tbody = "";
        let str_status = "";
        let str_action = "";
        trades.map(trade => {
          str_tbody += `<tr>
                          <td class="text-center d-none">${trade.create_time}</td>
                          <td class="text-center">${new Date(trade.create_time).toLocaleString("tr-TR")}</td>
                          <td class="text-center">${trade.symbol}</td>
                          <td class="text-center">${trade.exec_type == "T"? "taker" : "maker"}</td>
                          <td class="text-center">${trade.side}</td>
                          <td class="text-center">${trade.price_avg}${trade.symbol.split("_")[1]}</td>
                          <td class="text-center">${trade.notional}${trade.symbol.split("_")[1]}</td>
                          <td class="text-center">${trade.size}${trade.symbol.split("_")[0]}</td>
                          <td class="text-center">${trade.fees}${trade.fee_coin_name}</td>
                        </tr>`;
        });
        $(".trade_list_container").html(`<div class="table-responsive table-fixed-item">
                                          <span class="info-showing"></span>
                                          <table class="table table-striped" id="trade_table">
                                            <thead>
                                              <tr style="background: white">
                                                <th class="d-none">Time</th>
                                                <th class="c" style="min-width: 110px;">Time</th>
                                                <th class="c">Symbol</th>
                                                <th class="c">Exec Type</th>
                                                <th class="c">Side</th>
                                                <th class="c">Price</th>
                                                <th class="c">Notional</th>
                                                <th class="c">Amount</th>
                                                <th class="c">Fee</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              
                                            </tbody>
                                          </table>
                                        </div>`);
        $("#trade_table tbody").html(str_tbody);
        $("#trade_table").DataTable({
          fnDrawCallback: function (oSettings) {},
          fnInfoCallback: function (oSettings, iStart, iEnd, iMax, iTotal, sPre) {
            let info = iTotal + "/" + iMax + " entries";
            $(".trade_list_container .info-showing").text("");
            $(".trade_list_container .info-showing").html(info);
          },
          drawCallback: function (settings) {
            if (settings.fnRecordsDisplay() < 251) {
              $(".dataTables_wrapper>.row:nth-child(3)").remove();
            }
            var pagination_prev = $(this)
              .closest(".dataTables_wrapper")
              .find("#job_xml_previous");
            if (pagination_prev.hasClass("disabled")) {
              pagination_prev.addClass("non-opacity");
            }
            $(this).find("thead").css({
              position: "sticky",
              top: 0,
              "z-index": 5,
            });
            $(this).find("tbody>tr>td:first-child").css({
              "z-index": 2,
            });
            var pagination_next = $(this)
              .closest(".dataTables_wrapper")
              .find("#job_xml_next");
            if (pagination_next.hasClass("disabled")) {
              pagination_next.addClass("non-opacity");
            }
          },
          order: [[0, "desc"]],
          columnDefs: [
            { targets: "no-sort", orderable: false },
          ],
          autoWidth: false,
          pageLength: 250,
          bLengthChange: false,
          bInfo: true,
          oLanguage: { sSearch: "" },
          fixedColumns: true,
          initComplete: function (settings, json) {
            let top = $('#order_table_wrapper').offset().top + 55;
            $(`#trade_table`).wrap(
              `<div style='overflow:auto; width:100%; max-height: calc(100vh - ${top}px); position:relative;'></div>`
              );
          },
        });
          
      },
      error: () => {
        toastr.error(get_lang("fail_get_trades"))
      }
    });
  }
  
  function cancel_order(order_id) {
    let cur_timestamp = Date.now() * 1000;
    let data = {                    
      "symbol": "REDUX_USDT",
      "order_id": order_id
    }
    let sign_query = cur_timestamp + "#" + bitmart_memo + "#" + JSON.stringify(data);
    let bm_sign = new CryptoJS.HmacSHA256(sign_query, sec_key).toString();
    
    $.ajax({
      type: "POST",
      url: "https://api-cloud.bitmart.com/spot/v3/cancel_order",
      headers: {
        "X-BM-KEY": access_key,
        "X-BM-TIMESTAMP": cur_timestamp,
        "X-BM-SIGN": bm_sign,
      },
      dataType: "JSON",
      contentType: "application/json; charset=utf-8",
      data: JSON.stringify(data),
      async: false,
      success: function(cancel_res) {
        toastr.success(get_lang("success_cancel_order"));
      },
      error: err => toastr.error(get_lang("fail_cancel_order"))
    });
  }
  
  function getBalance() {  
    let timestamp = Date.now();
    let sign = new CryptoJS.HmacSHA256(timestamp + "#BMFH", sec_key);
    $.ajax({
      type: "GET",
      url: "https://api-cloud.bitmart.com/account/v1/wallet",
      headers: {
        "X-BM-KEY": access_key
      },
      dataType: "json",
      success: function(res) {
        if(res.data && res.data.wallet.length) {
          res.data.wallet.map(wa => {
            if(wa.currency == "USDT") {
              $("#available_usdt").html(Math.round(Number(wa.available) * 1000) / 1000);
              $("#frozen_usdt").html(Math.round(Number(wa.frozen) * 1000) / 1000);
            } else if(wa.currency == "REDUX") {
              $("#available_redux").html(Math.round(Number(wa.available) * 1000) / 1000);
              $("#frozen_redux").html(Math.round(Number(wa.frozen) * 1000) / 1000);
            }
          });
        }
      },
      error: () => {
        toastr.error("Failed to Get account balance!");
      }
    });
  }
  
  const $ = window.jQuery;
  const Redux = {
    reduxSocket: null,
    priceSocket: null,
    reduxSign: null,
    orderTable: null,
    orders: {},
    initPriceSocket: function () {
      this.priceSocket = new WebSocket("wss://ws-manager-compress.bitmart.com/api?protocol=1.1");
      this.priceSocket.addEventListener('open', (event)=>{
        this.priceSocket.send(JSON.stringify({
          "op":"subscribe",
          "args":["spot/ticker:REDUX_USDT"]
        }));
      });
      this.priceSocket.onclose = function (event) {
        Redux.initPriceSocket();
      };
  
      this.priceSocket.addEventListener("message", (event) => {
        const data = JSON.parse(event.data);
        if (data.data) {
            $("#current_price").val(Number(data.data[0].last_price).toFixed(4));
        }
      });
    },

    initReduxSocket: function () {
      this.reduxSocket = new WebSocket("wss://ws-manager-compress.bitmart.com/user?protocol=1.1");
      this.reduxSocket.addEventListener('open', (event) => {
        let cur_time = Date.now() * 1000;
        let reduxSign = CryptoJS.HmacSHA256(cur_time + "#" + bitmart_memo + "#" + "bitmart.WebSocket", sec_key).toString(CryptoJS.enc.Hex);
        this.reduxSocket.send(JSON.stringify({
          "op":"login",
          "args":[access_key, cur_time, reduxSign]
        }));
      });
      this.reduxSocket.onclose = function (event) {
        Redux.initReduxSocket();
      };
      this.reduxSocket.addEventListener("message", (event) => {
        if (typeof(event.data) == "string") {
          const data = JSON.parse(event.data);
          if (data.event == "login") {         
            Redux.reduxSocket.send(JSON.stringify({
              "op":"subscribe",
              "args": ["spot/user/order:REDUX_USDT"]
            }));
          }
        } else {
          if (event.data instanceof Blob) {
            let reader = new FileReader();
            reader.onload = (e) => {
              const arrayBuffer = e.target.result;
              const data = new Uint8Array(arrayBuffer);
              try{
                const inflator = new pako.Inflate({raw:true});
                inflator.push(data);
                let new_orders = JSON.parse(new TextDecoder().decode(inflator.result));
                if (new_orders.data && new_orders.data != "") {
                  new_orders.data.map(order_item => {
                    let str_status = `<span class="order_status st_success" data-order_id=${order_item.order_id}>success</span>`;
                    let str_action = `<a class="cancel_order" data-order_id='${order_item.order_id}'>cancel order</a>`;
                    if (order_item.state == 4) {
                      str_action = order_item.state == 4 ? `<a class="cancel_order" data-order_id='${order_item.order_id}'>cancel order</a>` : "";
                      
                    }
                    if(Object.hasOwnProperty.call(Redux.orders, order_item.order_id) && order_item.state != 4) {
                      $(`.cancel_order[data-order_id='${order_item.order_id}']`).parents('tr').remove();
                    } else {
                      Redux.orders[order_item.order_id] = order_item;
                      Redux.orderTable.row.add([Number(order_item.ms_t), new Date(Number(order_item.ms_t)).toLocaleString("tr-TR"), order_item.symbol, order_item.type, order_item.side, Number(order_item.price).toFixed(4), Number(order_item.size).toFixed(1), Number(order_item.filled_size).toFixed(1), str_status, str_action]).draw();
                    }
                    $(".cancel_order").on('click', e => {
                      let order_id = $(e.currentTarget).data("order_id");
                      $("#confirmationCancelOrderModal input#cancel_order_id").val(order_id);
                      $("#confirmationCancelOrderModal").modal("show");          
                    });
                  });
                }
              } catch(err){
                toastr.error(err);
              }
            };
            reader.readAsArrayBuffer(event.data);
          } else {
          }       
        }
      });
    },

    initTable: function () {
      $.ajax({
        type: "GET",
        url: "https://api-cloud.bitmart.com/spot/v3/orders?symbol=REDUX_USDT&order_mode=all&status=4&N=100",
        headers: {
          "X-BM-KEY": access_key
        },
        dataType: "json",
        async: false,
        success: function(res) {
          orders = res.data.orders;
          let str_tbody = "";
          let str_status = "";
          let str_action = "";
          orders.map(order => {
            Redux.orders[order.order_id] = order;
            switch (Number(order.status)) {
              case 4:
                str_status = `<span class="order_status st_success" data-order_id=${order.order_id}>success</span>`;
                break;
              case 5:
                str_status = `<span class="order_status st_part_filled" data-order_id=${order.order_id}>partially filled</span>`;
                break;
              case 6:
                str_status = `<span class="order_status st_full_filled" data-order_id=${order.order_id}>fully filled</span>`;
                break;
              case 8:
                str_status = `<span class="order_status st_canceled" data-order_id=${order.order_id}>canceled</span>`;
                break;
              case 11:
                str_status = `<span class="order_status st_partfill_canceled" data-order_id=${order.order_id}>partially filled, canceled</span>`;
                break;
            
              default:
                break;
            }
            str_action = order.status == 4 ? `<a class="cancel_order" data-order_id='${order.order_id}'>cancel order</a>` : "";
            str_tbody += `<tr data-order_id='${order.order_id}'>
                            <td class="text-center">${order.create_time}</td>
                            <td class="text-center">${new Date(order.create_time).toLocaleString("tr-TR")}</td>
                            <td class="text-center">${order.symbol}</td>
                            <td class="text-center">${order.type}</td>
                            <td class="text-center">${order.side}</td>
                            <td class="text-center">${order.price}</td>
                            <td class="text-center">${order.size}</td>
                            <td class="text-center">${order.filled_size}</td>
                            <td class="text-center order_status_td">${str_status}</td>
                            <td class="text-center order_action">${str_action}</td>
                          </tr>`;
          });
          $(".order_list_container").html(`<div class="table-responsive table-fixed-item">
                                          <span class="info-showing"></span>
                                          <table class="table table-striped" id="order_table">
                                            <thead>
                                              <tr style="background: white">
                                                <th class="c">timestamp</th>
                                                <th class="c" style="min-width: 110px;">Time</th>
                                                <th class="c">Symbol</th>
                                                <th class="c">Type</th>
                                                <th class="c">Side</th>
                                                <th class="c">Order Price</th>
                                                <th class="c">Amount</th>
                                                <th class="c">Filled</th>
                                                <th class="c" style="min-width: 100px;">Status</th>
                                                <th class="c options">Action</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              
                                            </tbody>
                                          </table>
                                        </div>`);
          $("#order_table tbody").html(str_tbody);
          Redux.orderTable = $("#order_table").DataTable({
            fnDrawCallback: function (oSettings) {},
            fnInfoCallback: function (oSettings, iStart, iEnd, iMax, iTotal, sPre) {
              let info = iTotal + "/" + iMax + " entries";
              $(".order_list_container .info-showing").text("");
              $(".order_list_container .info-showing").html(info);
            },
            drawCallback: function (settings) {
              if (settings.fnRecordsDisplay() < 251) {
                $(".dataTables_wrapper>.row:nth-child(3)").remove();
              }
              var pagination_prev = $(this)
                .closest(".dataTables_wrapper")
                .find("#job_xml_previous");
              if (pagination_prev.hasClass("disabled")) {
                pagination_prev.addClass("non-opacity");
              }
              $(this).find("thead").css({
                position: "sticky",
                top: 0,
                "z-index": 5,
              });
              $(this).find("tbody>tr>td:first-child").css({
                "z-index": 2,
              });
              var pagination_next = $(this)
                .closest(".dataTables_wrapper")
                .find("#job_xml_next");
              if (pagination_next.hasClass("disabled")) {
                pagination_next.addClass("non-opacity");
              }
            },
            order: [[0, "desc"]],
            columnDefs: [
              { targets: "no-sort", orderable: false },
            ],
            autoWidth: false,
            pageLength: 250,
            bLengthChange: false,
            bInfo: true,
            oLanguage: { sSearch: "" },
            fixedColumns: true,
            initComplete: function (settings, json) {
              let top = $('#order_table_wrapper').offset().top + 55;
              $(`#order_table`).wrap(
                `<div style='overflow:auto; width:100%; max-height: calc(100vh - ${top}px); position:relative;'></div>`
                );
            },
          });
          $(".cancel_order").on('click', e => {
            let order_id = $(e.currentTarget).data("order_id");
            $("#confirmationCancelOrderModal input#cancel_order_id").val(order_id);
            if (cancel_order_confirm) {
              $("#confirmationCancelOrderModal").modal("show");
            } else cancel_order(order_id);
          });

          $("#confirmationCancelOrderModal #btn_yes").on("click", e => {
            cancel_order($("#confirmationCancelOrderModal input#cancel_order_id").val());
          });
        },
        error: () => {
          toastr.error(get_lang("fail_get_orders"));
        }
      });
    },

    init: function () {
      this.initTable();
      this.initReduxSocket();
      this.initPriceSocket();
    }
  };

  getBitmartInfo();  
  
  $(".nav-tabs .nav-link").on('click', e => {
    $(".tab-section-title").html($(e.currentTarget).data("title"));
    if(e.target.id == "tab_penetration") {
      get_routine_info();
      get_routine_interval = setInterval(() => {
        if(routine_run_flag) get_routine_info();
      }, 2000);
    } else clearInterval(get_routine_interval);
  });
  
  $('#bitmartInfoModal').on('hide.bs.modal', function(e) {
    $("#bitmart_access_key").val(access_key);
    $("#bitmart_secret_key").val(sec_key);
    $("#bitmart_memo").val(bitmart_memo);
    $("#cancel_order_confirm").prop("checked", cancel_order_confirm === 1);
  });
  
  $('form input').on('focus', function(e) {
    $(e.target).parent().find(".rd-input-label").addClass("focus");
  });
  
  $('form input').on('focusout', function(e) {
    if (e.target.value == "" || e.target.value <= 0) {
      $($(`#${e.target.id}`).val(""));
      $(e.target).parent().find(".rd-input-label").removeClass("focus");
    }
  });
  
  $('#change_bitmart_info_form').on('submit', function(e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: rPath + "utils/middle.php",
      dataType: "json",
      data: {
        change_bitmart_info: "change_bitmart_info",
        cancel_order_confirm: $("#cancel_order_confirm").prop("checked") ? 1 : 0,
        bitmart_access_key: $("#bitmart_access_key").val(),
        bitmart_secret_key: $("#bitmart_secret_key").val(),
        bitmart_memo: $("#bitmart_memo").val(),
      },
      success: function(res) {
        location.reload();
      },
      error: () => {
        toastr.error("Failed to change bitmart account info!");
      }
    });
  });
  
  $('#penetration_setting_form input').on('keypress', function(e) {
    $(`#${e.target.id}`).trigger("change");
  });
  
  $('#penetration_setting_form input[type=radio]').on('change', function(e) {
    // if($('#limit_order').attr("checked")) {
      if($("[name=direction]:checked").val() == "buy") {
        $("#limit_price").val(5);
      } else {
        $("#limit_price").val(0.1);
      }
    // }
  });

  // $('#limit_order').on('change', function(e) {
  //   if (e.target.checked) {    
  //     $(".size_div").addClass("d-none");
  //     $(".limit_div").removeClass("d-none");
  //     if($("[name=direction]:checked").val() == "buy") {
  //       $("#limit_price").val(5);
  //     } else {
  //       $("#limit_price").val(0.1);
  //     }
  //   } else {
  //     $(".size_div").removeClass("d-none");
  //     $(".limit_div").addClass("d-none");
  //   }
  // });
  
  $('#penetration_setting_form input').on('change', function(e) {
    let input_ser = $(this).data("input_ser");
    $(`input[data-input_ser='${input_ser}']`).removeClass("errorMsg");
  });
  
  $('#penetration_setting_form').on('submit', function(e) {
    e.preventDefault();
    if(routine_run_flag) {
      $.ajax({
        type: "POST",
        url: rPath + "utils/middle.php",
        dataType: "json",
        data: {stop_routine: "stop_routine"},
        success: function(res) {
          routine_run_flag = false;
          change_routine_form();
        },
        error: () => {
          toastr.error("Failed to start routine!");
        }
      });
    } else {
      direction = $("[name=direction]:checked").val();
      // limit_order = $("#limit_order").prop("checked");
      limit_price = Number($("#limit_price").val());
      min_size = Number($("#min_size").val());
      max_size = Number($("#max_size").val());
      min_interval = Number($("#min_interval").val());
      max_interval = Number($("#max_interval").val());
      repeat_count = Number($("#repeat_count").val());
      let valid = true;
      // if (!limit_order && min_size <= 0) {
      if (min_size <= 0) {
        $("#min_size").addClass("errorMsg");
        valid = false;
      }
      // if (!limit_order && max_size <= 0) {
      if (max_size <= 0) {
        $("#max_size").addClass("errorMsg");
        valid = false;
      }
      if (min_interval <= 0) {
        $("#min_interval").addClass("errorMsg");
        valid = false;
      }
      if (max_interval <= 0) {
        $("#max_interval").addClass("errorMsg");
        valid = false;
      }
      // if (limit_order && limit_price <= 0.1) {
      if (limit_price <= 0.1) {
        $("#limit_price").addClass("errorMsg");
        valid = false;
      }
      if (repeat_count < 1) {
        $("#repeat_count").addClass("errorMsg");
        valid = false;
      }
      // if (!limit_order && min_size > max_size) {
      if (min_size > max_size) {
        $("#min_size").addClass("errorMsg");
        $("#max_size").addClass("errorMsg");
        valid = false;
      }
      if (min_interval > max_interval) {
        $("#min_interval").addClass("errorMsg");
        $("#max_interval").addClass("errorMsg");
        valid = false;
      }
      if (!valid) return;
    
      routine_run_flag = true;
      change_routine_form();
      let penetration_data = {
        start_routine: "start_routine",
        direction,
        limit_order,
        repeat_count,
        min_size,
        max_size,
        min_interval,
        max_interval,
        limit_price
      };
      
      $.ajax({
        type: "POST",
        url: rPath + "utils/middle.php",
        dataType: "json",
        data: penetration_data,
        success: function(res) {
        },
        error: () => {
          toastr.error("Failed to start routine!");
        }
      });
    }
  
  });
  
  $('#trading_setting_form').on('submit', function(e) {
    e.preventDefault();
    let order_type = $("[name=order_type]:checked").val();
    let start_price = Number($("#price").val());
    let steps = Number($("#steps").val());
    let size = Number($("#size").val());
    let order_count = Number($("#order_count").val());
    if (order_type == "sell" && start_price - steps * order_count <= 0) {
      $("#price").addClass("errorMsg");
      $("#steps").addClass("errorMsg");
      $("#order_count").addClass("errorMsg");
      return;
    }
    let order_params = [];
    for(let i = 0; i < order_count; i ++) {
      order_params.push({
        "symbol":"REDUX_USDT",
        "size": size,
        "price": order_type == "buy" ? start_price + steps * i : start_price + steps * i,
        "side": order_type,
        "type":"limit_price"
      });
    }
    let cur_timestamp = Date.now() * 1000;
    let data = {                    
      "order_params": order_params
    }
    let sign_query = cur_timestamp + "#BMFH#" + JSON.stringify(data);
    let bm_sign = new CryptoJS.HmacSHA256(sign_query, sec_key).toString();
    
    $.ajax({
      type: "POST",
      url: "https://api-cloud.bitmart.com/spot/v2/batch_orders",
      headers: {
        "X-BM-KEY": access_key,
        "X-BM-TIMESTAMP": cur_timestamp,
        "X-BM-SIGN": bm_sign,
      },
      dataType: "JSON",
      contentType: "application/json; charset=utf-8",
      data: JSON.stringify(data),
      async: false,
      success: function(res) {
        if(res.code == 1000) {
          $("#price").val("");
          $("#steps").val("");
          $("#size").val("");
          $("#order_count").val("");
          toastr.success(get_lang("create_order_success"));
          $(".rd-input-label").removeClass("focus");
          setTimeout(() => {
            $("#tab_order").addClass("active");
            $("#tab_step").removeClass("active");
            $("#order_list_tab").addClass("active");
            $("#order_setting").removeClass("active");
            $(".tab-section-title").html("Open Order");
          }, 100);
        }
      },
      error: err => {
        if (err.responseJSON.code == 51011) toastr.error(get_lang("order_size_err"));
      }
    });
  
  });
  
  $('#price').on('keypress', function(e) {
    $('#price').trigger("change");
  });
  
  $('#steps').on('keypress', function(e) {
    $('#steps').trigger("change");
  });
  
  $('#order_count').on('keypress', function(e) {
    $('#order_count').trigger("change");
  });
  
  $('#price').on('change', function(e) {
    $("#price").removeClass("errorMsg");
    $("#steps").removeClass("errorMsg");
    $("#order_count").removeClass("errorMsg");
  });
  
  $('#steps').on('change', function(e) {
    $("#price").removeClass("errorMsg");
    $("#steps").removeClass("errorMsg");
    $("#order_count").removeClass("errorMsg");
  });
  
  $('#order_count').on('change', function(e) {
    $("#price").removeClass("errorMsg");
    $("#steps").removeClass("errorMsg");
    $("#order_count").removeClass("errorMsg");
  });
})(window);