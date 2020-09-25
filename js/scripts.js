$(function () {
  "use strict";

  $(".tooltip-test").tooltip({ boundary: "window" });

  $(".popover-test").popover({
    container: "body",
  });

  $(".logout").click(function () {
    document.location.href = "./login/logout.php";
  });

  // Example starter JavaScript for disabling form submissions if there are invalid fields
});

(function () {
  "use strict";
  window.addEventListener(
    "load",
    function () {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName("needs-validation");
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function (form) {
        form.addEventListener(
          "submit",
          function (event) {
            if (
              $("#inputPassword").val() !== $("#inputConfirmPassword").val()
            ) {
              alert("Password mismatch");

              $("#inputConfirmPassword").addClass("is-invalid");
              $(".ConfirmPasswordfb").css("display", "block");
              event.preventDefault();
              event.stopPropagation();
            } else if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            } else {
              form.classList.add("was-validated");
            }
          },
          false
        );
      });
    },
    false
  );
})();
