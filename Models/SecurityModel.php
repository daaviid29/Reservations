<?php

    require_once 'dataModel.php';
// CAPA DE SEGURIDAD

// Esta clase puede mejorarse indefinidamente para construir
// aplicaciones más seguras. El resto de la aplicación no sufrirá ningún cambio.

// En esta implementación, usaremos variables de sesión para la autenticación de usuarios
// y limpieza de variables sencilla basada en una lista de palabras y caracteres prohibidos. 

class SecurityModel{

    // Abre una sesión y guarda el id del usuario
    public static function iniciarSesion($id) {
        $_SESSION["idUsuario"] = $id;
    }

    public function setRol($rol){
        $_SESSION["rolUsuario"] = $rol;
    }

    public static function getRol(){
        return $_SESSION["rolUsuario"];
    }

    public function setImage($image){
        $_SESSION["userImage"] = $image;
    }

    public function getImage(){
        return $_SESSION["userImage"];
    }

    public function setRealname($realname){
        $_SESSION["realname"] = $realname;
    }

    public function getRealname(){
        return $_SESSION["realname"];
    }

    public function setLastname($lastname){
        $_SESSION["lastname"] = $lastname;
    }

    public function getLastname(){
        return $_SESSION["lastname"];
    }

    // Cierra una sesión y elimina el id del usuario
    public static function cerrarSesion() {
        session_destroy();
        header("Location: index.php");
    }

    // Devuelve el id del usuario que inició la sesión
    public static function getIdUsuario() {
        if (isset($_SESSION["idUsuario"])) {
            return $_SESSION["idUsuario"];
        } else {
            return false;
        }
    }

    // Devuelve true si hay una sesión iniciada y false en caso contrario
    public static function haySesion() {
        if (isset($_SESSION["idUsuario"])) {
            return true;
        }
        else {
            return false;
        }
    }

    // Limpia un texto de caracteres o palabras sospechosas. Devuelve el texto limpio.
    public static function limpiar($text) {
        // Lista de palabras y caracteres prohibidos
        $blackList = ["<", ">", "insert", "update", "delete", "select", "*", "from"];
        foreach ($blackList as $blackWord) {
            $text = str_replace($blackWord, "", $text);
        }
        return $text;
    }
}
?>