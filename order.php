<?php

require("./backend/sessionVerif.php")

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="order-styles.css">
        <title>Tacos Pipe</title>
    </head>



    <!-- <h1>Bienvenid@ <?= $_SESSION['usuario_nombre'] ?></h1>
    <a href="./backend/cerrarSesion.php">Cerrar Sesión</a> -->
    <nav>
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-0 btn-menu">
                    <label for="btn-menu">☰</label>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                    <a href="index.php"><img src="TacosPipeLogo.png" alt=""></a>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
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
    <body>
        <section id="Order">
            <div class="container">
                <div class="row">
                    <div class="col-12 order-top">
                        <h1>¿Qué va a llevar joven?</h1>
                    </div>
                    <div class="col-1">
                    </div>
                    <div class="col-10 do-order">
                        <div class="row">
                            <div class="col-7 food-card">
                                <img src="menu1.jpg" alt="">
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
                        </div>
                        <div class="row">
                            <div class="col-7 food-card">
                                <img src="menu2.jpg" alt="">
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
                                    <p id="two-number">1</p>
                                    <button>+</button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-7 food-card">
                                <img src="menu3.jpg" alt="">
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
                                <img src="menu4.jpg" alt="">
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
                                <img src="menu5.jpg" alt="">
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
                                <img src="menu6.jpg" alt="">
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
                        </div>
                    </div>
                    <div class="col-1">

                    </div>
                    <div class="col-12 order-now">
                        <button>Ordenar</button>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>