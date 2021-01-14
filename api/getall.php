<?php

require('../config.php');

$method = strtolower($_SERVER['REQUEST_METHOD']);

if ( $method === 'get') {

    $sql = $pdo->query("SELECT * FROM notes");
    if($sql->rowCount() > 0) {
        $data = $sql->fetchAll(PDO::FETCH_ASSOC);

        $array['result'] = $data;
    }
}
else {
    $array['error'] = 'Método mão permitido (apenas GET)';
}

require('../return.php');