
const form = document.querySelector(".login form"),
continueBtn = form.querySelector(".button input"),
errorText = form.querySelector(".error-txt");

form.addEventListener("submit", e => {
  e.preventDefault(); // empêcher la soumission du formulaire
});

continueBtn.addEventListener("click", () => {
  // Démarrons AJAX
  let xhr = new XMLHttpRequest(); // création de l'objet XML
  xhr.open("POST", "php/login.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        console.log(data);
      //  if (data == "success") {
      //       location.href = "users.php";
      //  }else{
      //   errorText.textContent = data;
      //   errorText.style.display = "block";

      //  }
      }
    }
  };
  // nous devons envoyer les données du formulaire via AJAX à PHP
  let formData = new FormData(form); // création d'un nouvel objet FormData
  xhr.send(formData); // envoi des données de formulaire à PHP
});
