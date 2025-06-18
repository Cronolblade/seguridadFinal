<?php
class ControladorFormularios
{
    /* creamos un metodo de registro */
    static public function ctrRegistro()
    { # preguntamos si viene la variable POST registroNombre
        if (isset($_POST["registroNombre"])) { # si la variable post trae un valor se va a imprimir
            #creamos el parametro tabla donde queremos que se guarde la información.
            $tabla = "registros";
            #los datos se almacenan en un arreglo.
            #con propiedades y valores.
            $datos = array(
                "nombre" => $_POST["registroNombre"],
                "email" => $_POST["registroEmail"],
                "password" => $_POST["registroPassword"]
            );
            #pasamos los parametros instanciando el metodo Estatico
            #del formularios.modelo.php
            $respuesta = ModeloFormularios::mdlRegistro($tabla, $datos);
            return $respuesta;
        }
    }

    /*==== Seleccionar Registros ==== */

    static public function ctrSeleccionarRegistros($item, $valor)
    {
        $tabla = "registros";
        #falta crear mdlSeleccionarRegistros x eso marca error
        $respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);
        return $respuesta;
    }

    /*==== Ingreso al sistema ==== */

    public function ctrIngreso()
    {
        if (isset($_POST["ingresoEmail"])) {
            $tabla = "registros";
            $item = "email";
            $valor = $_POST["ingresoEmail"];
            $respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);

            if (
                $respuesta &&
                isset($respuesta["email"], $respuesta["password"]) &&
                $respuesta["email"] == $_POST["ingresoEmail"] &&
                $respuesta["password"] == $_POST["ingresoPassword"]
            ) {
                //echo "ingreso exitoso";
                $_SESSION["validarIngreso"] = "ok";
                echo '<script>
                if(window.history.replaceState){
                    window.history.replaceState(null,null,window.location.href);
                }
                window.location = "index.php?pagina=inicio";
                </script>';
            } else {
                //limpiar la memoria cache del navegador
                echo '<script>
                if(window.history.replaceState){
                    window.history.replaceState(null,null,window.location.href);
                }
                </script>';
                echo '<div class="alert alert-danger">Error al ingresar al sistema, el email o la contraseña no coinciden</div>';
            }
        }
    }

    /*==== Actualizar Registro ==== metodo estatico */
    static public function ctrActualizarRegistro()
    {
        if (isset($_POST['actualizarNombre'])) { #pregunto si viene la variable actaulizarNombre
            # Verificacmos si existe una contraseña nueva
            if ($_POST["actualizarPassword"] != "") {
                $password = $_POST["actualizarPassword"];
            } else {
                $password = $_POST["passwordActual"];
            }
            $tabla = "registros";
            $datos = array(
                "id" => $_POST["idUsuario"], #id del registro a actualizar
                "nombre" => $_POST["actualizarNombre"],
                "email" => $_POST["actualizarEmail"],
                "password" => $password
            );
            $respuesta = ModeloFormularios::mdlActualizarRegistro($tabla, $datos);
            return $respuesta;
        }
    }

    /*=== Eliminar Registro === no estatico ==*/
    public function ctrElminarRegistro()
    {
        if (isset($_POST["eliminarRegistro"])) {
            $tabla = "registros";
            $valor = $_POST["eliminarRegistro"];
            $respuesta = ModeloFormularios::mdlEliminarRegistro($tabla, $valor);
            if ($respuesta == "ok") {
                echo '<script>
                if(window.history.replaceState){
                    window.history.replaceState(null,null,window.location.href);
            }
                    window.location = "index.php?pagina=inicio";
                    </script>';
            }
        }
    }

}