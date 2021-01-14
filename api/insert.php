<?php

require('../config.php');

$method = strtolower($_SERVER['REQUEST_METHOD']);

if ( $method === 'post') {
    
    $tittle = filter_input(INPUT_POST, 'tittle');
    $body = filter_input(INPUT_POST, 'body');

    if ($tittle && $body) {

        $sql = $pdo->prepare("INSERT INTO notes (tittle, body) VALUES (:tittle, :body)");
        $sql->bindValue(':tittle', $tittle);
        $sql->bindValue(':body', $body);
        $sql->execute();

        $id = $pdo->lastInsertId();

        $array['result'] = [
            'id' => $id,
            'tittle' => $tittle,
            'body' => $body
        ];

    } else {
        $array['error'] = "Titulou ou condeudo da anotação não recebidos";
    }

} else {
    $array['error'] = "Método inválido (permitido apenas POST)";
}

require('../return.php');