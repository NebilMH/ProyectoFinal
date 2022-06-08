(function($) {

	"use strict";

	$(".toggle-password").click(function() {//Este script sirve para que podamos mostrar y ocultar la contraseña de los formularios con el boton en forma de ojo

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});

})(jQuery);
