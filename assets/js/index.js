const navToggle = document.querySelector(".nav-toggle");
const navMenu = document.querySelector(".nav-menu");

navToggle.addEventListener("click", () => {
  navMenu.classList.toggle("nav-menu_visible");

  if (navMenu.classList.contains("nav-menu_visible")) {
    navToggle.setAttribute("aria-label", "Cerrar menú");
  } else {
    navToggle.setAttribute("aria-label", "Abrir menú");
  }
});


$(document).ready(function() {
    $('#show'). mousedown(function() {
    	$('#contrasena_empleado').removeAttr('type');
    	$('#show').addClass('fa-eye-slash').removeClass('fa-eye')
    });
    $('#show').mouseup(function() {
        $('#contrasena_empleado').attr('type', 'password');
        $('#show').addClass('fa-eye').removeClass('fa-eye-slash')
    });
});

