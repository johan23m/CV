<?php

class SocialMedia extends Conectar {
    
    public function get_socialMedia() {
        // Código para obtener datos de redes sociales
    }

    public function insert_socialMedia($socmed_icono, $socmed_url) {
        // Código para insertar datos de redes sociales
    }

    public function update_socialMedia($socmed_id, $socmed_icono, $socmed_url) {
        // Código para actualizar datos de redes sociales
    }

    public function delete_socialMedia($socmed_id) {
        // Código para eliminar datos de redes sociales
    }

}
?>

<?php

class SocialMedia extends Conectar {

    public function getSocialMedia() {
        $social = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM social_media WHERE est = 1";
        $sql = $social->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

}

?>

public function get_socialMedia_con_parametro($socmed_id) {
    $social = parent::conexion();
    parent::set_names();
    $sql = "SELECT * FROM social_media WHERE socmed_id=?";
    $sql = $social->prepare($sql);
    $sql->bindValue(1, $socmed_id);
    $sql->execute();
    return $resultado = $sql->fetchAll();
}

public function delete_socialMedia($socmed_id) {
    $social = parent::conexion();
    parent::set_names();
    $sql = "UPDATE social_media SET est = 0 WHERE socmed_id=?";
    $sql = $social->prepare($sql);
    $sql->bindValue(1, $socmed_id);
    $sql->execute();
    return $sql->rowCount(); // Devuelve el número de filas afectadas, no un conjunto de resultados
}

public function insert_socialMedia($socmed_icono, $socmed_url) {
    $social = parent::conexion();
    parent::set_names();
    $sql = "INSERT INTO social_media (socmed_icono, socmed_url, est) VALUES (?, ?, 1)";
    $sql = $social->prepare($sql);
    $sql->bindValue(1, $socmed_icono);
    $sql->bindValue(2, $socmed_url);
    $sql->execute();
    return $sql->rowCount(); // Devuelve el número de filas afectadas, no un conjunto de resultados
}

public function update_socialMedia($socmed_id, $socmed_icono, $socmed_url) {
    $social = parent::conexion();
    parent::set_names();
    $sql = "UPDATE social_media
            SET
            socmed_icono = ?,
            socmed_url = ?
            WHERE
            socmed_id = ?";
    $sql = $social->prepare($sql);
    $sql->bindValue(1, $socmed_icono);
    $sql->bindValue(2, $socmed_url);
    $sql->bindValue(3, $socmed_id);
    $sql->execute();
    return $sql->rowCount(); // Devuelve el número de filas afectadas, no un conjunto de resultados
}
