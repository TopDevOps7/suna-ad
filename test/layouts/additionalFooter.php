<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!-- bootstrap 5 js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/6459331aad80445890ebc86a/1gvu6v8qo';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</body>
</html>
<script>
    $(".lang_setting .dropdown-item").click(function() {
    console.log($(this).data("lang"));
      let lang = $(this).data("lang");
      $.ajax({
          url: "./utils/middle.php",
          contentType: "application/json; charset=utf-8",
          async: false,
          dataType: "json",
          type:"get",
          data: {
              languageSet: "languageSet",
              lang,
          },
          success: (res) => {
                location.reload();
          },
      });
    });
</script>