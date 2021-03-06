$(document).ready(function() {
  sessionStorage.clear();
  //conectar();
  crearUsuarios();
});

function conectar(){
  let url = '../server/conectarPHP.php'
  $.ajax({
    url: url,
    dataType: "json",
    cache: false,
    processData: false,
    contentType: false,
    type: 'POST',
    success: (data) =>{
      if(data){
        alert(data.msg);
      }
    },
    error: function(){
      alert("error en la comunicación con el servidor");
    }
  })
}

function crearUsuarios(){
  let url = '../server/create_user.php';
  $.ajax({
    url: url,
    dataType: "json",
    cache: false,
    processData: false,
    contentType: false,
    type: 'POST',
    success: (data) =>{
      console.log(data.msg);
    },
    error: function(){
      //console.log('Error en la comunicación con el servidor');
    }
  })
}

$(function(){
  var l = new Login();
})


class Login {
  constructor() {
    this.submitEvent()
  }

  submitEvent(){
    $('form').submit((event)=>{
      event.preventDefault()
      this.sendForm();
    })
  }

  sendForm(){
    let form_data = new FormData();
    form_data.append('username', $('#user').val())
    form_data.append('password', $('#password').val())
    $.ajax({
      url: '../server/check_login.php',
      dataType: "json",
      cache: false,
      processData: false,
      contentType: false,
      data: form_data,
      type: 'POST',
      success: function(php_response){
        if (php_response.msg == "OK") {
          sessionStorage.setItem("user", php_response.session);
          window.location.href = 'main.html';
        }else {
          alert(php_response.msg);
        }
      },
      error: function(){
        alert("error en la comunicación con el servidor");
      }
    })
  }
}
