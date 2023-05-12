// Obtener la fecha y hora actual en la zona horaria de Bogotá, Colombia
var now = new Date();
now.setSeconds(0);
now.setMilliseconds(0);
var options = {timeZone: "America/Bogota", hour12: false};
var nowBogota = now.toLocaleString("en-US", options);

console.log(nowBogota);
// Establecer la fecha y hora actual como valor inicial para los campos de fecha y hora
document.getElementById("fecha-hora-inicio").value = nowBogota;
document.getElementById("fecha-hora-fin").value = nowBogota;
// Restringir las horas permitidas a un rango de 10:00 AM a 10:00 PM
document.getElementById("fecha-hora-inicio").addEventListener("input", function() {
  var fechaHoraInicio = new Date(document.getElementById("fecha-hora-inicio").value);
  var horaInicio = fechaHoraInicio.getHours();

  if (horaInicio < 10 || horaInicio >= 22) {
    alert("La hora de inicio debe estar entre las 10:00 AM y las 10:00 PM.");
    document.getElementById("fecha-hora-inicio").value = "";
  }
});

document.getElementById("fecha-hora-fin").addEventListener("input", function() {
  var fechaHoraFin = new Date(document.getElementById("fecha-hora-fin").value);
  var horaFin = fechaHoraFin.getHours();

  if (horaFin < 10 || horaFin >= 22) {
    alert("La hora de fin debe estar entre las 10:00 AM y las 10:00 PM.");
    document.getElementById("fecha-hora-fin").value = "";
  }
});

// Deshabilitar los fines de semana
document.getElementById("fecha-hora-inicio").addEventListener("input", function() {
  var fechaHoraInicio = new Date(document.getElementById("fecha-hora-inicio").value);
  var diaSemanaInicio = fechaHoraInicio.getDay();

  if (diaSemanaInicio === 6 || diaSemanaInicio === 0) {
    alert("No se permiten reservas los fines de semana.");
    document.getElementById("fecha-hora-inicio").value = "";
  }
});

document.getElementById("fecha-hora-fin").addEventListener("input", function() {
  var fechaHoraFin = new Date(document.getElementById("fecha-hora-fin").value);
  var diaSemanaFin = fechaHoraFin.getDay();

  if (diaSemanaFin === 6 || diaSemanaFin === 0) {
    alert("No se permiten reservas los fines de semana.");
    document.getElementById("fecha-hora-fin").value = "";
  }
});

// Evitar que se seleccionen fechas anteriores al día de hoy
document.getElementById("fecha-hora-inicio").addEventListener("input", function() {
  var fechaHoraInicio = new Date(document.getElementById("fecha-hora-inicio").value);
  var fechaActual = new Date();
  fechaActual.setSeconds(0);
  fechaActual.setMilliseconds(0);

  if (fechaHoraInicio < fechaActual) {
    alert("No se permiten reservas en fechas anteriores al día de hoy.");
    document.getElementById("fecha-hora-inicio").value = nowBogota;
  }
});

document.getElementById("fecha-hora-fin").addEventListener("input", function() {
  var fechaHoraInicio = new Date(document.getElementById("fecha-hora-inicio").value);
  var fechaHoraFin = new Date(document.getElementById("fecha-hora-fin").value);

  // Validar que la fecha y hora de fin no sea anterior a la de inicio
  if (fechaHoraFin < fechaHoraInicio) {
    alert("La fecha y hora de fin no puede ser anterior a la de inicio.");
    document.getElementById("fecha-hora-fin").value = "";
  }

  // Evitar que se seleccionen fechas anteriores al día de hoy
  var fechaActual = new Date();
  fechaActual.setSeconds(0);
  fechaActual.setMilliseconds(0);
  if (fechaHoraFin < fechaActual) {
    alert("No se permiten reservas en fechas anteriores al día de hoy.");
    document.getElementById("fecha-hora-fin").value = nowBogota;
  }
});
