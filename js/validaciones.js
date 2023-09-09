document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
    const celInput = document.getElementById("cel");
    const emailInput = document.getElementById("email");
  
    form.addEventListener("submit", function (e) {

      if (celInput.value.length !== 10) {
        alert("El número de teléfono debe tener exactamente 10 dígitos.");
        e.preventDefault();
      }
  
    
      const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.com$/;
      if (!emailPattern.test(emailInput.value)) {
        alert("Por favor, ingrese una dirección de correo electrónico válida.");
        e.preventDefault(); 
      }
    });
  });