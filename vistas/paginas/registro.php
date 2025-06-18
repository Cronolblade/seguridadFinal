<!-- creamos el div y con d-flex cambiamos el tamaño del formulario,
 con justify-content-center entramos el formulario,
 con text-center centramos las etiquetas -->
<div class="d-flex justify-content-center text-center">
    <!-- para ponerle en un recuadro primero le ponemos un pading de 5 en todos sus lados
     y para el tono un bn-info-->

    <form class="p-5 bg-info" method="post">
        <!--<h1>Registro</h1>--> <!--para diferenciar las paginas-->
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Enter Nombre" id="nombre" name="registroNombre">
            </div>
        </div>

        <div class="form-group">
            <label for="email">Correo electronico:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                </div>
                <input type="email" class="form-control" placeholder="Enter email" id="email" name="registroEmail">
            </div>
        </div>

        <div class="form-group">
            <label for="pwd">Contraseña:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                </div>
                <input type="password" class="form-control" placeholder="Enter password" id="pwd"
                    name="registroPassword">
            </div>
        </div>
        <?php
        # creamos un objeto que va a instanciar la clase de formulario
        # Forma en que se instancia la clase de un metodo NO ESTATICO.
        // $registro = new ControladorFormularios(); # instanciamos las clases
        // $registro->ctrRegistro(); # ejecutamos el metodo
        
        # forma en que se instancia la clase de un metodo ESTATICO.
        
        $registro = ControladorFormularios::ctrRegistro();
        if($registro == "ok"){
            echo '<div class="alert alert-success">El usuario ha sido registrado</div>';
        }
        ?>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>