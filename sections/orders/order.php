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
    <div class="container">
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
</section>
    <?php include "../../templates/footer.php"; ?>