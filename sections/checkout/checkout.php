<?php
$title="Revisar Pedido - Tacos Pipe";
$style="../../styles/order-styles.css";
include "../../templates/cabecera.php";
include "../../templates/navbar.php";
?>
    
    <body>
        
        <section id="Order">
            <div class="container">
                <div class="row">
                    <div class="col-12 order-top">
                        <h1>¿Asi esta bien su orden Joven?</h1>
                    </div>
                    <div class="col-1">
                    </div>
                    <div id="productos" class="col-10 do-order">
            
                        <!--div class="row">
                            <div class="col-7 food-card">
                                <img src="${producto.imagen}" alt="">
                                <div class="food-text">
                                    <div class="title-price">
                                        <h2> {producto.nombre}</h2>
                                        <h2> {producto.costo}</h2>
                                        <h2>{producto.subtotal} </h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-5 incdec-button">
                                <div>
                                <button></button>
                                <p >${producto.cantidad}</p>
                                <button></button>
                                </div>
                            </div>
                            
                        </div-->
                       
                    </div>
                    <div class="col-1">

                    </div>
                    <div class="col-12 order-now">
                        <p id=total>Total</p>
                    </div-->
                    <div class="col-12 order-now">
                        <button>Proceder al pago</button>
                    </div-->
                </div>
            </div>
        </section>

    <script>
        fetch('http://localhost/TacosPipePHP/api/productosCarritoController.php/?idCarrito=<?= $_SESSION['usuario_carrito'];?>', {
              method: 'GET',
              headers:{'ACTION': 'Productos'}
            })
            .then(response => {
              if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
              }
              return response.json();
            })
            .then(data => {
              //console.log(data);
              mostrarProductos(data);
              return fetch('http://localhost/TacosPipePHP/api/productosCarritoController.php/?idCarrito=<?= $_SESSION['usuario_carrito'];?>',{
                method: 'GET',
                headers:{'ACTION': 'Total'}
              });
             
            })
            .then(response => response.json())
            .then(data => {
            // Procesa los datos del segundo endpoint
            console.log('Datos del segundo endpoint:', data);
            mostrarTotal(data);

            })
            .catch((error) => {
              console.error('Error:', error);
            });

    function mostrarTotal(productos) {
    let contenedor = document.getElementById("total");
        
    
        let html = `
        <p> ${productos[0].totalCosto} </p>`;
        contenedor.innerHTML += html;
    
    }

    function mostrarProductos(productos) {
    let contenedor = document.getElementById("productos");

    productos.forEach(producto => {
        let html = `
        <div class="row">
            <div class="col-7 food-card">
                <img src="${producto.imagen}" alt="">
                <div class="food-text">
                    <div class="title-price">
                        <h2> ${producto.nombre}</h2>
                        <h2> ${producto.costo}</h2>
                        <h2>${producto.subtotal} </h2>
                    </div>
                </div>
            </div>
            <div class="col-5 incdec-button">
                <div>
                <button></button>
                <p >${producto.cantidad}</p>
                <button></button>
                </div>
            </div>

        </div>`;
        contenedor.innerHTML += html;
        });
    }
    </script>

<?php include "../../templates/footer.php"; ?>