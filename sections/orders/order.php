<?php
$title="Orden - Tacos Pipe";
$style="../../styles/order-styles.css";
include "../../templates/cabecera.php";
include "../../templates/navbar.php";
$javascript = "order.js";
?>




    <!-- <h1>Bienvenid@ <?= $_SESSION['usuario_nombre'] ?></h1>
    <a href="./backend/cerrarSesion.php">Cerrar Sesión</a> -->
        
<section id="Order">
    <div class="container" data-title="Menu" data-intro="Aqui tienes los platillos que puedes agregar al carrito">
        <div class="row">
            <div class="col-12 order-top">
                <h1>¿Qué va a llevar joven?</h1>
            </div>
            <div class="col-1">
            </div>
            <div id="productos" class="col-10 do-order">
                <?php //include "generarProductos.php";?>
            </div>
            <div class="col-1">
            </div>
            <!--div class="col-12 order-now">
                <button>Ordenar</button>
            </div-->
        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-0 cart-menu">
        <label for="cart-menu" data-title="Carrito" data-intro="Aquí puedes ver los productos que has agregado al carrito y proceder al pago" ><img src="../../resource/cart.svg" alt=""></label>
    </div>
    
    <input type="checkbox" id="cart-menu">
    <div class="container-menu">
        <div class="cont-cartmenu">
            <section class="checkout">
                <label id="close-button" for="cart-menu">✖️</label>
                <div class="h-info checkout-item">
                    <h3>Tu orden</h3>
                    <h5>Envío a domicilio</h5>
                </div>
                <div class="checkout-item">
                    <h4>Tu dirección de entrega</h4>
                    <h5 id="adress"></h5>
                </div>
                <div class="h-info checkout-item">
                    <h4>Entrega estimada</h4>
                    <h5>45-60 mins</h5>
                </div>
                <div class="h-info checkout-item">
                    <h4>Metodo de pago</h4>
                    <h5>Efectivo</h5>
                </div>
                <h4>Mi orden</h4>
                <div class="checkout-item" id="checkout-products">
                    
                </div>
                <div class="checkout-item checkout-totals">
                    <div>
                        <h4>Total a pagar</h4>
                        <h4 id="order-total"></h4>
                    </div>
                    <button onclick="enviarDatos();">Realizar pedido</button>
                </div>
            </section>
            <section class="no-products">
                <div>
                    <label id="close-button" for="cart-menu">✖️</label>
                </div>
                <div>
                    <h3>Aún no hay productos en tu carrito.</h3>
                </div>
            </section>
        </div>
    </div>
</section>

<div id="toastCart" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
    <strong class="mr-auto">Exitoso</strong>
    <img src="../../resource/TacosPipeLogo.png" class="rounded mr-2" alt="...">
  </div>
  <div class="toast-body">
     Agregado al carrito.
  </div>
</div>

<div id="toastPedido" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
    <strong class="mr-auto">Exitoso</strong>
    <img src="../../resource/TacosPipeLogo.png" class="rounded mr-2" alt="...">
  </div>
  <div class="toast-body">
     Pedido realizado exitosamente.
  </div>
</div>

<script src="../home/home.js"></script>

<?php include "../../templates/footer.php"; ?>