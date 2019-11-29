function validateForm(name, password){
  let inputName = document.getElementById(name).value
  let inputPassword = document.getElementById(password).value
  if(inputName == "" || inputPassword == ""){
    alert("Por favor, preencha todos os campos")
    return false
  }
  return true
}