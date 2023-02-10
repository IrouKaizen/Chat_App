const pswrdField = document.querySelector(".form input [type='password']");
toggleBtn = document.querySelector(".form .field .i");

toggleBtn.onclick = ()=>{
    if (pswrdField.type == "password") {
        pswrdField.type = "text";
        toggleBtn.ClassList.add("active");
    } else {
        pswrdField.type = "password";
        toggleBtn.ClassList.remove("active");
    }
}
