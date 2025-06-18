<?php

//preguntamos si existe una variable $_SESSION llamada "validarIngreso"
if (!isset($_SESSION["validarIngreso"])) {
    echo '<script>window.location = "index.php?pagina=ingreso";</script>';
    return; //Para que nos saque y nos vuelva a la pagina de ingreso
} else {# si no existe la variable de $_SESSION
    if ($_SESSION["validarIngreso"] != "ok") {//si no es ok nos mande al inicio
        echo '<script>window.location = "index.php?pagina=ingreso";</script>';
        return; //Para que nos saque y nos vuelva a la pagina de ingreso
    }
}


#Instanciamos la clase y ejecutamos el método ctrSeleccionarRegistros()
$usuarios = ControladorFormularios::ctrSeleccionarRegistros(null, null);
?>
<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Fecha</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($usuarios as $key => $value): ?>
            <tr>
                <td><?php echo ($key + 1); ?></td>
                <td><?php echo $value["nombre"]; ?></td>
                <td><?php echo $value["email"]; ?></td>
                <td><?php echo $value["fecha"]; ?></td>
                <td>
                    <div class="btn-group">
                        <!--Iconos de font awesome-->
                        <!--Cambiamos por un ancor para que nos redirecciones a la pagina nueva-->
                        <!--Teniendo en cuenta que esta vez pasaremos dos variables y se concatena con &-->
                        <div class="px-1">
                            <!--Separamos los botones-->
                            <a href="index.php?pagina=editar&id=<?php echo $value["id"]; ?>" class="btn btn-warning"><i
                                    class="fas fa-pencil"></i></a>
                        </div>
                        <form method="post">
                            <!--Enviamos el parametro id de forma oculta-->
                            <input type="hidden" value="<?php echo $value["id"]; ?>" name="eliminarRegistro">
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                            <?php #hacemos el pedido al controlador --- metodo no estatico
                                $eliminar = new ControladorFormularios();
                                $eliminar->ctrElminarRegistro(); //falta crear el metodo
                                ?>
                        </form>
                    </div>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>