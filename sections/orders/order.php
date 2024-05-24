<?php
$title="Orden - Tacos Pipe";
$style="../../styles/order-styles.css";
include "../../templates/cabecera.php";
include "../../templates/navbar.php";
?>




    <!-- <h1>Bienvenid@ <?= $_SESSION['usuario_nombre'] ?></h1>
    <a href="./backend/cerrarSesion.php">Cerrar Sesión</a> -->
    
    <body>
        
        <section id="Order">
            <div class="container">
                <div class="row">
                    <div class="col-12 order-top">
                        <h1>¿Qué va a llevar joven?</h1>
                    </div>
                    <div class="col-1">
                    </div>
                    <div id="productos" class="col-10 do-order">
                    <?php //include "generarProductos.php";?>

                        <!--div class="row">
                            <div class="col-7 food-card">
                                <img src="../../resource/menu/menu1.jpg" alt="">
                                <div class="food-text">
                                    <div class="title-price">
                                        <h2>Ricos tacos</h2>
                                        <h2>$100</h2>
                                    </div>
                                    <p>5 tacos como deben ser, de res. Con la salsa Pipe de siempre.</p>
                                </div>
                            </div>
                            <div class="col-5 incdec-button">
                                <div>
                                    <button>-</button>
                                    <p id="one-number">1</p>
                                    <button>+</button>
                                </div>
                            </div>
                        </div-->

                        <div class="row">
                            <div class="col-7 food-card">
                                <img src="../../resource/menu/menu2.jpg" alt="">
                                <div class="food-text">
                                    <div class="title-price">
                                        <h2> nombre</h2>
                                        <h2>  costo </h2>
                                    </div>
                                    <p>descripcion</p>
                                </div>
                            </div>
                            <div class="col-5 incdec-button">
                                <div>
                                <button onclick="disminuir()">-</button>
                                <p class="cantidad">1</p>
                                <button onclick="incrementar()">+</button>
                                </div>
                            </div>
                            <div class="col-12 order-now">
                            <button onclick="addCarrito(this.value)" value="id" >Agregar al carrito</button>
                            </div>
                        </div>
                        <!--div class="row">
                            <div class="col-7 food-card">
                                <img src="../../resource/menu/menu3.jpg" alt="">
                                <div class="food-text">
                                    <div class="title-price">
                                        <h2>Ricos tacos</h2>
                                        <h2>$100</h2>
                                    </div>
                                    <p>5 tacos como deben ser, de res. Con la salsa Pipe de siempre.</p>
                                </div>
                            </div>
                            <div class="col-5 incdec-button">
                                <div>
                                    <button>-</button>
                                    <p id="three-number">1</p>
                                    <button>+</button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-7 food-card">
                                <img src="../../resource/menu/menu4.jpg" alt="">
                                <div class="food-text">
                                    <div class="title-price">
                                        <h2>Ricos tacos</h2>
                                        <h2>$100</h2>
                                    </div>
                                    <p>5 tacos como deben ser, de res. Con la salsa Pipe de siempre.</p>
                                </div>
                            </div>
                            <div class="col-5 incdec-button">
                                <div>
                                    <button>-</button>
                                    <p id="four-number">1</p>
                                    <button>+</button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-7 food-card">
                                <img src="../../resource/menu/menu5.jpg" alt="">
                                <div class="food-text">
                                    <div class="title-price">
                                        <h2>Ricos tacos</h2>
                                        <h2>$100</h2>
                                    </div>
                                    <p>5 tacos como deben ser, de res. Con la salsa Pipe de siempre.</p>
                                </div>
                            </div>
                            <div class="col-5 incdec-button">
                                <div>
                                    <button>-</button>
                                    <p id="five-number">1</p>
                                    <button>+</button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-7 food-card">
                                <img src="../../resource/menu/menu6.jpg" alt="">
                                <div class="food-text">
                                    <div class="title-price">
                                        <h2>Ricos tacos</h2>
                                        <h2>$100</h2>
                                    </div>
                                    <p>5 tacos como deben ser, de res. Con la salsa Pipe de siempre.</p>
                                </div>
                            </div>
                            <div class="col-5 incdec-button">
                                <div>
                                    <button>-</button>
                                    <p id="six-number">1</p>
                                    <button>+</button>
                                </div>
                            </div>
                        </div-->
                    </div>
                    <div class="col-1">

                    </div>
                    <!--div class="col-12 order-now">
                        <button>Ordenar</button>
                    </div-->
                </div>
            </div>
        </section>

     <script>
            fetch('http://localhost/TacosPipePHP/api/productosController.php/?categoria=Platillo', {
              method: 'GET',
            })
            .then(response => {
              if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
              }
              return response.json();
            })
            .then(data => {
              console.log(data);
              mostrarProductos(data);
            })
            .catch((error) => {
              console.error('Error:', error);
            });


    function mostrarProductos(productos) {
    let contenedor = document.getElementById("productos");

    productos.forEach(producto => {
        let html = `
        <div class="row">
            <div class="col-7 food-card">
                <img src="${producto.imagen}" alt="">
                <div class="food-text">
                    <div class="title-price">
                        <h2>${producto.nombre}</h2>
                        <h2>${producto.costo}</h2>
                    </div>
                    <p>${producto.descripcion}</p>
                </div>
            </div>
            <div class="col-5 incdec-button">
                <div>
                    <button onclick="disminuir()">-</button>
                    <p class="cantidad">1</p>
                    <button onclick="incrementar()">+</button>
                </div>
            </div>
            <div class="col-12 order-now">
                <button onclick="addCarrito(this.value)" value="${producto.id}">Agregar al carrito</button>
            </div>
        </div>`;
        contenedor.innerHTML += html;
        });
    }

    //document.addEventListener('DOMContentLoaded', (event) => {
    // Primero, seleccionamos los elementos del DOM
    let cantidad = document.querySelector('.cantidad');

function incrementar() {
    cantidad.textContent = parseInt(cantidad.textContent) + 1;
}

function disminuir() {
    if (parseInt(cantidad.textContent) > 1) {
        cantidad.textContent = parseInt(cantidad.textContent) - 1;
    }
}



     </script>

     <script>

    function addCarrito(producto) {
    // Crear el objeto con los datos del producto
    id="<?php echo $_SESSION['usuario_carrito']; ?>";
    let data = {
        'idCarrito' : parseInt(id),
        'productoID': producto,
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
        .then(data => console.log(data))
        .catch(error => console.error('Error:', error));
    }
     </script>   
    <?php include "../../templates/footer.php"; ?>