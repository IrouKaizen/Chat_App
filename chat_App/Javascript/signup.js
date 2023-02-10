/*const form = document.querySelector(".signup form"),
continueBtn = form.querySelector(".button input");

form.onsubmit = (e)=>{
    e.preventDefault();//preventing form from submitting
}

continueBtn.onclick = ()=>{
    //Let's start AJAX
    let xhr = new XMLHttpRequest();//creating XML object
    xhr.open("POST", "php/signup.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                console.log(data);
            }
        }
    }
    //we have to send the form data through ajax to php
    let formData = new formData(form); //creating new formData Object
    xhr.send(formData);//sending the form data to php
}*/

const form = document.querySelector(".signup form"),
continueBtn = form.querySelector(".button input"),
errorText = form.querySelector(".error-txt");

form.addEventListener("submit", e => {
  e.preventDefault(); // empêcher la soumission du formulaire
});

continueBtn.addEventListener("click", () => {
  // Démarrons AJAX
  let xhr = new XMLHttpRequest(); // création de l'objet XML
  xhr.open("POST", "php/signup.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
       if (data == "success") {
            location.href = "users.php";
       }else{
        errorText.textContent = data;
        errorText.style.display = "block";

       }
      }
    }
  };
  // nous devons envoyer les données du formulaire via AJAX à PHP
  let formData = new FormData(form); // création d'un nouvel objet FormData
  xhr.send(formData); // envoi des données de formulaire à PHP
});
