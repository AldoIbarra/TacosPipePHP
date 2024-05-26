<?php
    $title="Tacos Pipe";
    $style="../../styles/styles.css";
    include "loginController.php";
    include "../../templates/cabecera.php";
    include "../../templates/navbar.php";
    $javascript = "home.js";
?>
<section id="bar">
    <h1>¡ES NUESTRO ANIVERSARIO!, DESCUENTOS POR TIEMPO LIMITADO</h1>
</section>
<section id="home-banner">
    <div class="container">
        <div class="row">
            <div class="col-6 text-section">
                <div>
                    <!-- <h1>hola <?= $_SESSION['usuario_nombre'] ?></h1> -->
                    <p>¡TACOS!</p>
                    <p>24/7</p>
                    <p>Bañaditos en salsa Pipe</p>
                    <p>Desde 1985</p>
                </div>
                <div>
                    <a href="">¿Vienes?</a>
                    <p>o</p>
                    <a href="">¿Vamos?</a>
                </div>
                
            </div>
            <div class="col-6 img-section">
                <img src="../../resource/TacosCow.png" alt="">
            </div>
        </div>
    </div>
</section>
<section id="menu">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>NUESTRO MENÚ</h1>
                <h3>(Imagen meramente ilustrativa)</h3>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 491.75 369.07">
                    <defs>
                        <style>
                            .cls-1,.cls-2,.cls-3,.cls-4,.cls-5,.cls-6,.cls-7,.cls-8,.cls-9{fill:none;stroke:#fff;stroke-miterlimit:10;}.cls-2{stroke-dasharray:7.3 7.3;}.cls-3{stroke-dasharray:6.9 6.9;}.cls-4{stroke-dasharray:6.78 6.78;}.cls-5{stroke-dasharray:7.12 7.12;}.cls-6{stroke-dasharray:7.12 7.12;}.cls-7{stroke-dasharray:6.85 6.85;}.cls-8{stroke-dasharray:7.43 7.43;}.cls-9{stroke-dasharray:7;}.cls-10{font-size:16px;}.cls-10,.cls-11,.cls-12{font-family:Poppins-Black, Poppins;font-weight:800;}.cls-11{font-size:20px;}.cls-12{font-size:18px;}
                        </style>
                    </defs>
                    <title>
                        Menú
                    </title>
                    <g id="Layer_2" data-name="Layer 2">
                        <g id="Layer_1-2" data-name="Layer 1">
                            <path d="M389.14,202.3c-2.59,1.21-5,1.93-6.89,3.31-2.81,2-5.42,4.36-8.12,6.56.63.89,1.26,1.79,1.86,2.72-.6-.93-1.23-1.83-1.86-2.72-1.05.84-2.1,1.68-3.19,2.46-2.35,1.71-2.58,3.32-1.53,5.87,4.13,10,7.37,20.42,12.32,30,4.07,7.85,9.67,15,15.37,21.88,4,4.75,7,9.41,5.93,15.65-2.49,14.76-5.18,29.48-7.83,44.21-.85,4.77-3.36,8.38-7,11.65-4.75,4.22-8.87,9.17-13.83,14.41,8.24,4.35,15.6,4.31,23.07,3.46,4.66-.53,7.24-2.78,6.73-7.92-.53-5.42-1.51-10.67,3.66-15.26,2.31-2.07,2.48-6.7,3.3-10.25.74-3.23,1-6.59,1.53-9.86a113,113,0,0,1,16.88-42.18C408.43,256,394.83,231.75,389.14,202.3Z"/>
                            <path d="M124.34,226l.68.41c-.09-.19-.17-.39-.26-.58Z"/>
                            <path d="M123.06,226.51q8.17,23.58,16.36,47.14c.22.61.81,1.09,1,1.7.65,1.79,1.69,3.62,1.71,5.44.17,14.47,0,28.95.25,43.42a12.27,12.27,0,0,1-4.58,10.27c-4.88,4.33-9.14,9.35-13.67,14.08l.7,1.89c3.6.81,7.19,1.75,10.82,2.34.82.13,2-.75,2.73-1.48,4.67-4.94,9.35-9.88,13.8-15a8.15,8.15,0,0,0,2.13-5.05q-.92-23-2.34-45.86c-.15-2.41-.52-5.47-2-7-4.9-5-4.94-11-5-17.16,0-1.36-.24-3.51-1.09-4-6.4-3.43-8.76-9.81-11.77-15.66-2.55-5-4.77-10.1-7.12-15.16l-.68-.41Z"/>
                            <path d="M131.17,229.68c2.29,5.17,4.63,10.31,7.08,15.41,1.45,3,3.71,6.89,6.46,7.83,4.57,1.55,4,4.21,4.21,7.59.23,4.23-.1,9.3,2.08,12.42a27.75,27.75,0,0,1,5,15.3c.6,12.31.85,24.67,2.07,36.92.74,7.43-.64,12.93-6.93,17.61-4.19,3.11-7.22,7.79-10.77,11.77l.83,1.91c4.85.78,9.67,2.05,14.53,2.23,12.64.47,14.14-1.3,13.49-13.71a11.33,11.33,0,0,1,1-5.49c2.05-4.06,5.49-7.68,6.57-11.94,3.51-13.85,6-28,9.29-41.89q5.61-23.75,12-47.3C176,240.75,151.64,239.4,131.17,229.68Z"/>
                            <path class="pecho" d="M238,150.39h0v0c-40.34-8.34-81.17-9.92-122-11.49A217.67,217.67,0,0,1,106,172q9.09,21.12,18.33,42.2c2.27,5.17,4.52,10.35,6.82,15.5,20.47,9.72,44.8,11.07,67,8.66v0c.81-3,2.94-6.88,5.44-7.85,9.23-3.58,18.22-8.29,28-9.88C238.15,198,239.64,174.34,238,150.39Z"/>
                            <path class="panza" d="M333.52,180.49l-.53.4.06-.63c-19.66-9.16-41.85-15-62.06-21.37-11-3.43-22-6.22-33-8.5,1.65,24,.16,47.63-6.35,70.18a40.25,40.25,0,0,1,8.61-.52,24.87,24.87,0,0,1,8.4,2.43c6.83,3,13.39,6.67,20.33,9.36,19.64,7.62,39.89,6.29,60.14,3.24A48.06,48.06,0,0,0,353,224.43c6.23-5.17,12.4-10.43,18.69-15.52C361.74,196.37,348.36,187.46,333.52,180.49Z"/>
                            <path d="M333,180.89l.53-.4-.47-.23Z"/>
                            <path class="cabeza" d="M134,14.4a49.81,49.81,0,0,0-17.7-.7,12.49,12.49,0,0,1-1.5,0c-3.74.06-6-1.17-5.76-5.53s-2.31-5.65-6.15-4.31a71.93,71.93,0,0,0-8.69,3.77c-5.35,2.69-10.51,2.62-14.68-1.8C70.3-3.91,59.33,1.37,48.92,1.9,48,2,46.89,3.08,46.25,4,43,8.68,38.73,10.73,32.8,11.16c-2.91.22-6.12,3.64-8.09,6.41-.91,1.28.21,4.88,1.48,6.68,3.8,5.38,4.67,7.85.57,12.92C19.37,46.32,11.2,54.84,3.55,63.78,2,65.66.3,68.15.11,70.47-1.13,86.3,8,95.11,23.81,93.4c6.46-.7,11.6.6,15.69,6.22,4.49,6.15,10.78,9.68,18.65,8.09,6.23-1.25,10.71,1.06,14.57,5.47,3.31,3.8,6.58,7.62,9.65,11.57,6.71,8.6,12.53,17.77,16,28.49,2,6.31,4.91,12.36,7.54,18.47,0,.09.07.18.11.27a217.67,217.67,0,0,0,10-33.09h0c8.74-39.29,8.92-80.52,17.29-119.69C133.54,17.65,133.74,16,134,14.4Z"/>
                            <path d="M238,150.32v.06h0Z"/>
                            <path d="M207,36l-.78-.07.82,2C207,37.25,207,36.6,207,36Z"/>
                            <path class="lomo" d="M232,107.89c-.17-1.37-.38-2.72-.61-4.07l-.39-1.93c-2-10-6-20-9-30a174.6,174.6,0,0,0-6.48-16.26A49.29,49.29,0,0,1,211,47.89c-1.82-4-3.53-8-5.22-12-9.3-.73-18.75-.83-28-2a38.64,38.64,0,0,1-17-6.37c-8.42-6.05-17.08-10.82-26.55-13L134,14.4c-.25,1.64-.45,3.25-.7,4.8.23-1.1.45-2.21.7-3.31-.25,1.1-.47,2.21-.7,3.31-.09.57-.19,1.14-.3,1.69.11-.55.21-1.12.3-1.69-8.37,39.17-8.55,80.4-17.29,119.69,40.82,1.57,81.65,3.15,122,11.49v-.06a353.81,353.81,0,0,0-6.61-46.5C231.61,105.17,231.82,106.52,232,107.89Z"/>
                            <path d="M231,101.89l.39,1.93C229,89.49,223.56,76.61,219,62.89a22.33,22.33,0,0,0-3.48-7.26A174.6,174.6,0,0,1,222,71.89C225,81.89,229,91.89,231,101.89Z"/>
                            <path class="lomo-enmedio" d="M320.49,40c-4.82.4-9.66.66-14.51.75-27.84.5-55.68,4.23-83.56-2.46A102.55,102.55,0,0,0,207,36c0,.65,0,1.3,0,1.94-.35-.69-.68-1.36-1-2h-.22c1.69,4,3.4,8,5.22,12a49.29,49.29,0,0,0,4.52,7.74c-2.95-6.58-6.23-13.16-9.52-19.74,3.29,6.58,6.57,13.16,9.52,19.74A22.33,22.33,0,0,1,219,62.89c4.57,13.72,10,26.6,12.39,40.93a353.81,353.81,0,0,1,6.61,46.5v.07c11,2.28,22,5.07,33,8.5,20.21,6.39,42.4,12.21,62.06,21.37C337.63,132.63,332.63,85.87,320.49,40Z"/>
                            <path d="M206.17,35.88l-.18,0c.32.67.65,1.34,1,2Z"/>
                            <path class="vacio" d="M333.52,180.49c14.84,7,28.22,15.88,38.17,28.42,1.51-1.23,3-2.45,4.55-3.65a33.66,33.66,0,0,1,9.09-5.19c-.11-.06-.23-.11-.34-.18.11.07.23.12.34.18l.12,0a201.71,201.71,0,0,0,15.89-37.77C378,153.58,352.05,166,333.52,180.49Z"/>
                            <path class="lomo-final" d="M400.18,26.29a116.89,116.89,0,0,0-22.44,3.31c-18.91,4.86-37.93,8.78-57.25,10.38,12.14,45.89,17.14,92.65,12.56,140.28l.47.23C352.05,166,378,153.58,401.34,162.26A228.21,228.21,0,0,0,400.18,26.29Z"/>
                            <path class="muslo" d="M491.67,224.11c-.79-4.72-3.18-8.68-5.85-12.92a80,80,0,0,1-12.21-50.44c1.38-15.75,3.8-31.32.49-47.21-2.05-9.85-2.56-20-3.57-30.09-.41-4.14-.06-8.35-.51-12.48-.87-8-2.5-15.8-8.34-22-3.3-3.49-6.69-6.92-9.7-10.65-4.89-6.08-10.74-10.89-18.64-11.41a270.07,270.07,0,0,0-33.16-.65,228.21,228.21,0,0,1,1.16,136c.55.2,1.1.4,1.65.63-.55-.23-1.1-.43-1.65-.63A201.71,201.71,0,0,1,385.45,200c.23-.08.45-.17.68-.24,4.8-1.53,6.42-.3,7.44,4.27,18.34,7.9,38.4,10.35,58.57,10,2.8-8.15,5.87-16.21,8.9-24.29a26.17,26.17,0,0,1,2.38-4l1.4.23a18.71,18.71,0,0,1,.51,4.22c-.87,8.12-2,16.2-2.81,24.32-.39,4.1-1.55,8.92.05,12.26,4.37,9.12,9.82,17.74,15.35,26.23.91,1.39,4.49,1.7,6.64,1.35,1-.17,2-3,2.37-4.71,1.29-5.42,5.1-10.46,2.66-16.52-.16-.4.69-1.12.83-1.75C490.94,229,492.05,226.41,491.67,224.11Z"/>
                            <path d="M393.57,204.06l.12.58a114.89,114.89,0,0,0,2.65,11.65,132,132,0,0,0,41.49,62.37c6,5.06,7.49,10.78,6.84,18.12a258.17,258.17,0,0,0-1.23,27.93,81.53,81.53,0,0,0,2.92,18.64c.75,2.92.42,4.43-1.57,6.45-4.27,4.35-8.22,9-13,14.29,9.47,5.61,17.93,6.33,26.6,2.9,1.23-.49,2.44-3.56,2.09-5.07-1.89-8.23-1.25-16,.19-24.43,4-23.44,6.6-47.14,9.05-70.81.45-4.33-1.61-9.49-3.94-13.43-4-6.83-7.71-13.46-7.9-21.72,0-2.22-1.87-5-3.74-6.45-3.06-2.28-4-5.12-3-8.19.32-.95.66-1.9,1-2.86C432,214.41,411.91,212,393.57,204.06Z"/>
                            <path class="cls-1" d="M105.91,171.71c.52-1,1-2.06,1.52-3.15"/>
                            <path class="cls-2" d="M110.16,161.79C123.47,124.85,125.79,57,132.69,22.41l.19-.93"/>
                            <line class="cls-1" x1="133.59" y1="17.89" x2="134.28" y2="14.46"/>
                            <path class="cls-1" d="M198.23,238.05c-.19,0-1.42.25-3.46.47"/>
                            <path class="cls-3" d="M187.89,239.1c-9.84.58-25.26.53-39.86-3.4-4.33-1.17-7.73-1.87-11.18-3.11"/>
                            <path class="cls-1" d="M133.65,231.29c-1-.46-2-1-3.11-1.61"/>
                            <path class="cls-1" d="M232.42,220.43c.2-1,.41-2.16.63-3.44"/>
                            <path class="cls-4" d="M234.12,210.3c4.49-30.69,9.5-101.8-25.15-168.39"/>
                            <path class="cls-1" d="M207.38,38.91c-.55-1-1.11-2-1.69-3.07"/>
                            <path class="cls-1" d="M371.16,209.2c.35.22-.14-.82-1.77-2.78"/>
                            <path class="cls-5" d="M364.44,201.32c-10.18-9.33-33.13-25.14-77.78-37.62-20.13-5.62-43.49-13.18-73.05-17.58-25.72-3.83-56.05-5.13-90.25-6.33"/>
                            <path class="cls-1" d="M119.8,139.66l-3.5-.12"/>
                            <path class="cls-1" d="M320.29,40c.31,1,.65,2.07,1,3.34"/>
                            <path class="cls-6" d="M323.26,50.2c5.71,21.27,14.51,64.9,10.29,123.65"/>
                            <path class="cls-1" d="M333.28,177.41c-.09,1.15-.19,2.32-.29,3.48"/>
                            <path class="cls-1" d="M400.83,26.24s.38,1.17,1,3.36"/>
                            <path class="cls-7" d="M403.49,36.23c5.81,24.81,16.76,91.93-14.28,157.35"/>
                            <path class="cls-1" d="M387.71,196.67c-.52,1-1,2.08-1.58,3.12"/>
                            <path class="cls-1" d="M333,180.89s.86-.94,2.51-2.43"/>
                            <path class="cls-8" d="M341.28,173.8c10.06-7.31,28.7-17.08,52.64-12.78"/>
                            <path class="cls-1" d="M397.56,161.78c1.12.26,2.25.56,3.39.88"/>
                            <path class="cls-9" d="M452.31,213.49s-36.39,3.19-59.22-11.19"/>
                            <text class="cls-10 svg-text" transform="translate(238.61 79.73)">
                                MENUDO
                            </text>
                            <text class="cls-10 svg-text" transform="translate(138.7 71.98)">
                                BURRITO
                            </text>
                            <text class="cls-11 svg-text" transform="translate(149.53 108.05)">
                                $100
                            </text>
                            <text class="cls-11 svg-text" transform="translate(255.13 122.91)">
                                $100
                            </text>
                            <text class="cls-11 svg-text" transform="translate(346.93 138.89)">
                                $100
                            </text>
                            <text class="cls-11 svg-text" transform="translate(270.25 218.69)">
                                $100
                            </text>
                            <text class="cls-11 svg-text" transform="translate(149.53 209.23)">
                                $100
                            </text>
                            <text class="cls-10 svg-text" transform="translate(123.06 171.98)">
                                ARRACHERA
                            </text>
                            <text class="cls-10 svg-text" transform="translate(334.73 71.98)">
                                GRINGA
                            </text>
                            <text class="cls-12 svg-text" transform="translate(339.11 97.1)">
                                (
                            </text>
                            <text class="cls-12 svg-text" transform="translate(392.51 97.1)">
                                )
                            </text>
                            <text class="cls-10 svg-text" transform="translate(246.49 189.14)">
                                PIRATA
                            </text>
                            <path class="cerdo" d="M388.74,93.35c-.29-.08-.26-.16-.31-.23-.26-.34-.48-.09-1.1-1-.87-1.22-.51-.91-.72-1.62s-.62-1.35-.43-1.68a7.71,7.71,0,0,0,.56-.69,12.09,12.09,0,0,0,.81-2.55.74.74,0,0,0,.05-.39c0-.15-.3.14-.33.17a16.89,16.89,0,0,0-1.47,1.25c-.09.09-.27.38-.42.36s0-.87-.26-.83-.1.12-.58.52a6.23,6.23,0,0,0-.57.58c-.14.16-.31,0-.46-.08-.59-.3-1.1-.75-1.71-1-5.35-2.31-7.28-2.39-12.41-2.64a60.57,60.57,0,0,0-8.7.4c-4.26.55-5.05,2-5.34,2.21a.75.75,0,0,1-.41.14c-2,.4-3.34.53-3.75-1.3a2,2,0,0,0,1.81-.63,1.19,1.19,0,0,0-.07-1.27c-.3-.34-.82-.12-1.15,0a2.06,2.06,0,0,0-.82.57s0,0,0,0a1.81,1.81,0,0,0-.34.83,6.13,6.13,0,0,1-1-2.51c.05.39.35,2.24,1,2.71a3,3,0,0,0,.38,1.41,1.7,1.7,0,0,0,1.16.94,4.57,4.57,0,0,0,2.35.14c-2,2-.59,5.8.73,8.34a1.38,1.38,0,0,1-.05,1.7c-.4.87.79,1.77.55,3.66-.13,1.06-.1.94.18,1.62.17.4.33.2.37.17s.3.29.33.37c.09.25.19.26.46.29s1.33,0,1.47-.17-.23-.52-.3-.65c.31,0,1.23,0,1.11-.3-.29-.67-.87-.79-.93-2.57a5.43,5.43,0,0,1,1.1-3.6,2.1,2.1,0,0,1,.36-.42c.16-.14.57.08.76.13.41.11,4.24.76,4.26.76.29,0,1.93.12,2.11.12s.3,0,2.19-.31a12,12,0,0,0,4.06-1c.24-.08.31-.2.6.3a8.79,8.79,0,0,1,.77,1.88c.07.29.1.6.15.9a5,5,0,0,0,.31.72c.28.86-.37,1.79.31,2.67a.6.6,0,0,0,.26.16c.22.1.28.62.6.65s.26.33.46.49.89.1,1.24.07c.13,0,.61,0,.65-.19s-.19-.45-.28-.54a3.26,3.26,0,0,1-.69-1.68,7.56,7.56,0,0,1,0-2,6.21,6.21,0,0,1,.32-1.94,3.65,3.65,0,0,1,.53-1.67c.24-.28.51-.17,1.66,0,3.38.53,1.48.5,4.09.46.33,0,.65-.07,1-.07,1.9,0,3.39.35,3.67-.29.1-.21.38,0,.45-.24a8.8,8.8,0,0,1,.27-1.48C389.56,93.27,389.12,93.47,388.74,93.35Zm-36.13-10h0Zm0,0Zm-.71.22c.24-.12.67-.34.85,0,.43.77-.73,1.4-1.59,1.26,0,0,0,0,0,0a1.69,1.69,0,0,1,.08-.5A1.42,1.42,0,0,1,351.91,83.54Z"/>
                        </g>
                    </g>
                </svg>
            </div>
        </div>
    </div>
</section>
    
<?php
    include "../../templates/footer.php";
?>
    