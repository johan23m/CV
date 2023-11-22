<?php

class Conectar
{
    private $host = 'localhost';
    private $dbname = 'social_media';
    private $user = '';
    private $password = '';
    private $charset = 'utf8';

    public function conexion()
    {
        try {
            $conexion = new PDO("mysql:host={$this->host};dbname={$this->dbname};charset={$this->charset}", $this->user, $this->password);
            return $conexion;
        } catch (PDOException $e) {
            die('Error de conexión: ' . $e->getMessage());
        }
    }

    public function set_names()
    {
        return $this->conexion()->query("SET NAMES '{$this->charset}'");
    }
}

class SocialMedia extends Conectar
{
    public function get_socialMedia()
    {
        $social = $this->conexion();
        $this->set_names();
        $sql = "SELECT * FROM social_media WHERE est = 1";
        $stmt = $social->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function insert_socialMedia($socmed_nombre, $socmed_icono, $socmed_url)
    {
        $social = $this->conexion();
        $this->set_names();
        $sql = "INSERT INTO social_media (socmed_nombre, socmed_icono, socmed_url, est) VALUES (?, ?, ?, 1)";
        $stmt = $social->prepare($sql);
        $stmt->bindValue(1, $socmed_nombre);
        $stmt->bindValue(2, $socmed_icono);
        $stmt->bindValue(3, $socmed_url);
        $stmt->execute();
    }
}

?>







<?php


$miSocialMedia = new SocialMedia();

// Insertar datos de redes sociales
$miSocialMedia->insert_socialMedia('Facebook', 'facebook_icon.png', 'http://facebook.com');
$miSocialMedia->insert_socialMedia('Instagram', 'instagram_icon.png', 'http://instagram.com');
$miSocialMedia->insert_socialMedia('Twitter', 'twitter_icon.png', 'http://twitter.com');
$miSocialMedia->insert_socialMedia('WhatsApp', 'whatsapp_icon.png', 'http://whatsapp.com');

// Obtener datos de social_media
$resultado = $miSocialMedia->get_socialMedia();

// Imprimir resultados
foreach ($resultado as $row) {
    echo "Nombre: " . $row['socmed_nombre'] . ", Icono: " . $row['socmed_icono'] . ", URL: " . $row['socmed_url'] . "<br>";
}

?>
