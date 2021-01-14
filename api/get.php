<?php

require('../config.php');

$method = strtolower($_SERVER['REQUEST_METHOD']);

if ( $method === 'get') {

    $id = filter_input(INPUT_GET, 'id');

    if ($id) {
        $sql = $pdo->prepare("SELECT * FROM notes WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $dados = $sql->fetch(PDO::FETCH_ASSOC);

            $array['result'] = $dados;
        }
        else {
            $array['error'] = 'Usuário não encontrado na base de dados';
        }
    }
    else {
        $array['error'] = 'Id não enviado';
    }

} else {
    $array['error'] = 'Método não permitido (apenas GET)';
}

require('../return.php');