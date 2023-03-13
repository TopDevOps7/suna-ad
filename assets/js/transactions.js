function getLastUpdateTime() {
  $.ajax({
    url: rPath + "utils/middle.php",
    type: "POST",
    async: false,
    dataType: "json",
    data: {
      getLastUpdateTime: "getLastUpdateTime",
    },
    success: (res) => {
      if (res == 'notime') {
        $("#last_update_time").html("Transaction list is not updated in latest days!");
      } else {
        let date = new Date(res + " UTC");
        date = date.toLocaleString("tr-TR");
        $("#last_update_time").html(date.slice(0, -3));
      }
    },
    error: () => console.log("Failed to get last update time of transaction list!")
  });
}

function updateTransactions() {
  $.ajax({
    url: rPath + "utils/middle.php",
    type: "POST",
    async: false,
    dataType: "json",
    data: {
      update_transaction_list: "update_transaction_list",
    },
    success: (res) => {
      toastr.success(get_lang('transaction_update_success')); 
      getTransactions();  
    },
    error: () => toastr.error(get_lang('transaction_update_fail'))
  });
}

function commify(n) {
  let parts = n.toString().split(".");
  let numberPart = parts[0];
  let decimalPart = "";
  let thousands = /\B(?=(\d{3})+(?!\d))/g;
  
  if (parts.length > 1) {
    if (numberPart == 0) {
      if (Number(n) < 0.001) {
        decimalPart = (String(Math.round(n * 100000) / 100000)).split(".")[1];
      } else {
        decimalPart = (String(Math.round(n * 1000) / 1000)).split(".")[1];
      }
    } else {
      decimalPart = (String(Math.round(n * 100) / 100)).split(".")[1];
    }
    decimalPart = "." + decimalPart;
  }

  return numberPart.replace(thousands, ",") + decimalPart;
}

function getTransactions() {
  $.ajax({
    url: rPath + "utils/middle.php",
    type: "POST",
    async: false,
    dataType: "json",
    data: {
      getTransactions: "getTransactions",
    },
    success: (res) => {
      if(res.length) {
        let str_tbody = "";
        res.map(trans => {
          if((trans.symbol == "BUSD" || trans.symbol == "BSC-USD" || trans.symbol == "USDC") && trans.transaction_type == "purchase") {
            str_tbody += `<tr>
                            <td class="text-center">${trans.datetime.slice(0, -3)}</td>
                            <td><a href="https://bscscan.com/tx/${trans.hash}" target="_blank" style="cursor: pointer;" data-html="true" data-bs-toggle='tooltip' title='View Transaction'>${trans.hash}</a></td>
                            <td>${trans.fromAddress}</td>
                            <td>${trans.toAddress}</td>
                            <td class="text-center">${commify(trans.quantity)}</td>
                            <td class="text-center">${trans.symbol == "BSC-USD" ? "USDT" : trans.symbol}</td>
                          </tr>`;
          }
        });
        
        $(".transaction_list_container").html(`<div class="table-responsive table-fixed-item">
                                                  <span class="info-showing"></span>
                                                  <table class="table table-striped" id="transaction_table">
                                                    <thead>
                                                      <tr style="background: white">
                                                        <th class="c" style="min-width: 110px;">Date</th>
                                                        <th class="c">TxID</th>
                                                        <th class="c">From</th>
                                                        <th class="c">To</th>
                                                        <th class="c">Quantity</th>
                                                        <th class="c">Currency</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>                                                      
                                                    </tbody>
                                                  </table>
                                                </div>`);
        $("#transaction_table tbody").html(str_tbody);
        $("#transaction_table").DataTable({
          fnDrawCallback: function (oSettings) {},
          fnInfoCallback: function (oSettings, iStart, iEnd, iMax, iTotal, sPre) {
            let info = iTotal + "/" + iMax + " entries";
            $(".transaction_list_container .info-showing").text("");
            $(".transaction_list_container .info-showing").html(info);
          },
          drawCallback: function (settings) {
            if (settings.fnRecordsDisplay() < 251) {
              $(".dataTables_paginate").hide();
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
            let top = $('#transaction_table_wrapper').offset().top + 65;
            $(`#transaction_table`).wrap(
              `<div style='overflow:auto; width:100%; max-height: calc(100vh - ${top}px); position:relative;'></div>`
              );
            top = top + 140;
            $('.page_container').attr('style', `padding-bottom: 0px !important; min-height: calc(100vh - ${top}px) !important;`);
          },
        });
        $("#transaction_table tbody td:first-child a").mouseenter(function() {
          let tooltip = $(this).attr("aria-describedby");
          let $tip = $(`#${tooltip}`);
          $tip
              .css({ opacity: 1 })
              .find(".tooltip-arrow")
              .attr(
                  "style",
                  `border-top-color: #001c40 !important`
              );
          $tip
              .find(".tooltip-inner")
              .css({ backgroundColor: "#001c40" });
        });
        setTimeout(() => {
          $(".spinner-container").addClass("d-none");
          $(".spinner-container").removeClass("visible");
          getLastUpdateTime(); 
        }, 100);
      }
    },
    error: () => {
      console.log("Failed to update transaction list!");
    }
  });
}

$(document).ready(function() {
  getTransactions();
  $("#update_transaction_list").on("click", e => {
    $(".spinner-container").removeClass("d-none");
    $(".spinner-container").addClass("visible");
    setTimeout(() => {
      updateTransactions();
    }, 200);
  });
});
