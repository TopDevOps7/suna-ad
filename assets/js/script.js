$( document ).ready(function() {
  exchanger();
  getLivePrice();
  $("#totalTokenResult").html("= 0.0000 REDUX");
  // document.getElementById("totalTokenResult").innerHTML = ("= " + "0.0000" + " REDUX");
});

var usdtLivePrice ;
var btcLivePrice;
var bnbLivePrice;
var ethLivePrice;
var liveprice = {
    "async": true,
    "scroosDomain": true,
    "url": "https://api.coingecko.com/api/v3/simple/price?ids=bitcoin%2Cethereum%2Ctether%2Cbinancecoin&vs_currencies=usd",

    "method": "GET",
    "headers": {}
};
function getLivePrice(){
  $.ajax(liveprice).done(function (response){
    usdtLivePrice = response.tether.usd;
    btcLivePrice = response.bitcoin.usd;
    bnbLivePrice = response.binancecoin.usd;
    ethLivePrice = response.ethereum.usd;
  });
}

function exchanger() {
  var SelectedCurrency = $("#currencybtn").text();
  var currentTokenPrice = $("#currentprice").text();
  var toBeConvertedValue = $("#totalCoinValue").val();

  if (SelectedCurrency == "USDT") {
    var bnbValue = (usdtLivePrice * toBeConvertedValue) / currentTokenPrice;
    var resultValue = parseFloat(bnbValue).toFixed(2);
    document.getElementById("totalTokenResult").innerHTML = ("= " + resultValue + " REDUX");
  } else if (SelectedCurrency == "BNB") {
    var bnbValue = (bnbLivePrice * toBeConvertedValue) / currentTokenPrice;
    var resultValue = parseFloat(bnbValue).toFixed(2)
    document.getElementById("totalTokenResult").innerHTML = ("= " + resultValue + " REDUX");
  } else if (SelectedCurrency == "ETH") {
    var bnbValue = (ethLivePrice * toBeConvertedValue) / currentTokenPrice;
    var resultValue = parseFloat(bnbValue).toFixed(2)
    document.getElementById("totalTokenResult").innerHTML = ("= " + resultValue + " REDUX");
  } else if (SelectedCurrency == "BTC") {
    var bnbValue =(btcLivePrice * toBeConvertedValue) / currentTokenPrice;
    var resultValue = parseFloat(bnbValue).toFixed(2)
    document.getElementById("totalTokenResult").innerHTML = ("= " + resultValue + " REDUX");
  } else {
    var bnbValue = 0;
  }
}

$('.dropdown-menu span').click(function() {
  $('#currencybtn').text($(this).text());
  exchanger();
  getLivePrice();
});

$('input#totalCoinValue').on('input', function() {
  exchanger();
  getLivePrice();
});

$('#currencybtn').text("USDT");

$('input#totalCoinValue').keydown(function(e) {
  if(e.which == 13) { return false; }
});

$('#address').click(function(e) {
  navigator.clipboard.writeText($("#address_text").text());
  
  $("#address").removeClass("fa-copy");
  $("#address").addClass("fa-check");
  setTimeout(() => {
    $("#address").removeClass("fa-check");
    $("#address").addClass("fa-copy");
  }, 1000);
});

$('#redux-news').owlCarousel({
  loop:true,
  margin:20,
  nav:true,
  dots:false,
  autoplay:true,
    autoplayTimeout:2000,
    autoplayHoverPause:true,
  responsiveClass:true,
  responsive:{
    0:{
        items:1,
        nav: false,
    },
    481:{
      items:2,
      nav: false,
    },
    768:{
        items:3,
    }
  }
});

$(document).ready(function() {
  // Gets the video src from the data-src on each button
  let $videoSrc;
  let video_showing = false;
  $('.video-btn').click(function() {
    $videoSrc = $(this).data("src");
  });

  document.addEventListener("keydown", function(e) {
    if (video_showing && e.key === "Escape") {
      $('#redux-video .btn-close').trigger('click');
    }
  });
  // when the modal is opened autoplay it
  $('#redux-video').on('shown.bs.modal', function(e) {
    // set the video src to autoplay and not to show related video. Youtube related video is like a box of chocolates... you never know what you're gonna get
    $("#video").attr('src', $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");
    video_showing = true;
  })

  // stop playing the youtube video when I close the modal
  $('#redux-video').on('hide.bs.modal', function(e) {
    // a poor man's stop video
    video_showing = false;
    $("#video").attr('src', $videoSrc);
  });

  if(rPath == "./" && page == "vote2.php") {
    let products = {};
    $.ajax({
      type: "POST",
      url: rPath + "utils/middle.php",
      data: { get_products: "get_products"},
      dataType: "json",
      success: function(res){
        let str_products = "";
        res.data.map(pro => {
          products[pro.id] = pro;
          str_products += `<div class="col-lg-4 col-md-4 col-sm-12 text-center" style="">
                              <p style="color:white; border-radius:30px 30px 0 0;" class="greensec m-0 p-3 fs-3">${pro.name}</p>
                              <img class="img-fluid" src="${rPath}assets/images/${pro.image}" alt="Reduxlogo">
                              <a href=""><button type="button" class="btn site-btn my-2 w-100 btn_vote" data-bs-dismiss="modal" style="border-radius:0 !important;" data-id="${pro.id}">Vote</button></a>
                          </div>`;
        });
        $("#productions").html(str_products);
        $(".btn_vote").on("click", e => {
          $("#voteTwitterModal #product_id").val($(e.currentTarget).data('id'));
          $("#voteTwitterModal").modal("show");
        });
        $("#twitter_username").keydown(function(e) {
          if(e.which == 13) { $("#vote_product_form").trigger("submit"); }
        });
        $("#vote_product_form #btn_ok").on("click", e => {
          $("#vote_product_form").trigger("submit");
        });
        $("#twitter_username").on("keyup", e => {
          $("#twitter_username").removeClass("errorMsg");
        });
        $('#twitter_username').on('change', function(e) {
          $("#twitter_username").removeClass("errorMsg");
      });
        $("#vote_product_form").on("submit", e => {
          e.preventDefault();
          if($("#twitter_username").val() == "") {
            $("#twitter_username").addClass("errorMsg");
            return;
          }
          $.ajax({
            type: "POST",
            url: rPath + "utils/middle.php",
            data: { vote_product: "vote_product",
                    id: $("#voteTwitterModal #product_id").val(),
                    username: $("#twitter_username").val()
                  },
            dataType: "json",
            success: function(res){
              if(res.success) {
                $(".vote_success").show();
                $(".exist_twitter").hide();
              } else {
                $(".exist_twitter").show();
                $(".vote_success").hide();                
              }
              $("#voteTwitterModal").modal("hide");
              $("#voteTwitterModal #product_id").val("");
              $("#twitter_username").val("");
              $("#voteConfirmModal").modal("show");
            },
            error: e => {
              toastr.error("Failed to vote!");
            }
          });
        });
      },
      error: e => {
        toastr.error("Failed to get Products!");
      }
    });
    $.ajax({
      type: "POST",
      url: rPath + "utils/middle.php",
      data: { get_products_status: "get_products_status"},
      dataType: "json",
      success: function(res){
        let str_status = `<p style="" class="m-0 fs-3">STATUS</p><hr class="">`;
        res.data.map(st => {
          str_status += `<div class="progress mt-3" role="progressbar" aria-label="Success Animated striped example" aria-valuenow="${st.value == 0? 0.1 : st.value}" aria-valuemin="0" aria-valuemax="100" style="height: 30px;">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: ${st.value == 0? 0.1 : st.value}%"> ${st.name}  </div>
                        </div>`;
        });
        $("#voteStatus").html(str_status);
      },
      error: e => {
        toastr.error("Failed to get Products Status!");
      }
    });
  }

  if(rPath == "../" && page == "index.php") {
    let id = localStorage.getItem("news_id");
    $("#news_id").val(id);
    if (id > 0) {
      $.ajax({
        type: "POST",
        url: rPath + "utils/middle.php",
        data: { get_news: "get_news", news_id: id},
        dataType: "json",
        success: function(res){
          $("#en-title").val(res.data.en_title);
          $("#de-title").val(res.data.de_title);
          $("#en-short").val(res.data.en_news_short);
          $("#de-short").val(res.data.de_news_short);
          $("#en-long").val(res.data.en_news_complete);
          $("#de-long").val(res.data.de_news_complete);
          if(res.data.expired) $("#news_expired").val(res.data.expired);
          $("#news_img").attr("src", "../" + res.data.image);
          $("#news_img").removeClass("d-none");
        },
        error: e => {
          toastr.error("Failed to get News!");
        }
      });
      $(".subtitle").html("Update News");
      $("#btn_update").html("Update News");
    }
  }

  $('#newsImgUpload').on('change', function(e) {
    let id = localStorage.getItem("news_id");
    if (id > 0) {
      $("#news_img").attr('src', "");
      $("#news_img").addClass("d-none");
    }
  });
  // document ready
});

function getTimeRemaining(endtime) {
  var t = Date.parse(endtime) - Date.parse(new Date());
  var seconds = Math.floor((t / 1000) % 60);
  var minutes = Math.floor((t / 1000 / 60) % 60);
  var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
  var days = Math.floor(t / (1000 * 60 * 60 * 24));
  return {
      'total': t,
      'days': days,
      'hours': hours,
      'minutes': minutes,
      'seconds': seconds
  };
}

function initializeClock(id, endtime) {

  function updateClock(id) {
      var t = getTimeRemaining(endtime);
      $(`#${id} .days`).html(t.days);
      $(`#${id} .hours`).html(('0' + t.hours).slice(-2));
      $(`#${id} .minutes`).html(('0' + t.minutes).slice(-2));
      $(`#${id} .seconds`).html(('0' + t.seconds).slice(-2));
      if (t.total <= 0) {
          clearInterval(timeinterval);
      }
  }

  updateClock(id);
  var timeinterval =  setInterval(() => {
      updateClock(id);
    }, 1000);
}

var deadline = new Date(Date.parse("2022-12-01T12:00:00+01:00")); // for endless timer
initializeClock('countdown', deadline);
initializeClock('countdown1', deadline);


$('#verificationForm').on('submit', function(e) {
  e.preventDefault();
  let value = $("#verification_input").val();
  $.ajax({
    type: "POST",
    url: rPath + "utils/middle.php",
    data: { verification: "verification", value },
    dataType: "json",
    success: function(res){
      $('#verificationConfirmModal').modal('show');
      $(".value").html(value);
      if(res.success) {
        if (res.channels.length == 1) {
          $(".channel_info").html(res.channels[0] + " - " + res.notes[0] + ".");
        } else {
          let channel_info_str = "";
          res.channels.map((ch, index) => {
            channel_info_str += '<br>' + ch + ' - ' + res.notes[index];
          });
          $(".channel_info").html(channel_info_str);
        }
        $("#verified_name").html((res.data[0].firstname ? res.data[0].firstname : "") + " " + (res.data[0].lastname ? res.data[0].lastname : ""));
        $(".verify_success").show();
        $(".verify_fail").hide();
      } else {
        $(".verify_success").hide();
        $(".verify_fail").show();
      }
    },
    error: e => {
      $("#verification_input").val("");
    }
  });
});

$(document).keyup(function(e) {
  if (e.key === "Escape") { // escape key maps to keycode `27`
      $('.modal').modal('hide');
  }
});

$('#subscriberForm').on('submit', function(e) {
  e.preventDefault();
  $.ajax({
    type: "POST",
    url: rPath + "utils/middle.php",
    data: { subscriber: "subscriber", email: $("#subscriber_email").val()},
    dataType: "json",
    success: function(res){
      $('#confirmationModal1').modal('show');
      if(res.success){
        $("#subscriber_email").val("");
        $(".thanks_interest").show();
        $("#exist_email").hide();
        $("#confirmationModal1 #btn_yes").addClass("hidden");
        $("#confirmationModal1 #btn_no").addClass("hidden");
        $("#confirmationModal1 #btn_ok").removeClass("hidden");
      } else {
        $(".thanks_interest").hide();
        $("#exist_email").show();
        $("#confirmationModal1 #btn_yes").removeClass("hidden");
        $("#confirmationModal1 #btn_no").removeClass("hidden");
        $("#confirmationModal1 #btn_ok").addClass("hidden");
      }
    },
    error: e => {
      $("#subscriber_email").val("");
      toastr.error(get_lang('submit_fail'));
    }
  });
});

$('#btn_no').on('click', function(e) {
  $("#collect_email").val("");
  $("#subscriber_email").val("");
});

$('#thanksEmailModal #btn_yes').on('click', function(e) {
  $.ajax({
    type: "POST",
    url: rPath + "utils/middle.php",
    data: { remove_email_collect: "remove_email_collect", email: $("#collect_email").val()},
    dataType: "json",
    success: function(res){
      $("#collect_email").val("");
      if(res.success){
        toastr.success(res.message);
      } else {
        toastr.warning(res.message);
      }
    },
    error: e => {
      $("#collect_email").val("");
      toastr.error(get_lang('remove_failed'));
    }
  });
});

$('#confirmationModal1 #btn_yes').on('click', function(e) {
  $.ajax({
    type: "POST",
    url: rPath + "utils/middle.php",
    data: { remove_email_subscriber: "remove_email_subscriber", email: $("#subscriber_email").val()},
    dataType: "json",
    success: function(res){
      $("#subscriber_email").val("");
      if(res.success){
        toastr.success(res.message);
      } else {
        toastr.warning(res.message);
      }
    },
    error: e => {
      $("#subscriber_email").val("");
      toastr.error(get_lang('remove_failed'));
    }
  });
});

$('#email_collect_form').on('submit', function(e) {
  e.preventDefault();
  $.ajax({
    type: "POST",
    url: rPath + "utils/middle.php",
    data: { email_collect: "email_collect", email: $("#collect_email").val()},
    dataType: "json",
    success: function(res){
      $('#thanksEmailModal').modal('show');
      if(res.success){
        $("#collect_email").val("");
        $("#thanks").show();
        $("#exist_email").hide();
        $("#thanksEmailModal #btn_yes").addClass("hidden");
        $("thanksEmailModal #btn_no").addClass("hidden");
        $("thanksEmailModal #btn_ok").removeClass("hidden");
      } else {
        $("#thanks").hide();
        $("#exist_email").show();
        $("thanksEmailModal #btn_yes").removeClass("hidden");
        $("thanksEmailModal #btn_no").removeClass("hidden");
        $("thanksEmailModal #btn_ok").addClass("hidden");
      }
    },
    error: e => {
      $("#email").val("");
      toastr.error(get_lang('submit_fail'));
    }
  });
});

var header = document.querySelector('.nav-header');
onScroll = () => {
  var scrolledPage = Math.round(window.pageYOffset);
  if(scrolledPage > 60) {
    header.classList.add('sticky');
  } else {
    header.classList.remove('sticky');
  }
}
document.addEventListener('scroll', onScroll);

$("#loginForm").on('submit', e => {
  e.preventDefault();
  $.ajax({
    type: "POST",
    url: rPath + "utils/middle.php",
    dataType: "json",
    data: { email: $("#email").val(), password: $("#password").val(), loginform: "loginform" },
    success: function(res){
      if (res.success) {
        toastr.success(res.message);
        location.href = 'backoffice.php';
      }
      else toastr.warning(res.message);
    },
    error: e => {
      toastr.error(get_lang('login_fail'));
    }
  });
});

let get_lang = function(keyword) {
  let message = "";
  $.ajax({
    url: rPath + "utils/middle.php",
    type: "POST",
    dataType: "json",
    async: false,
    data: {
      get_lang: "get_lang",
      keyword,
    },
    success: (res) => {
      if (res) {
        message = res.data;
      } else {
        console.log("Failed to get language!");
      }
    },
    error: () => console.log("Failed to get language!")
  });

  return message;
}
let get_investment = function(id) {
  let data = "";
  $.ajax({
    url: rPath + "utils/middle.php",
    type: "POST",
    dataType: "json",
    async: false,
    data: {
      get_investment: "get_investment",
      id,
    },
    success: (res) => {
      if (res) {
        data = res.data;
      } else {
        console.log("Failed to get investment!");
      }
    },
    error: () => console.log("Failed to get investment!")
  });

  return data;
}

$(document).on("click", ".updateNewsStatus", function () {
  let id = $(this).data("id");
  let status = $(this).data("status");

  $.ajax({
    url: rPath + "utils/middle.php",
    type: "post",
    dataType: "json",
    data: { updateNewsStatus: "updateNewsStatus", id, status },
    success: function (result) {
      if (result) {
          toastr.success(result.message);
          setTimeout(() => {
            location.reload();
          }, 500);
      }
    },
    error: () => {
      toastr.error("Failed to update news!");
    }
  });
});

// adding value to remove news modal
$(document).on("click", ".deleteNews", function () {
  let id = $(this).attr("data-id");
  $("#delete_news_id").val(id);
});

// Remove Subscriber
$("#deleteNews").on("click", function () {
  let id = $("#delete_news_id").val();
  $.ajax({
    url: rPath + "utils/middle.php",
    type: "post",
    dataType: "json",
    data: { deleteNews: "deleteNews", id },
    success: function (result) {
      if (result) {
        toastr.success(result.message);
        setTimeout(() => {
          location.reload();
        }, 500);
      }
    },
    error: err=>{
      toastr.error("Failed to delete subscriber!");
    }
  });
});

// edit value to send Newsletter modal
$(document).on("click", ".editNews", function () {
  let id = $(this).attr("data-id");
  localStorage.setItem("news_id", id);
  location.href = "index.php";
});

$('#add_news_form').on('submit', (e) => {
  e.preventDefault();
  let id = localStorage.getItem("news_id");
  let data = new FormData(document.getElementById('add_news_form'));
  data.add_news = "add_news";
  $.ajax({
    url: rPath + "utils/middle.php",
    type: "post",
    dataType: "json",
    data,
    cache: false,
    contentType: false,
    processData: false,
    success: function (res) {
      toastr.success(res.message);
      $('#reset_newsletter').click();
      localStorage.setItem("news_id", 0);
      if (id > 0) {
        setTimeout(() => {
          location.href = "news_list.php";
        }, 1000);
      } else {
        setTimeout(() => {
          location.reload();
        }, 500);
      }
    },
    error: err=>{
      toastr.error("Failed to " + $('#add_news').html() + "!");
    }
  });
});

$('#cn').on('change', function(e) {
  $("#cn").removeClass('errorMsg');
});

$('#contactForm').on('submit', function(e){
  e.preventDefault();
  if($("#cn").val() == "no" || $("#cn").val() == "" || $("#cn").val() == null) {
    $("#cn").addClass('errorMsg');
    return false;
  }
  let formData = {
    email: $("#email").val(),
    name: $("#name").val(),
    number: $("#number").val(),
    cn: $("#cn").val(),
    message: $("#message").val(),
  };
  $.ajax({
    type: "POST",
    url: rPath + "utils/middle.php",
    data: formData,
    dataType: "json",
    encode: true,
    success: function (res) {
      $("#email").val("");
      if(res.success){
        $('#confirmationModal').modal('show');
      } else {
        toastr.warning(res.message);
      }
    },
    error: e => {
      $('#confirmationModal').modal('show');
      toastr.error(get_lang('submit_fail'));
    }
  });
});

$("#news_table").DataTable({
  fnDrawCallback: function (oSettings) {},
  fnInfoCallback: function (oSettings, iStart, iEnd, iMax, iTotal, sPre) {
    let info = iTotal + "/" + iMax + " entries";
    $(".news_list_container .info-showing").text("");
    $(".news_list_container .info-showing").html(info);
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
  order: [[0, "asc"]],
  columnDefs: [
    { targets: "no-sort", orderable: false },
    // { sType: "date", aTargets: [0] },
  ],
  // aoColumns: [
  //   {
  //     sType: "date-sort",
  //     bSortable: true,
  //   },
  //   null,
  //   null,
  // ],
  autoWidth: false,
  pageLength: 250,
  bLengthChange: false,
  bInfo: true,
  oLanguage: { sSearch: "" },
  fixedColumns: true,
  initComplete: function (settings, json) {
    let top = $('#news_table_wrapper').offset().top + 65;
    $(`#news_table`).wrap(
      `<div style='overflow:auto; width:100%; max-height: calc(100vh - ${top}px); position:relative;'></div>`
      );
    top = top + 140;
    $('.page_container').attr('style', `padding-bottom: 0px !important; min-height: calc(100vh - ${top}px) !important;`);
  },
});

$("#investments_table").DataTable({
  fnDrawCallback: function (oSettings) {},
  fnInfoCallback: function (oSettings, iStart, iEnd, iMax, iTotal, sPre) {
    let info = iTotal + "/" + iMax + " entries";
    $(".investments_list_container .info-showing").text("");
    $(".investments_list_container .info-showing").html(info);
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
  // order: false,
  order: [[0, "asc"]],
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
    let top = $('#investments_table_wrapper').offset().top + 65;
    $(`#investments_table`).wrap(
      `<div style='overflow:auto; width:100%; max-height: calc(100vh - ${top}px); position:relative;'></div>`
      );
    top = top + 140;
    $('.page_container').attr('style', `padding-bottom: 0px !important; min-height: calc(100vh - ${top}px + 15px) !important;`);
  },
});

$("a.viewInvestment").click(e => {
  let id = $(e.currentTarget).data("id");
  let inv_data = get_investment(id);
  console.log(inv_data);
});

$("a.editInvestment").click(e => {
  let id = $(e.currentTarget).data("id");
  let inv_data = get_investment(id);
  $("#id").val(id);
  $("#fname").val(inv_data.firstname);
  $("#lname").val(inv_data.lastname);
  $("#email").val(inv_data.email);
  $("#telephone").val(inv_data.telephone);
  $("#zipcode").val(inv_data.zipcode);
  $("#city").val(inv_data.city);
  $("#country").val(inv_data.cn);
  $("#address").val(inv_data.address);
  $("#currency").val(inv_data.currency);
  $("#token_price").val(inv_data.price);
  $("#investAmount").val(inv_data.invest_amount);
  $("#token").val(inv_data.redux_token);
  $("#wallet").val(inv_data.wallet);
});
    
$("#update_ps1f_form input[type='text']").on('focus', function(e) {
  if(e.target.id != "investAmount" && $("#investAmount").val() != "" && $("#investAmount").val() < 1000) {
      $("#investAmount").addClass("errorMsg");
      $(".invest_min").removeClass("d-none");
  }
});
$('#fname').on('keyup', function(e) {
  $("#fname").removeClass("errorMsg");
});
$('#fname').on('change', function(e) {
  $("#fname").removeClass("errorMsg");
});
$('#lname').on('change', function(e) {
  $("#lname").removeClass("errorMsg");
});
$('#lname').on('keyup', function(e) {
  $("#lname").removeClass("errorMsg");
});
$('#email').on('change', function(e) {
  $("#email").removeClass("errorMsg");
});
$('#email').on('keyup', function(e) {
  $("#email").removeClass("errorMsg");
});
$('#zipcode').on('change', function(e) {
  $("#zipcode").removeClass("errorMsg");
});
$('#zipcode').on('keyup', function(e) {
  $("#zipcode").removeClass("errorMsg");
});
$('#city').on('change', function(e) {
  $("#city").removeClass("errorMsg");
});
$('#city').on('keyup', function(e) {
  $("#city").removeClass("errorMsg");
});
$('#country').on('change', function(e) {
  $("#country").removeClass("errorMsg");
});
$('#address').on('change', function(e) {
  $("#address").removeClass("errorMsg");
});
$('#address').on('keyup', function(e) {
  $("#address").removeClass("errorMsg");
});
$('#token_price').on('change', function(e) {
  $("#token_price").removeClass("errorMsg");
});
$('#token_price').on('keyup', function(e) {
  $("#token_price").removeClass("errorMsg");
  $('#token').val($("#investAmount").val() / $("#token_price").val() )
});
$('#wallet').on('keyup', function(e) {
  $("#wallet").removeClass("errorMsg");
});
$('#currency').on('change', function(e) {
  $("#currency").removeClass("errorMsg");
});
$('#investAmount').on('change', function(e) {
  $('#investAmount').trigger("keyup");
});
$('#investAmount').on('keyup', function(e) {
  $("#token").removeClass("errorMsg");
  $("#investAmount").removeClass("errorMsg");
  $(".invest_min").addClass("d-none");
  if ($('#token_price').val() != 0 && $('#token_price').val() != "") {
      $('#token').val((Math.ceil($('#investAmount').val() / $('#token_price').val())));
  } else $('#token').val("");
});
$('#token').on('change', function(e) {
  $('#token').trigger("keyup");
});
$('#token').on('keyup', function(e) {
  $("#token").removeClass("errorMsg");
  $("#investAmount").removeClass("errorMsg");
  if ($('#token_price').val() != 0 && $('#token_price').val() != "") {
      $('#investAmount').val((Math.ceil($('#token').val() * $('#token_price').val())));
  } else $('#investAmount').val("");
});

$("#update_ps1f_form").on('submit', e => {
  e.preventDefault();
  let form_validation = true;
  if ($("#fname").val() == "") {
      form_validation = false;
      $("#fname").addClass("errorMsg");
  }
  if ($("#lname").val() == "") {
      form_validation = false;
      $("#lname").addClass("errorMsg");
  }
  if ($("#email").val() == "") {
      form_validation = false;
      $("#email").addClass("errorMsg");
  } else if (!$("#email").val().toLowerCase().match(/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)) {
      form_validation = false;
      $("#email").addClass("errorMsg");
  }
  if ($("#zipcode").val() == "") {
      form_validation = false;
      $("#zipcode").addClass("errorMsg");
  }
  if ($("#city").val() == "") {
      form_validation = false;
      $("#city").addClass("errorMsg");
  }
  if ($("#country").val() == "" || $("#country").val() == null || $("#country").val() == "no") {
      form_validation = false;
      $("#country").addClass("errorMsg");
  }
  if ($("#address").val() == "") {
      form_validation = false;
      $("#address").addClass("errorMsg");
  }
  if ($("#currency").val() == "" || $("#currency").val() == null || $("#currency").val() == "no") {
      form_validation = false;
      $("#currency").addClass("errorMsg");
  }
  if ($("#investAmount").val() == "") {
      form_validation = false;
      $("#investAmount").addClass("errorMsg");
  }
  if ($("#investAmount").val() < 1000) {
      form_validation = false;
      $("#investAmount").addClass("errorMsg");
      $(".invest_min").removeClass("d-none");
  }
  if ($("#token_price").val() == "" || $("#token_price").val() <= 0) {
      form_validation = false;
      $("#token_price").addClass("errorMsg");
  }
  if (!form_validation) {
    return;
  }
  let data = new FormData(document.getElementById("update_ps1f_form"));
  $.ajax({
    url: rPath + "utils/middle.php",
    type: "POST",
    dataType: "json",
    async: false,
    cache: false,
    contentType: false,
    processData: false,
    data,
    success: (res) => {
      if (res) {        
        toastr.success(get_lang("update_investment_success"));
        setTimeout(() => {
          location.reload();
        }, 1000);
      } else {
        toastr.error(get_lang("update_investment_fail"));
      }
    },
    error: () => toastr.error(get_lang("update_investment_fail"))
  });
});

$("a.viewKYC").click(e => {
  let file = $(e.target).data("file");
  $("#kyc_content").attr("src", "../private-sale-1-fiat/file_upload/" + file);
});

$("a.updateInvestmentStatus").click(e => {
  let id = $(e.currentTarget).data("id");
  let payed_status = $(e.currentTarget).data("status");
  $.ajax({
    url: rPath + "utils/middle.php",
    type: "POST",
    dataType: "json",
    async: false,
    data: {
      update_investment_status: "update_investment_status",
      id, payed_status
    },
    success: (res) => {
      if (res) {
        toastr.success(get_lang("update_investment_status_success"));
        setTimeout(() => {
          location.reload();
        }, 1000);
      } else {
        toastr.error(get_lang("update_investment_status_fail"));
      }
    },
    
    error: () => toastr.error(get_lang("update_investment_status_fail"))
  });
  
});

$(".scroll_to").on('click', e => {
  if (e.target.href.split("/")[e.target.href.split("/").length - 1][0] == "#") {
    let target = e.target.href.split("/")[e.target.href.split("/").length - 1];
    $("html, body").animate({
            scrollTop: $(target).offset().top - (target == "#Roadmap" ? 70 : 100),
        },
        100
    );
    return false;
}
});
$(".wallet-status").mouseenter(function() {
  // console.log('wallet');
  // console.log($(this));
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

$(".payed-status").mouseenter(function() {
  // console.log($(this).attr);
  let tooltip = $(this).attr("aria-describedby");
  let $tip = $(`#${tooltip}`);
  // console.log($tip);
  $tip
      .css({ opacity: 1 })
      .find(".tooltip-arrow")
      .attr(
          "style",
          `border-top-color:  "#a31a1a" !important`
      );
  $tip
      .find(".tooltip-inner")
      .css({ backgroundColor: "#a31a1a" });
});