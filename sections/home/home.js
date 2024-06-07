var session;

$(document ).ready(function() {
    $.ajaxSetup({cache: false})
    $.get('../../api/getsession.php', function (data) {
        session = JSON.parse(data);
        checkSession();
        getLastOrder();
    });
    $('#signUpButton').prop('disabled', true);

    $(".burrito").hover(function(){
            $(this).css("fill", "green");
            $(".burrito-text").css("fill", "yellow");
        }, function(){
            $(this).css("fill", "black");
            $(".burrito-text").css("fill", "green");
    });

    $(".burrito-text").hover(function(){
            $(".burrito-text").css("fill", "yellow");
            $(".burrito").css("fill", "green");
        }, function(){
            $(".burrito-text").css("fill", "green");
            $(".burrito").css("fill", "black");
    });

    $(".menudo").hover(function(){
            $(this).css("fill", "green");
            $(".menudo-text").css("fill", "yellow");
        }, function(){
            $(this).css("fill", "black");
            $(".menudo-text").css("fill", "green");
    });

    $(".menudo-text").hover(function(){
            $(".menudo-text").css("fill", "yellow");
            $(".menudo").css("fill", "green");
        }, function(){
            $(".menudo-text").css("fill", "green");
            $(".menudo").css("fill", "black");
    });

    $(".arrachera").hover(function(){
            $(this).css("fill", "green");
            $(".arrachera-text").css("fill", "yellow");
        }, function(){
            $(this).css("fill", "black");
            $(".arrachera-text").css("fill", "green");
    });

    $(".arrachera-text").hover(function(){
            $(".arrachera-text").css("fill", "yellow");
            $(".arrachera").css("fill", "green");
        }, function(){
            $(".arrachera-text").css("fill", "green");
            $(".arrachera").css("fill", "black");
    });

    $(".pirata").hover(function(){
            $(this).css("fill", "green");
            $(".pirata-text").css("fill", "yellow");
        }, function(){
            $(this).css("fill", "black");
            $(".pirata-text").css("fill", "green");
    });

    $(".pirata-text").hover(function(){
            $(".pirata-text").css("fill", "yellow");
            $(".pirata").css("fill", "green");
        }, function(){
            $(".pirata-text").css("fill", "green");
            $(".pirata").css("fill", "black");
    });

    $(".gringa").hover(function(){
            $(this).css("fill", "green");
            $(".gringa-text").css("fill", "yellow");
        }, function(){
            $(this).css("fill", "black");
            $(".gringa-text").css("fill", "green");
    });

    $(".gringa-text").hover(function(){
            $(".gringa-text").css("fill", "yellow");
            $(".gringa").css("fill", "green");
        }, function(){
            $(".gringa-text").css("fill", "green");
            $(".gringa").css("fill", "black");
    });

    $(".cabeza").hover(function(){
            $(this).css("fill", "green");
            $(".cabeza-text").css("fill", "yellow");
        }, function(){
            $(this).css("fill", "black");
            $(".cabeza-text").css("fill", "green");
    });

    $(".cabeza-text").hover(function(){
            $(".cabeza-text").css("fill", "yellow");
            $(".cabeza").css("fill", "green");
        }, function(){
            $(".cabeza-text").css("fill", "green");
            $(".cabeza").css("fill", "black");
    });

    $(".menudo-g").click(function(){
        console.log('click en menudo');
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
        showToast();
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
            var max = 3;
            var cont = 0;
            json[0].productos.forEach(function(row) {
                if(cont < max){
                    $('.products-container').append(setDashboardProduct(row.imagen, row.nombre, row.costo));
                }
                ++cont;
            });
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

function setDashboardProduct(img, title, price){
    var tag = '<div class="product"><img src="' + img + '" alt=""><div><h5>' + title + '</h5><h6>$' + price + '</h6></div></div>';
    return tag;
}

function showToast(){
    $('#toastSignUp').show();
    setTimeout(() => {
        $('#toastSignUp').hide();
      }, 3000);
}