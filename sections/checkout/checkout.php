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
                        <button id="pago" data-bs-toggle="modal" data-bs-target="#pagoModal" >Proceder al pago</button>
                    </div-->
                </div>
            </div>
        </section>

        <div class="modal fade" id="pagoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">

          <div class="modal-header">
            <h3 class="modal-title" >Carrito</h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <button type="button" class="btn btn-primary">Tarjeta</button>
          <button type="button" onclick="enviarDatos()" class="btn btn-primary">Efectivo</button>

          </div>
          <br>
          <div class="modal-footer" >
            <button type="submit" class="btn btn-primary"> Comprar</button>
            <button type="button" class="btn btn-outline-danger" id="dismiss" data-bs-dismiss="modal">
              Cancelar
            </button>
          </div>
        </form>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
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
    
    Swal.fire({
      title: "No tienes productos en el carrito",
      text: "Agrega productos y despues regresa aquí",
      icon: "warning",
      allowOutsideClick: false,
      allowEscapeKey: false
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href="http://localhost/TacosPipePHP/sections/orders/order.php";
      }
    });
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

    <script>
      function enviarDatos() {
    // Crear el objeto JSON
    let datos = {
        "idCarrito": <?php echo $_SESSION['usuario_carrito'] ?>,

        "idUsuario": <?php echo $_SESSION['usuario_id']?>,
        "tipoPedido": "domicilio"
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

    </script>

<?php include "../../templates/footer.php"; ?>