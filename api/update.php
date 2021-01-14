<?php

require('../config.php');

$method = strtolower($_SERVER['REQUEST_METHOD']);

if ($method === 'put') {

    parse_str(file_get_contents('php://input'), $input);

    $id = $input['id'] ?? null;
    $tittle = $input['tittle'] ?? null;
    $body = $input['body'] ?? null;

    $id = filter_var($id);
    $tittle = filter_var($tittle);
    $body = filter_var($body);

    if ($id && $tittle && $body) {

        $sql = $pdo->prepare("SELECT * FROM notes WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        

        if ($sql->rowCount() > 0) {
            
            $sql = $pdo->prepare("UPDATE notes SET tittle = :tittle, body = :body WHERE id = :id");
            $sql->bindValue(':id', $id);
            $sql->bindValue(':tittle', $tittle);
            $sql->bindValue(':body', $body);
            $sql->execute();

            $array['result'] = [
                'id' => $id,
                'tittle' => $tittle,
                'body' => $body,
            ];

        }
        else {
            $array['error'] = "Id inválido";
        }

    } else {
        $array['error'] = "Dados não enviados";
    }

} else {
    $array['error'] = 'Método invalido (apenas PUT)';
}

require('../return.php');