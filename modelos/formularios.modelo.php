<?php
require_once "conexion.php";
class ModeloFormularios
{
    /*registro */
    static public function mdlRegistro($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO registros(nombre,email,password) VALUES (:nombre,:email,:password)"); #parametros secretos o ocultos.
        #bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo
        #de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
        #si el $stmr se ejecuta retorna ok

        if ($stmt->execute()) {
            return "ok";
            #code...
        } else { #si no se ejecuta retorna el error
            print_r(Conexion::conectar()->errorInfo());
        }
    }

    /*====== Seleccionar registros ======*/

    static public function mdlSeleccionarRegistros($tabla, $item, $valor)
    {
        if ($item == null && $valor == null) {#verificamos si los parametros vienen nulos
            $stmt = Conexion::conectar()->prepare("SELECT*, DATE_FORMAT(fecha, '%d/%m/%y') as fecha FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll();
        } else {// si los parametros traen información
            $stmt = Conexion::conectar()->prepare("SELECT*, DATE_FORMAT(fecha, '%d/%m/%y') as fecha FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();//devuelve un solo valor
        }
    }

    /*===== Actualizar registro ===== */
    static public function mdlActualizarRegistro($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, email = :email, password = :password WHERE id = :id");
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {
            print_r($stmt->errorInfo());
            return "error";
        }
    }

    /*==== Eliminar registro ==== */
    static public function mdlEliminarRegistro($tabla, $valor)
    {
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
        $stmt->bindParam(":id", $valor, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {
            print_r($stmt->errorInfo());
            return "error";
        }
        #$stmt->close(); #error del VSC
        #$stmt = null;
    }
}
?>