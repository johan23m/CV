<?php
class Usuario extends Conectar {
    public function login() {
        $conectar = parent::Conexion();
        parent::set_names();

        if (isset($_POST["enviar"])) {
            $correo = $_POST["correo"];
            $password = $_POST["passwd"];

            if (empty($correo) || empty($password)) {
                header("Location:" . Conectar::ruta() . "index.php?m=2");
                exit();
            } else {
                $sql = "SELECT * FROM usuarios WHERE correo=? AND password=? AND estado=1";
                $stmt = $conectar->prepare($sql);
                $stmt->bindValue(1, $correo);
                $stmt->bindValue(2, $password);
                $stmt->execute();
                $resultado = $stmt->fetch();

                if (is_array($resultado) && count($resultado) > 0) {
                    session_start();
                    $_SESSION["usu_id"] = $resultado["usu_id"];
                    $_SESSION["nombre"] = $resultado["nombre"];
                    $_SESSION["ape_paterno"] = $resultado["ape_paterno"];
                    $_SESSION["correo"] = $resultado["correo"];
                    header("Location:" . Conectar::ruta() . "views/inicio.php");
                    exit();
                } else {
                    header("Location:" . Conectar::ruta() . "index.php?m=3");
                    exit();
                }
            }
        }
    }
}
?>


<?php

class Usuario {
    protected $dbh;

    public function __construct() {
        require_once("../config/conexion.php");
        $this->dbh = new Conectar();
    }

    public function login($correo, $passwd) {
        $sql = "SELECT * FROM usuarios WHERE correo = :correo AND passwd = :passwd";
        $stmt = $this->dbh->conexion()->prepare($sql);
        $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
        $stmt->bindParam(':passwd', $passwd, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result ? true : false;
    }
}

