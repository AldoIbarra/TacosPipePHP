<nav>
    <div class="container">
        <div class="row">
            <div class="col-8 btn-menu">
                <label for="btn-menu">☰</label>
                <a href="../../index.php">
                    <img data-title="Menu Principal" data-intro="Aquí puedes hacer clic para ir al menú principal" src="../../resource/TacosPipeLogo.png" alt="" />
                </a>
                <a href="..\..\sections\orders\order.php" class="option" data-title="Ordenar" data-intro="Aquí puedes hacer clic para ordenar los platillos que quieras" >¡Ordena!</a>
                <a href="#menu" class="option" data-title="Menu" data-intro="Aquí puedes hacer clic para ver los platillos que tenemos disponibles">Nuestro menú</a>
                <a href="#branches" class="option" data-title="Sucursales" data-intro="Aquí puedes hacer clic para ver las sucursales a las cuales puedes acudir">Sucursales</a>
            </div>
            <div class="col-4">
                <button type="button" onclick="profileUser()" id="signInSignUp"  >
                    Ingresar
                </button>
                <div>
                    <a href="../../backend/cerrarSesion.php" id="closeSesion">Cerrar sesión</a>
                </div>
            </div>
        </div>
    </div>
    <input type="checkbox" id="btn-menu" />
    <div class="container-menu">
        <div class="cont-menu">
            <nav>
                <a href="..\..\sections\orders\order.php">¡Ordena!</a>
                <a href="#menu">Nuestro menú</a>
                <a href="#branches">Sucursales</a>
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
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="form-and-title">
                <h3>🤠</h3>
                <h3 class="modal-title" id="loginModalLabel">Parece ser que ya tienes cuenta con nosotros, ingresa tu correo y contraseña.</h3>
                <form id="loginForm">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="email">Correo:</label>
                            <input id="emailLogin" type="email" name="correo" class="form-control" placeholder="algo@algo.algo" />
                            <br />
                        </div>

                        <div class="form-group">
                            <label for="apellido">Contraseña:</label>
                            <input type="password" name="contrasena" class="form-control" placeholder="Contraseña" />
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
                <div class="title-container-writeEmailBody">
                    <h3>¡Hola!, proporcionanos tu correo electronico por favor 🙏🏽.</h3>
                </div>
                  <div class="modal-body">
                      <div class="form-group">
                          <label for="email">Correo electronico:</label>
                          <input type="email" name="correo" class="form-control" placeholder="algo@algo.algo" id="checkEmail" required/>
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


<!--Modal signUp-->
<div class="modal fade" id="signUpModal" tabindex="-1" aria-labelledby="signUpModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="form-and-title">
                <h3 class="modal-title" id="signUpModalLabel">¿Tons eres nuevo por aquí?, pasanos tus datos 🐮</h3>
                <form id="signUpForm">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="correo">Correo:</label>
                            <input class="form-control" type="text" name="correo" id="signUpEmail">
                        </div>

                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input class="form-control" type="text" name="nombre">
                        </div>

                        <div class="form-group">
                            <label for="telefono">Telefono:</label>
                            <input class="form-control" type="text" name="telefono" >
                        </div>

                        <div class="form-group">
                            <label for="direccion">Dirección:</label>
                            <input class="form-control" type="text" name="direccion" >
                        </div>

                        <div class="form-group">
                            <label for="contrasena">Contraseña:</label>
                            <input onkeyup="checkPassword()" class="form-control" type="password" name="contrasena" id="contrasena">
                        </div>

                        <div class="form-group">
                            <label for="confirmContrasena">Confirma tu contraseña:</label>
                            <input onkeyup="checkPassword()" class="form-control" type="password" name="confirmContrasena" id="confirmContrasena">
                        </div>
                    </div>
                    <br />
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="signUpButton">Registrarse</button>
                        <button type="button" class="btn btn-outline-danger" id="dismiss" data-bs-dismiss="modal">
                            Cancelar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>