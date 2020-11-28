<?php 
    session_start();
    include("conexion.php");
    $usuarioQuery = "SELECT concat(c.nombres,' ',c.apellidos) Paciente, c.id, tt.nombre 
                    from clientes c
                    INNER JOIN clientes_tratamientos ct
                    ON c.id = ct.cliente_id
                    INNER JOIN tratamientos t
                    ON ct.tratamiento_id = t.id
                    INNER JOIN tipos_tratamientos tt
                    ON t.tipo_tratamiento_id = tt.id
                    ORDER BY c.nombres";

    $varsesion = $_SESSION['username'];
    if($varsesion == null || $varsesion == ""){
        echo'<script type="text/javascript">
            alert("Por favor inicie sesion");
            </script>';
        die();
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.css">
    <script src="https://kit.fontawesome.com/dbc2195786.js" crossorigin="anonymous"></script>
    <title>Mis Tratamientos</title>
</head>

<body style="background-color: #fbfbfe; font-family: sans-serif;">
    <center>
        <!-- Header -->
        <header class="header-home white">
            <div class="d-flex align-items-center content-header">
                <div class="col-4">
                    <a href="index.php">
                        <img style="width: 200px;" src="image/logo-clinica.svg" alt="Logo de Clinica">
                    </a>
                </div>
                <nav class="col-8 navigator">
                    <ul class="d-flex justify-content-end username-list">
                        <li class="px-3 username-list-item">
                            <span>
                                <?php
                                    echo $_SESSION['username'];
                                ?>
                                <div class="flecha">
                                    <img src="image/flecha-down.svg" alt="flecha">
                                </div>
                            </span>
                            <ul class="username-sublist">
                                <li class="username-subitem">
                                    <a href="mi-perfil.php">
                                        <div>
                                            <img src="image/perfil-dentista.svg" alt="mi perfil"> Mi perfil
                                        </div>
                                    </a>
                                </li>
                                <li class="username-subitem">
                                    <a href="mis-citas.php">
                                        <div>
                                            <img src="image/cita.svg" alt="cita"> Mis Citas
                                        </div>
                                    </a>
                                </li>
                                <li class="username-subitem">
                                    <a href="mis-tratamientos.php">
                                        <div>
                                            <img src="image/cita.svg" alt="close-sesion"> Mis Tratamientos
                                        </div>
                                    </a>
                                </li>
                                <li class="username-subitem">
                                    <a href="cerrar-sesion.php">
                                        <div>
                                            <img src="image/cerrar-sesion.svg" alt="close-sesion"> Cerrar sesión
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="d-flex justify-content-between">
                        <li>
                            <a href="index.php"> <i class="fas fa-home"></i> Inicio</a>
                        </li>
                        <li>
                            <a href="servicios.php"><i class="fa fa-stethoscope fa-fw"></i> Servicios</a>
                            <ul>
                                <li><a href="servicios-DisenoSonrisa.php">Diseño de Sonrisa</a></li>
                                <li><a href="servicios-PlanDental.php">Plan Dental</a></li>
                                <li><a href="servicios-blanqueamiento.php">Blanqueamiento</a></li>
                                <li><a href="servicios-LimpiezaDental.php">Limpieza Dental</a></li>
                                <li><a href="servicios-ortodoncia.php">Ortodoncia</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="sedes.php"><i class="fa fa-map-marker fa-fw"></i> Sedes</a>
                        </li>
                        <li>
                            <a href="nosotros.php"><i class="fas fa-users"></i> Nosotros</a>
                        </li>
                    </ul>
                </nav>

            </div>
            <div class="fila-color skyblue"></div>
        </header>

        <main>

            <div class="content-citas-personal">
                <h1>Mis Tratamientos</h1>
                <div class="table-citas-personal" style="max-width: 900px;">
                    <p style="text-align: end;">
                        <a href="editarMisTratamientos.php">
                            <i style="cursor: pointer;" class="fas fa-edit"></i>
                        </a>
                    </p>
                    <div>
                        <?php 
                            require 'conexion.php';
                            $result = mysqli_query($conexion, $usuarioQuery);
                            
                            while($row = mysqli_fetch_assoc($result)){
                            ?>
                            <div class="border-botom" style="position: relative;">
                                <div class="border-botom" style="position: relative;">
                                    <!-- <p   style="width: 25%;" ></p> -->
                                    <p   style="width: 100%;" class="text-center">
                                        <strong>Paciente: 
                                        <?php echo $row["Paciente"]; ?>
                                        </strong>
                                    </p>
                                    <!-- <div style="" class="d-flex justify-content-between align-items-center" > -->
                                        <!-- <button  style="height: 40px; margin-right: 10px;" type="submit" name="boton" class="btn btn-secondary borderd d-block">
                                            <i style="cursor: pointer;" class="fas fa-edit"></i>
                                        </button>
                                        <button  style="height: 40px; margin-right: 10px;" type="submit" name="boton" class="btn btn-danger borderd d-block">
                                            <i class="fas fa-trash-alt"></i>
                                        </button> -->
                                    <a href="agendarCitaMensual.php?id=<?php echo $row["id"]?>">
                                        <button style="position: absolute; right: 0;"  type="submit" name="boton" class="btn btn-light borderd d-block">+</button>
                                    </a>
                                    <!-- </div>     -->
                                </div>   
                            </div>
                 
                            <div class="d-flex border-bottom col-md-8 mb-3">
                                <p class="col-6 border-right">DNI Paciente</p>
                                <p class="col-6 ">Tratamiento</p>
                            </div>
                            <div class="d-flex col-md-8 mb-3">
                                <p class="col-6 border-right pt-3"><?php echo $row["id"] ?> </p>
                                <p class="col-6 pt-3"><?php echo $row["nombre"] ?> </p>
                            </div>
                        <?php } ?>
                    </div>
                    <br>

                    <!-- <div>
                        <div class="border-botom" style="position: relative;">
                            <div class="d-flex justify-content-between">
                                <p   style="width: 25%;" ></p>
                                <p   style="width: 100%;" class="text-center"><strong>Paciente: Rodrigo Pérez Paredes</strong></p>
                                <div style="" class="d-flex justify-content-between align-items-center" >
                                    <button  style="height: 40px; margin-right: 10px;" type="submit" name="boton" class="btn btn-secondary borderd d-block">
                                        <i style="cursor: pointer;" class="fas fa-edit"></i>
                                    </button>
                                    <button  style="height: 40px; margin-right: 10px;" type="submit" name="boton" class="btn btn-danger borderd d-block">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                    <a href="agendarCitaMensual.php">
                                        <button  type="submit" name="boton" class="btn btn-light borderd d-block">+</button>
                                    </a>
                                </div>    
                            </div>
                        </div>
                        <div class="d-flex border-bottom col-md-8 mb-3">
                            <p class="col-6 border-right">DNI Paciente</p>
                            <p class="col-6 ">Tratamiento</p>
                        </div>
                        <div class="d-flex col-md-8 mb-3">
                            <p class="col-6 border-right pt-3">46415385</p>
                            <p class="col-6 pt-3">Ortodoncia</p>
                        </div>
                    </div>

                    <br>
                    <div>
                        <div class="border-botom" style="position: relative;">
                            <div class="d-flex justify-content-between">
                                <p   style="width: 25%;" ></p>
                                <p   style="width: 100%;" class="text-center"><strong>Paciente: Rodrigo Pérez Paredes</strong></p>
                                <div style="" class="d-flex justify-content-between align-items-center" >
                                    <button  style="height: 40px; margin-right: 10px;" type="submit" name="boton" class="btn btn-secondary borderd d-block">
                                        <i style="cursor: pointer;" class="fas fa-edit"></i>
                                    </button>
                                    <button  style="height: 40px; margin-right: 10px;" type="submit" name="boton" class="btn btn-danger borderd d-block">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                    <a href="agendarCitaMensual.php">
                                        <button  type="submit" name="boton" class="btn btn-light borderd d-block">+</button>
                                    </a>
                                </div>    
                            </div>
                        </div>
                        <div class="d-flex border-bottom col-md-8 mb-3">
                            <p class="col-6 border-right">DNI Paciente</p>
                            <p class="col-6 ">Tratamiento</p>
                        </div>
                        <div class="d-flex col-md-8 mb-3">
                            <p class="col-6 border-right pt-3">55412385</p>
                            <p class="col-6">Rehabilitación Oral</p>
                        </div>
                    </div>

                    <br>
                    <div>
                        <div class="border-botom" style="position: relative;">
                            <div class="d-flex justify-content-between">
                                <p   style="width: 25%;" ></p>
                                <p   style="width: 100%;" class="text-center"><strong>Paciente: Rodrigo Pérez Paredes</strong></p>
                                <div style="" class="d-flex justify-content-between align-items-center" >
                                    <button  style="height: 40px; margin-right: 10px;" type="submit" name="boton" class="btn btn-secondary borderd d-block">
                                        <i style="cursor: pointer;" class="fas fa-edit"></i>
                                    </button>
                                    <button  style="height: 40px; margin-right: 10px;" type="submit" name="boton" class="btn btn-danger borderd d-block">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                    <a href="agendarCitaMensual.php">
                                        <button  type="submit" name="boton" class="btn btn-light borderd d-block">+</button>
                                    </a>
                                </div>    
                            </div>
                        </div>
                        <div class="d-flex border-bottom col-md-8 mb-3">
                            <p class="col-6 border-right">DNI Paciente</p>
                            <p class="col-6 ">Tratamiento</p>
                        </div>
                        <div class="d-flex col-md-8 mb-3">
                            <p class="col-6 border-right pt-3">45610242</p>
                            <p class="col-6">Implantes</p>
                        </div>
                    </div>

                    <br>
                    <div>
                        <div class="border-botom" style="position: relative;">
                            <div class="d-flex justify-content-between">
                                <p   style="width: 25%;" ></p>
                                <p   style="width: 100%;" class="text-center"><strong>Paciente: Rodrigo Pérez Paredes</strong></p>
                                <div style="" class="d-flex justify-content-between align-items-center" >
                                    <button  style="height: 40px; margin-right: 10px;" type="submit" name="boton" class="btn btn-secondary borderd d-block">
                                        <i style="cursor: pointer;" class="fas fa-edit"></i>
                                    </button>
                                    <button  style="height: 40px; margin-right: 10px;" type="submit" name="boton" class="btn btn-danger borderd d-block">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                    <a href="agendarCitaMensual.php">
                                        <button  type="submit" name="boton" class="btn btn-light borderd d-block">+</button>
                                    </a>
                                </div>    
                            </div>
                        </div>
                        <div class="d-flex border-bottom col-md-8 mb-3">
                            <p class="col-6 border-right">DNI Paciente</p>
                            <p class="col-6 ">Tratamiento</p>
                        </div>
                        <div class="d-flex col-md-8 mb-3">
                            <p class="col-6 border-right pt-3">45610280</p>
                            <p class="col-6">Periodoncia</p>
                        </div>
                    </div>
                    <br> -->
                    

                </div>
            </div>


            
            <footer class="footer-page skyblue">
                <div class="image-bg">
                </div>
                <div class="d-flex content-footer">
                    <div class="col-4">
                        <div>
                            <h1>DENTOiMAGEN</h1>
                            <p>C. Los Olivos 62, Los Olivos 15304</p>
                            <p><span>rio de atención</span> <br>
                                Lun a Vie. de 8am - 1pm y 3pm-8pm <br>
                                Sab y Dom. de 9am a 2pm
                            </p>
                        </div>
                    </div>
                    <div class="col-4">
                        <h3>Contacto</h3>
                        <ul>
                            <li>
                                <strong>Telf: </strong> (01) 540 0543
                            </li>
                            <li>
                                <strong>Cel: </strong> +51 924 800 200
                            </li>
                            <li>
                                <strong>Cel: </strong> +51 924 800 500
                            </li>
                            <li>
                                <strong>Correo: </strong> dentoimagen@servicios.pe
                            </li>
                        </ul>
                        <div>
                            <img style="width: 20px; cursor: pointer;" src="image/facebook.svg" alt="">
                            <img style="width: 20px; cursor: pointer;" src="image/instagram.svg" alt="">
                        </div>
                    </div>
                    <div class="col-4 ">
                        <h3>Formas de pago</h3>
                        <div class="d-flex justify-content-between">
                            <img src="image/amex.svg" alt="">
                            <img src="image/diners.svg" alt="">
                            <img src="image/visa.svg" alt="">
                            <img src="image/mastercard.svg" alt="">
                        </div>

                    </div>
                </div>
                <div class="col-12 pt-4 pb-2">
                    <p>Todos los derechos reservados © 2020 | DENTOiMAGEN</p>
                </div>

            </footer>
        </main>
    </center>




    <!-- jquery, popper, bootstrap     -->
    <script src="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.js"></script>
    <script src="app.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

</body>

</html>