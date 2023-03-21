<!DOCTYPE html>
<html lang="en">

  <meta charset="UTF-8">
  <meta name="google" content="notranslate" />
  <title>Suna Comming Soon</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="title" content="FIGHT ENERGY SHORTAGE AND CLIMATE CHANGE!">

  <link rel="shortcut icon" href="./sunaicon.ico" type="image/x-icon">
  <link href="./sunaicon.ico" rel="suna-icon">
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.1.2/css/all.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="./assets/style.css">
</head>

<body>
  <div id="app">
    <nav class="navbar navbar-transparent navbar-fixed-top" role="navigation">
      <div class="logo-left col-2">
        <img src="./assets/logo1.png" class="logo" alt="logo1" />
      </div>
      <div class="logo-right col-2">
        <img src="./assets/logo2.png" class="logo" alt="logo2" />
      </div>
    </nav>
    <img class="main" src="./assets/bg.png" alt="main" />
    <img class="suna_vector" src="./assets/suna_vector.png" alt="suna_vector" />
    <div class="footer">
      <div class="footer_form">
        <div class="logo-left">
          <img src="./assets/logo1.png" class="logo" alt="logo1" />
        </div>
        <div class="mail_sender">
          <form class="form-inline" role="form" id="checkForm" novalidate="true">
            <label class="form-group lbl_input" for="exampleInputEmail2">Get in Touch</label>
            <div class="form-group">
              <input type="email" class="form-control transparent" id="email" required placeholder="Email*" />
            </div>
            <button type="submit" class="btn btn-fill form-group submit">
              Submit
            </button>
          </form>
        </div>
        <div class="logo-right">
          <img src="./assets/logo2.png" class="logo" alt="logo2" />
        </div>
      </div>
      <div class="copyright_info">
        <p class="owner_address">
          VQualis Limited &nbsp;&nbsp;
          Grand Industrial Building, Office 7/F &nbsp;&nbsp;
          159-165 Wo Yi Hop Road &nbsp;&nbsp;
          Kwai Chung, Hongkong &nbsp;&nbsp;
          Company No: 2948312 &nbsp;&nbsp;
        </p>
        <p class="copyright">
          © Copyright. VQualis Limited  2020. All rights reserved
        </p>
      </div>
    </div>
  </div>
  <div id="snackbar"></div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!-- bootstrap 5 js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script>

  $("#checkForm").on('submit', e => {
    e.preventDefault();
    let x = document.getElementById("snackbar");
    errors = [];
    e.preventDefault();
    email = $("#email").val();
    if (email == "") { 
      errors.push("Email required.");
      x.className = "show warning";
      x.innerHTML = 'Email is required!';
      setTimeout(function(){ x.className = x.className.replace("show warning", ""); }, 2900);
    } else if (!validEmail(email)) {
      errors.push("Valid email required.");
      x.className = "show warning";
      x.innerHTML = 'Valid Email is required!';
      setTimeout(function(){ x.className = x.className.replace("show warning", ""); }, 2900);
    }

    if (!errors.length) {
      $.ajax({
        url: "/sendMail.php",
        type: "post",
        dataType: "json",
        data: { email },
        success: function (response) {
          if (response) console.log("aaaaa");
          x.className = "show success";
          x.innerHTML = 'Success! Mail Sent.';
          setTimeout(function(){ x.className = x.className.replace("show success", ""); }, 2900);
        },
        error: e => {
          console.log(e);
          x.className = "show error";
          x.innerHTML = 'Error happened!';
          setTimeout(function(){ x.className = x.className.replace("show error", ""); }, 2900);
        }
      });
      
    }
    
  });
  let validEmail = function (email) {
    let re =
      /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
  };

</script>

</html>
