var session;

$(document ).ready(function() {
    $.ajaxSetup({cache: false})
    $.get('../../api/getsession.php', function (data) {
        session = JSON.parse(data);
        console.log(session);
    });

    fetch('http://localhost/TacosPipePHP/api/productosController.php/?categoria=Platillo', {
    method: 'GET',
    }).then(response => {
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        return response.json();
    }).then(data => {
        mostrarProductos(data);
        introJs().setOption("dontShowAgain", true).start();
    }).catch((error) => {
        console.error('Error:', error);
    });
    var total = 0;

});



$('#cart-menu').change(
    function(){
        if (this.checked) {
            console.log('cambio');
            if(session){
                $('#adress').text(session.usuario_direccion);
                getCartProducts();
            }else{
                console.log('no hay sesion iniciada');
            }
        }
    }
);

function getCartProducts(){
    console.log('obtiene los productos del carrito');
    fetch('http://localhost/TacosPipePHP/api/productosCarritoController.php/?idCarrito=' + session.usuario_carrito, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'ACTION': 'Productos'
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`Error HTTP: ${response.status}`);
        }
        return response.json();
    })
    .then(json => {
        $('.no-products').hide();
        $('.checkout').show();
        total = 0;
        console.log(json);
        $('#checkout-products').empty();
        json.forEach(function(row) {
            $('#checkout-products').append(setProduct(row.imagen, row.nombre, row.subtotal, row.cantidad));
            total += parseFloat(row.subtotal);
        });
        $('#order-total').text('$' + total);
    })
    .catch(function(error) {
      console.log(error);
        
      $('.no-products').show();
      $('.checkout').hide();
    });
}

function setProduct(img, nombre, subtotal, cantidad){
    
    html = '<div class="checkout-product"><img src="' + img + '" alt=""><div class="items-cart"><p>' + nombre + '</p><p>' + subtotal + '</p></div><p>Cantidad: ' + cantidad + '</p></div>'
    return html;
}



function mostrarProductos(productos) {
    let contenedor = document.getElementById("productos");

    productos.forEach(producto => {
        let html = `
        <div class="row" data-title="Platillo" data-intro="Aquí puedes ver el platillo con su descripción y precio">
            <div class="col-3 image-container">
                <img src="${producto.imagen}" alt="">
            </div>
            <div class="col-6 food-text">
                <div class="title-price">
                    <div>
                        <h2>${producto.nombre}</h2>
                    </div>
                    <div>
                        <h2>$${producto.costo}</h2>
                    </div>
                </div>
                <p>${producto.descripcion}</p>
            </div>
            <div class="col-3 add-products">
                <div class="incdec-button" data-title="Cantidad" data-intro="Aquí puedes controlar la cantidad de productos que vas a mandar al carrito">
                    <button onclick="disminuir('dish${producto.id}')">-</button>
                    <p class="cantidad" id="dish${producto.id}">1</p>
                    <button onclick="incrementar('dish${producto.id}')">+</button>
                </div>
                <div class="add-to-cart">
                    <button data-title="Agregar al carrito" data-intro="Con este botón puedes agregas el platillo al carrito" onclick="addCarrito(this.value)" value="${producto.id}" >Agregar al carrito</button>
                </div>
            </div>
            <div class="col-12 order-now">
            </div>
        </div>`;
        contenedor.innerHTML += html;
    });
}


//document.addEventListener('DOMContentLoaded', (event) => {
// Primero, seleccionamos los elementos del DOM

function incrementar(dishId) {
    var num = parseInt($('#' + dishId).text());
    num++;
    $('#' + dishId).text(num);
}

function disminuir(dishId) {
    var num = parseInt($('#' + dishId).text());
    if (num > 0) {
        num--;
        $('#' + dishId).text(num);
    }
}

function addCarrito(producto) {
    //Crear el objeto con los datos del producto
    let data = {
        'idCarrito' : parseInt(session.usuario_carrito),
        'productoID': parseInt(producto),
        'cantidad': parseInt($('#dish' + producto).text())
    }; console.log(JSON.stringify(data));

    
    
    let options = {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    };
    // Realizar la petición fetch
    fetch('http://localhost/TacosPipePHP/api/productosCarritoController.php', options)
        .then(response => response.json())
        .then(data => {
            showToast();
        })
        .catch(error => console.error('Error:', error));
}

function enviarDatos() {
    // Crear el objeto JSON
    let datos = {
        "idCarrito": session.usuario_carrito,
        "idUsuario": session.usuario_id,
        "tipoPedido": "sucursal"
    };

    // Hacer la petición fetch
    fetch('http://localhost/TacosPipePHP/api/compraController.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(datos)
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`Error HTTP: ${response.status}`);
        }
        return response.json();
    })
    .then(json => {
        console.log(json);

        Swal.fire("SweetAlert2 is working!");
        alert('Pago procesado con exito, pedido exitoso');
        window.location.href = 'http://localhost/TacosPipePHP/sections/home/home.php';
        
    })
    .catch(function(error) {
      
        console.log('Hubo un problema con la petición Fetch:' + error.message);
        alert('Hubo un error al procesar su pago');
        location.reload();
    });
}

function showToast(){
    $('#toastCart').show();
    setTimeout(() => {
        $('#toastCart').hide();
      }, 3000);
}

//introJs().refresh();