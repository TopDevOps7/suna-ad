<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!-- bootstrap 5 js -->
<!-- <script type="text/javascript" src="<?= $basePath ?>assets/js/bootstrap.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

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