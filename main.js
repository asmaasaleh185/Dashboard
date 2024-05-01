const signUpBtn = document.getElementById("signUpBtn");
const logInBtn = document.getElementById("logInBtn");
const signUpForm = document.getElementById("signUp");
const logInForm = document.getElementById("logIn");

signUpBtn.addEventListener('click',function(){
    logInForm.style.display="none";
    signUpForm.style.display="block";
})
logInBtn.addEventListener('click', function(){
    logInForm.style.display="block";
    signUpForm.style.display="none";
})