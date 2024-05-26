<?php
$title="Registrate - Tacos";
$style="../../styles/login-signup.css";
include "../../templates/cabecera.php";
include "../../templates/navbar.php";
$javascript = "registro.js";
?>
<section id="form-container">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>¡Registrate!</h1>
                <form id="registroForm" >
                    <label for="">Correo:</label>
                    <input type="text" name="correo" ><br>
                    <label for="">Contraseña:</label>
                    <input type="password" name="contrasena" id=""><br>
                    <label for="">Nombre:</label>
                    <input type="text" name="nombre"><br>
                    <label for="">Telefono:</label>
                    <input type="text" name="telefono" ><br>
                    <label for="">Dirección:</label>
                    <input type="text" name="direccion" ><br>
            
                    <button type="submit">Registrarme</button>
                </form>
            </div>
        </div>
    </div>
</section>

<script>


 
</script>
<?php
    include "../../templates/footer.php";
?>