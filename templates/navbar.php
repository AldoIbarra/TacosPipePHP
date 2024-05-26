<nav>
    <div class="container">
        <div class="row">
            <div class="col-8 btn-menu">
                <label for="btn-menu">☰</label>
                <a href="../../index.php">
                    <img src="../../resource/TacosPipeLogo.png" alt="" />
                </a>
                <a href="..\..\sections\orders\order.php" class="option">¡Ordena!</a>
                <a href="#menu" class="option">Nuestro menú</a>
                <a href="#" class="option">Sucursales</a>
                <!--trigger Modal login-->
                <!-- <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Iniciar Sesión
                </button>
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#carritoModal">
                    carrito
                </button> -->
                <!--trigger Modal login-->
            </div>
            <div class="col-4">
                <button type="button" onclick="profileUser()" id="signInSignUp">
                    <img src="../../resource/TacosPipeLogo.png" alt="" />
                </button>
                <div>
                    <a href="../../backend/cerrarSesion.php" id="closeSesion">Cerrar Sesión</a>
                </div>
            </div>
            <!-- <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                <?php
                    /*if($user != null && $user != ''){
                        echo '<a href="order.php">¡ORDENA YA!</a>';
                    }else{
                        echo '<a href="login.php">¡ORDENA YA!</a>';
                    }*/
                ?>
            </div> -->
        </div>
    </div>
    <input type="checkbox" id="btn-menu" />
    <div class="container-menu">
        <div class="cont-menu">
            <nav>
                <a href="..\..\sections\orders\order.php">¡Ordena!</a>
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
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="loginModalLabel">Iniciar sesión</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div>
                <form id="loginForm">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="email">Correo:</label>
                            <input type="email" name="correo" class="form-control is-invalid" placeholder="algo@algo.algo" />
                            <br />
                        </div>

                        <div class="form-group">
                            <label for="apellido">Contraseña:</label>
                            <input type="password" name="contrasena" class="form-control is-invalid" placeholder="Contraseña" />
                            <br />
                        </div>

                        <div class="form-group form-check">
                            <label for="avisoP" class="form-check-label">
                                <input class="form-check-input is-invalid" type="checkbox" name="checkSesion" value="mantener" checked />
                                Mantener sesión
                            </label>
                        </div>
                    </div>
                    <br />
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                        <button type="button" class="btn btn-outline-danger" id="dismiss" data-bs-dismiss="modal">
                            Cancelar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!--Modal Matchlogin-->
<div class="modal fade" id="enterEmailModal" tabindex="-1" aria-labelledby="enterEmailModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="writeEmailBody">
                  <div class="modal-body">
                      <div class="form-group">
                          <label for="email">Correo electronico:</label>
                          <input type="email" name="correo" class="form-control is-invalid" placeholder="algo@algo.algo" id="checkEmail" required/>
                          <br />
                      </div>
                  </div>
                  <br />
                  <div class="modal-footer">
                      <button type="button" class="btn btn-primary" onclick="checkEmail()">Continuar</button>
                      <button type="button" class="btn btn-outline-danger" id="dismiss" data-bs-dismiss="modal">
                          Cancelar
                      </button>
                  </div>
            </div>
        </div>
    </div>
</div>


<!--Modal login-->
<div class="modal fade" id="signUpModal" tabindex="-1" aria-labelledby="signUpModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="signUpModalLabel">Registrate</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div>
                <form id="signUpForm">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Correo:</label>
                            <input type="text" name="correo" ><br>
                            <br />
                        </div>

                        <div class="form-group">
                            <label for="">Contraseña:</label>
                            <input type="password" name="contrasena" id=""><br>
                            <br />
                        </div>

                        <div class="form-group">
                            <label for="">Nombre:</label>
                            <input type="text" name="nombre"><br>
                            <br />
                        </div>

                        <div class="form-group">
                            <label for="">Telefono:</label>
                            <input type="text" name="telefono" ><br>
                            <br />
                        </div>

                        <div class="form-group">
                            <label for="">Dirección:</label>
                            <input type="text" name="direccion" ><br>
                            <br />
                        </div>
                    </div>
                    <br />
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Registrarsme</button>
                        <button type="button" class="btn btn-outline-danger" id="dismiss" data-bs-dismiss="modal">
                            Cancelar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>