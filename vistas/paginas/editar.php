<?php
//Pregunto si viene una variable GET que se llame id

if (isset($_GET["id"])) {
    #reutilizamos el ctrSeleccionarRegistros() de formulario.controlador.php
    #con la diferencia que vamos a pasar dos parametros
    $item = "id";
    $valor = $_GET["id"];
    $usuario = ControladorFormularios::ctrSeleccionarRegistros($item, $valor);
}

?>

<div class="d-flex justify-content-center text-center">
    <form class="p-5 bg-warning method=" method="post">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" class="form-control" value="<?php echo $usuario["nombre"]; ?>"
                    placeholder="Escriba su nombre" id="nombre" name="actualizarNombre">
            </div>
        </div>
        <div class="form-group">
            <label for="email">Correo electronico</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                </div>
                <input type="email" class="form-control" value="<?php echo $usuario["email"]; ?>"
                    placeholder="Escriba su email" id="email" name="actualizarEmail">
            </div>
        </div>
        <div class="form-group">
            <label for="pwd">Contraseña</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                </div>
                <input type="password" class="form-control" value="<?php echo $usuario["password"]; ?>"
                    placeholder="Escriba su contraseña" id="pwd" name="actualizarPassword">
                <!--enviamos el password oculto en otro input-->
                <input type="hidden" name="passwordActual" value="<?php echo $usuario["password"]; ?>">
                <input type="hidden" name="idUsuario" value="<?php echo $usuario["id"]; ?>">
            </div>
        </div>

        <?php
        #si deseo que sea en donde me aparesca el mensaje
        $actualizar = ControladorFormularios::ctrActualizarRegistro();
        if ($actualizar == "ok") {
            echo '<script>
            if(window.history.replaceState){
                window.history.replaceState(null,null,window.location.href);
        }
                </script>';
            echo '<div class="alert alert-success">El usuario ha sido Actualizado</div>
            <script>
                 setTimeout(function(){
                    window.location = "index.php?pagina=inicio";
                },3000);
                </script>
        ';
        }
        ?>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>