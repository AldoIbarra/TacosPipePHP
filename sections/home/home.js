var session;

$(document ).ready(function() {
    $.ajaxSetup({cache: false})
    $.get('../../api/getsession.php', function (data) {
        session = JSON.parse(data);
        checkSession();
        getLastOrder();
    });
    $('#signUpButton').prop('disabled', true);
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
    $('#checkEmail').val('');
    $('#enterEmailModal').modal("show");
}

function checkEmail(){
    email = $('#checkEmail').val();
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if($('#checkEmail').val() && regex.test(email)){
        $.ajax({
            type: "POST",
            url: "../../api/loginController.php",
            data: {
                email: email
            },
            success: function(data) {
                $('#enterEmailModal').modal("hide");
                $('#emailLogin').val($('#checkEmail').val());
                $('#loginModal').modal("show");
            },
            error: function(xhr, status, error) {
                $('#enterEmailModal').modal("hide");
                $('#signUpEmail').val($('#checkEmail').val());
                $('#signUpModal').modal("show");
            },
        });
    }
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

function getLastOrder(){
    console.log('entro a last order');
    console.log(session);
    if(Object.keys(session).length){
        fetch('http://localhost/TacosPipePHP/api/compraController.php/?idUsuario=' + session.usuario_id, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
        }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`Error HTTP: ${response.status}`);
            }
            return response.json();
        })
        .then(json => {
            $('#bar').hide();
            $('#last-order').show();
            console.log(json);
            console.log(json[0]);
            console.log(Object.keys(json).length)
        })
        .catch(function(error) {
            $('#last-order').hide();
            $('#bar').show();
            console.log('Hubo un problema con la petición Fetch:' + error.message);
        });
    }else{
        $('#last-order').hide();
        $('#bar').show();
        console.log('no hay una sesion iniciada o no hay pédidos');
    }
    
}

function checkPassword(){
    if($('#contrasena').val() == $('#confirmContrasena').val()){
        $('#signUpButton').prop('disabled', false);
        $("#confirmContrasena").removeClass("is-invalid");
    }else{
        $('#signUpButton').prop('disabled', true);
        $("#confirmContrasena").addClass("is-invalid");
    }
}