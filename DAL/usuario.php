<?php

require_once "conexion.php";

function IngresaAlumno($pNombre, $pCorreo, $pTelefono) {
    $retorno = false;

    try {
        $oConexion = Conecta();

        //formato utf8
        if(mysqli_set_charset($oConexion, "utf8")){
            $stmt = $oConexion->prepare("insert into alumno (nombre, correo, telefono) values (?, ?, ?)");
            $stmt->bind_param("sss", $iNombre, $iCorreo, $iTelefono);

            //set parametros y luego ejecutarlo
            $iNombre = $pNombre;
            $iCorreo = $pCorreo;
            $iTelefono = $pTelefono;

            if($stmt->execute()){
                $retorno = true;
            }
        }
    } catch (\Throwable $th) {
        //Bitacora
        echo $th;
    } finally {
        Desconecta($oConexion);
    }

    return $retorno;
}

function getArray($sql) {
    try {
        $oConexion = Conecta();

        //formato utf8
        if(mysqli_set_charset($oConexion, "utf8")){
            if(!$result = mysqli_query($oConexion, $sql)) die(); //cancelar el programa
            $retorno = array();
            while ($row = mysqli_fetch_array($result)) {
                $retorno[] = $row;
            }
        }
    } catch (\Throwable $th) {
        //Bitacora
        echo $th;
    } finally {
        Desconecta($oConexion);
    }
    return $retorno;
}

function getObject($sql) {
    try {
        $oConexion = Conecta();

        //formato utf8
        if(mysqli_set_charset($oConexion, "utf8")){
            if(!$result = mysqli_query($oConexion, $sql)) die(); //cancelar el programa
            $retorno = null;
            while ($row = mysqli_fetch_array($result)) {
                $retorno = $row;
            }
        }
    } catch (\Throwable $th) {
        //Bitacora
        echo $th;
    } finally {
        Desconecta($oConexion);
    }
    return $retorno;
}

function DefinirContrasena($pCorreo, $pPassword) {
    $retorno = false;

    try {
        $oConexion = Conecta();

        //formato utf8
        if(mysqli_set_charset($oConexion, "utf8")){
            $stmt = $oConexion->prepare("update alumno set contrasena = ? where correo = ?");
            $stmt->bind_param("ss", $iContrasena, $iCorreo);

            //set parametros y luego ejecutarlo
            $iContrasena = $pPassword;
            $iCorreo = $pCorreo;

            if($stmt->execute()){
                $retorno = true;
            }
        }
    } catch (\Throwable $th) {
        //Bitacora
        echo $th;
    } finally {
        Desconecta($oConexion);
    }

    return $retorno;
}