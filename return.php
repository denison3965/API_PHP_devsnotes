<?php

//Configuração básica da API REST 

//Configurando o minha API pelo cabeçalho para permitir que consiga receber requisições REST de todo lugar
header("Access-Control-Allow-Oringin: *");
//Permitindo os MÉTODOS que minha API ira aceitar
header("Acess-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
//Dizendo o tipo de resposta 
header("Content-Type: application/json");

echo json_encode($array);
die;