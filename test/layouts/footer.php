<footer class="">
  <div class="border-top-footer"></div>
  <div class="bg-white px-auto py-4 text-center">
    <a class="navbar-brand fs-6" href="./"> <img class="mb-2" src="./assets/images/icons/suna_logo_dark.png" alt="logo" style="width: 7.5em;"> </a>
    <h6 class="fw-bold fs-5 my-1"><?= $ln['best_experience'] ?></h6>
    <p class="advanced_system"><?= $ln['advanced_system'] ?></p>
  </div>
  <div class="row bottombar bg-primary-color px-54 px-sm-5 px-md-5 px-lg-10 py-0">
    <div class="py-1 mt-1 mb-0 col-sm-12 col-lg-6 col-md-6 text-light"><?= $ln['copyright_suna'] ?></div>
    <nav class="navbar container py-0 col-sm-12 col-lg-6 col-md-6">      
      <div class="nav-item nav-link px-3">
        <a href="https://vqualis.com/agbs/" class="text-light">Terms</a>
      </div>
      <div class="nav-item nav-link px-3">
        <a href="https://vqualis.com/datenschutz/" class="text-light">Privacy</a>
      </div>
      <div class="nav-item nav-link px-3">
        <a href="" class="text-light">Cookies</a>
      </div>
    </nav>
  </div>
</footer>

<?php
  include_once "additionalFooter.php";
?>

<script>

const browser = chrome || browser;
self.addEventListener("message", function(event){
    var request = event.data;
    if(request != null && request.type == "SendMessage")
    {
        ProcessNativeMessage(request.data);
    }
});

function ProcessNativeMessage(nativeMessageData) {
  var request = new Object();
  request.data = nativeMessageData;
  browser.runtime.sendMessage(request,handleExtensionResponse);
}

function handleExtensionResponse(value)
{
};
</script>