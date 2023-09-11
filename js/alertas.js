var urlParams = new URLSearchParams(window.location.search);
var alerta = urlParams.get("alert");


if (alerta === "error") {

  Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: '¡El correo o el celular ya están registrados!'
  });
}

if (alerta === "saved") {
  Swal.fire({
    icon: 'success',
    title: 'Gracias por llenar tus datos',
    showConfirmButton: false,
    timer: 4000
  });
}
history.replaceState({}, document.title, "/");
