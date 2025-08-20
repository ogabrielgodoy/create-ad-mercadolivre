<?php

//https://developers.mercadolivre.com.br/pt_br/validacoes
//https://developers.mercadolivre.com.br/pt_br/categorizacao-de-produtos

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/config.php';

$url = "https://api.mercadolibre.com/categories/";
$category_id = "MLB85870";
$attributes = '/attributes';
$query = $url . $category_id . $attributes;

$access_token = $_ENV['ACCESS_TOKEN'];

$ch = curl_init();
curl_setopt_array(
    $ch,
    array(
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_URL => $query,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => [
            "Authorization: Bearer $access_token",
            "Content-Type: application/json"
        ],
    )
);

$response = json_decode(curl_exec($ch), true);

if (curl_error($ch)) {
    throw new Exception('Erro cURL: ' . curl_error($ch));
}

curl_close($ch);


echo "[app] campos obrigatorios para a categoria: \n";

foreach ($response as $attr) {

    if (!empty($attr['tags']['required'])) {

        echo $attr['id'];
        echo "\n";
        // echo $attr['name'];
        // echo $attr['tags']['required'];
    }
}
