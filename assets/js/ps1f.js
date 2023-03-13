// const togglePassword = document.querySelector('#togglePassword');
// const password = document.querySelector('#password');
// togglePassword.addEventListener('click', function (e) {
//     // toggle the type attribute
//     const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
//     password.setAttribute('type', type);
//     // toggle the eye slash icon
//     this.classList.toggle('fa-eye-slash');
// });

let dropZoneId = "drop-zone";
let buttonId = "clickHere";
let mouseOverClass = "mouse-over";
let dropZone = $("#" + dropZoneId);
let inputFile = dropZone.find("input");
let finalFiles = {};

let get_lang = function(keyword) {
    let message = "";
    $.ajax({
    url: "../utils/middle.php",
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
function removeLine(obj)
{
    // inputFile.val('');
    let jqObj = $(obj);
    let container = jqObj.closest('div');
    let index = container.attr("id").split('_')[1];
    container.remove(); 
    delete finalFiles[index];
}

$(document).ready(function() {

    let ooleft = dropZone.offset().left;
    let ooright = dropZone.outerWidth() + ooleft;
    let ootop = dropZone.offset().top;
    let oobottom = dropZone.outerHeight() + ootop;
    $(".invest_min").addClass("d-none");

    document.getElementById(dropZoneId).addEventListener("dragover", function(e) {
      e.preventDefault();
      e.stopPropagation();
      dropZone.addClass(mouseOverClass);
      let x = e.pageX;
      let y = e.pageY;
  
      if (!(x < ooleft || x > ooright || y < ootop || y > oobottom)) {
        inputFile.offset({
          top: y - 15,
          left: x - 100
        });
      } else {
        if (Object.keys(finalFiles).length < 2) {
            inputFile.offset({
                top: -400,
                left: -400
            });
        } else {
            inputFile.offset({
                top: y+50,
                left: -400
            });
        }
      }
  
    }, true);
  
    if (buttonId != "") {
      let clickZone = $("#" + buttonId);
  
      let oleft = clickZone.offset().left;
      let oright = clickZone.outerWidth() + oleft;
      let otop = clickZone.offset().top;
      let obottom = clickZone.outerHeight() + otop;
  
      $("#" + buttonId).mousemove(function(e) {
        let x = e.pageX;
        let y = e.pageY;
        if (!(x < oleft || x > oright || y < otop || y > obottom)) {
          inputFile.offset({
            top: y - 15,
            left: x - 160
          });
        } else {
            if (Object.keys(finalFiles).length < 2) {
                inputFile.offset({
                    top: -400,
                    left: -400
                });
            } else {
                inputFile.offset({
                    top: y - 100,
                    left: -400
                });
            }
        }
      });
    }
  
    document.getElementById(dropZoneId).addEventListener("drop", function(e) {
      $("#" + dropZoneId).removeClass(mouseOverClass);
    }, true);
    
    inputFile.on('change', function(e) {
    //   finalFiles = {};
    //   $('#filename').html("");
        let files_len = Object.keys(finalFiles).length;
        console.log(finalFiles);
        let fileNum = this.files.length;
        console.log(files_len, fileNum);
        // initial = 0,
        // counter = 0;
        if (files_len > 2 || files_len + fileNum > 2) {
            toastr.error(get_lang("upload_available_file_count"));
        } else {
            for (let index = 0; index < fileNum; index++) {
                if (files_len < 2) {
                    const file = this.files[index];
                    if (file.size > 10485760) {
                        toastr.error(get_lang("file_size_limited"));
                    } else {
                        finalFiles[files_len] = file;
                        files_len++;
                        $('#filename').append('<div id="file_'+ files_len +'"><span class="fa-stack fa-lg"><i class="fa fa-file fa-stack-1x "></i><strong class="fa-stack-1x" style="color:#FFF; font-size:12px; margin-top:2px;">' + files_len + '</strong></span> ' + file.name + '&nbsp;&nbsp;<span class="fa fa-times-circle fa-lg closeBtn" onclick="removeLine(this)" title="remove"></span></div>');
                    }
                } 
            }            
        }
    });
    
    $("#ps1f_form input[type='text']").on('focus', function(e) {
        if(e.target.id != "investAmount" && $("#investAmount").val() != "" && $("#investAmount").val() < 1000) {
            $("#investAmount").addClass("errorMsg");
            $(".invest_min").removeClass("d-none");
        }
    });

    $('#ps1f_form').on('submit', function(e) {
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
        if ($("#token").val() == "") {
            form_validation = false;
            $("#token").addClass("errorMsg");
        }
        // if ($("#wallet").val() == "") {
        //     form_validation = false;
        //     $("#wallet").addClass("errorMsg");
        // }
        if (!form_validation) {
            setTimeout(() => {
                $("html, body").animate({
                    scrollTop: 80,
                }, 50);
                
            }, 100);
            return;
        }
        // if (Object.keys(finalFiles).length == 0) {
        //     toastr.error(get_lang("kyc_upload_required"));
        //     return;
        // }
        let data = new FormData(document.getElementById("ps1f_form"));
        data.delete("file[]");
        for (const key in finalFiles) {
            if (Object.hasOwnProperty.call(finalFiles, key)) {
                const file = finalFiles[key];
                data.append("file[]", file);
            }
        }
        data.append('price', currency_rate[$('#currency').val().toLowerCase()]);
        $.ajax({
            type: "POST",
            url: "../utils/middle.php",
            data,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (res) {
                res = JSON.parse(res);
                if(res.success){
                    $("#fname").val("");
                    $("#lname").val("");
                    $("#email").val("");
                    $("#telephone").val("");
                    $("#zipcode").val("");
                    $("#city").val("");
                    $("#country").val("no");
                    $("#address").val("");
                    $("#wallet").val("");
                    $("#currency").val("EUR");
                    $("#investAmount").val("");
                    $("#token").val("");
                    $('#filename').html("");
                    $('#file').html("");
                    $('#sale_message').html("");
                    $(".thanks_title").html(get_lang('confirm_ps1f_title'));
                    $(".thanks_text").html(get_lang('confirm_ps1f_text'));
                    $("#ps1fSuccessModal").modal('show');
                } else if (res.data == "email_exist" ){
                    toastr.warning(get_lang("email_exist"));
                    $("html, body").animate({
                        scrollTop: 40,
                    }, 50);
                } else toastr.error(get_lang("ps1f_failed"));
            },
            error: e => {
                toastr.error(get_lang("ps1f_failed"));
            }
        });
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
    $('#wallet').on('keyup', function(e) {
        $("#wallet").removeClass("errorMsg");
    });
    $('#currency').on('change', function(e) {
        $("#currency").removeClass("errorMsg");
        let amount = $('#investAmount').val();
        if (amount != "") $('#token').val(Math.ceil(amount / currency_rate[$('#currency').val().toLowerCase()]));
    });
    $('#investAmount').on('change', function(e) {
        $('#investAmount').trigger("keyup");
    });
    $('#investAmount').on('keyup', function(e) {
        $("#token").removeClass("errorMsg");
        $("#investAmount").removeClass("errorMsg");
        $(".invest_min").addClass("d-none");
        let currency = $('#currency').val();
        if (currency != "" && currency != null && currency != "no") {
            currency = currency_rate[$('#currency').val().toLowerCase()];
            $('#token').val((Math.ceil($('#investAmount').val() / currency)));
        } else $('#token').val("");
    });
    $('#token').on('change', function(e) {
        $('#token').trigger("keyup");
    });
    $('#btn_ok').on('click', function(e) {
        location.href = "../";
    });
    $('#token').on('keyup', function(e) {
        $("#token").removeClass("errorMsg");
        $("#investAmount").removeClass("errorMsg");
        let currency = $('#currency').val();
        if (currency != "" && currency != null && currency != "no") {
            currency = currency_rate[$('#currency').val().toLowerCase()];
            $('#investAmount').val((Math.round($('#token').val() * currency)));
        } else $('#investAmount').val("");
    });

    $(".lang_setting .dropdown-item").click(function() {
        let lang = $(this).data("lang");
        $.ajax({
            url: "../utils/middle.php",
            type: "GET",
            dataType: "JSON",
            data: {
                languageSet: "languageSet",
                lang,
            },
            success: (res) => {
                location.reload();
            },
        });
    });
      
})
