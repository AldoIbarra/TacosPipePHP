
<nav>
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-0 btn-menu">
                <label for="btn-menu">☰</label>
                <a href="../../backend/cerrarSesion.php">Cerrar Sesión</a>
                <!--trigger Modal login-->
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Iniciar Sesión
                </button>
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#carritoModal">
                    carrito
                </button>
                <!--trigger Modal login-->
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                <a href="../../index.php">
                <img src="../../resource/TacosPipeLogo.png" alt="">
                </a>
                
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                <?php
                    /*if($user != null && $user != ''){
                        echo '<a href="order.php">¡ORDENA YA!</a>';
                    }else{
                        echo '<a href="login.php">¡ORDENA YA!</a>';
                    }*/
                ?>
            </div>
        </div>
    </div>
    <input type="checkbox" id="btn-menu">
    <div class="container-menu">
        <div class="cont-menu">
            <nav>
                <a href="#">¡Ordena!</a>
                <a href="#menu">Nuestro menú</a>
                <a href="#">Sucursales</a>
                <a href="#">Nosotros</a>
                <a href="#">Contacto</a>
            </nav>
            <label for="btn-menu">✖️</label>
        </div>
    </div>
</nav>

<!--Modal login-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLabel">Iniciar sesión</h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <form id="loginForm">
            <div class="modal-body">

              <div class="form-group">
                  <label for="email">Correo:</label>
                  <input type="email"  name="correo" class="form-control is-invalid" placeholder="algo@algo.algo">
                  <br>
              </div>
      
              <div class="form-group">
                  <label for="apellido" >Contraseña:</label>
                  <input type="password" name="contrasena" class="form-control is-invalid" placeholder="Contraseña">
                  <br>
              </div>                  

              <div class="form-group form-check">
                  <label for="avisoP" class="form-check-label">
                  <input class="form-check-input is-invalid" type="checkbox" name="checkSesion" value="mantener" checked>
                  Mantener sesión 
                  </label>
              </div>

          </div>
          <br>
          <div class="modal-footer" >
            <button type="submit" class="btn btn-primary"> Iniciar Sesión</button>
            <button type="button" class="btn btn-outline-danger" id="dismiss" data-bs-dismiss="modal">
              Cancelar
            </button>
          </div>
        </form>
        </div>
      </div>
    </div>
    <!--Fin modal login-->

    <div class="modal fade" id="carritoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">

          <div class="modal-header">
            <h3 class="modal-title" >Carrito</h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          carrito

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