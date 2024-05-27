var session;

$(document ).ready(function() {
    $.ajaxSetup({cache: false})
    $.get('../../api/getsession.php', function (data) {
        session = JSON.parse(data);
        checkSession();
    });
});

document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevenir el comportamiento predeterminado del formulario

    let boton=document.getElementById("dismiss");

    var correo = document.querySelector('input[name=correo]').value;
    var contrasena = document.querySelector('input[name=contrasena]').value;
    var checkSesion = document.querySelector('input[name=checkSesion]').checked;
    // Crear un objeto FormData a partir del formulario
    
    logIn(correo, contrasena, checkSesion);
});

document.getElementById('signUpForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevenir el comportamiento predeterminado del formulario

    // Crear un objeto FormData a partir del formulario
    var formData = new FormData(event.target);

    // Convertir el objeto FormData a un objeto JSON
    var data = Object.fromEntries(formData);

    var contrasena = data.contrasena;
    var correo = data.correo;
    var direccion = data.direccion;
    var nombre = data.nombre;
    var telefono = data.telefono;

    signUp(contrasena, correo, direccion, nombre, telefono);
    //Enviar el objeto JSON con Fetch
    
});

function signUp(contrasena, correo, direccion, nombre, telefono, ){
    var obj = {
        contrasena: contrasena,
        correo: correo,
        direccion: direccion,
        nombre: nombre,
        telefono: telefono
    };

    fetch('http://localhost/TacosPipePHP/api/usuariosController.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(obj)
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        return response.json();
    })
    .then(data => {
        console.log(data)
        window.location.href = 'http://localhost/TacosPipePHP/sections/home/home.php'; // reemplaza con tu URL

    })
    .catch((error) => {
        console.error('Error:', error);
    });
}

function logIn(correo, contrasena, checkSesion){
    let formData = {
        'correo': correo,
        'contrasena': contrasena,
        'checkSesion': checkSesion
    };

    // Enviar el objeto JSON con Fetch
    fetch('http://localhost/TacosPipePHP/api/usuariosController.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'ACTION': 'Login'
        },
        body: JSON.stringify(formData)
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        location.reload();
        return response.json();
    })
    .then(data => console.log(data))
    .catch((error) => {
        console.error('Error:', error);
    });
}

function profileUser(){
    $('#enterEmailModal').modal("show");
}

function checkEmail(){
    email = $('#checkEmail').val();
    $.ajax({
        type: "POST",
        url: "../../api/loginController.php",
        data: {
            email: email
        },
        success: function(data) {
            $('#enterEmailModal').modal("hide");
            $('#loginModal').modal("show");
        },
        error: function(xhr, status, error) {
            $('#enterEmailModal').modal("hide");
            $('#signUpModal').modal("show");
        },
    });
}

function checkSession(){
    if(Object.keys(session).length){
        $('#signInSignUp').hide();
        $('#closeSesion').show();
    }else{
        $('#signInSignUp').show();
        $('#closeSesion').hide();
    }
}