const todos = document.querySelector(".tudo");
const logon = document.querySelector(".loglink");
const register = document.querySelector(".signlink");

register.addEventListener("click", ()=>{todos.classList.add('active');
});

logon.addEventListener("click", ()=>{todos.classList.remove('active');
});


var check = function() {
  if (document.getElementById('password').value ==
  document.getElementById('confirm_password').value) {
    document.getElementById('confirm_password').style.color = 'green';
  
 document.getElementById("submit").disabled = false;
    
  } else {    document.getElementById('confirm_password').style.color = "red";
 
  document.getElementById("submit").disabled = true;
}}
