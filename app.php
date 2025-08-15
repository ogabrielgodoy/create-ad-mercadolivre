<?php
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/config.php';

$url = "https://api.mercadolibre.com/items";
$access_token = $_ENV['ACCESS_TOKEN'];

$payload = json_encode(array(
    "title" => "Item de teste - Não Comprar",
    "category_id" => "MLB3530",
    "price" => 1000,
    "currency_id" => "BRL",
    "available_quantity" => 10,
    "buying_mode" => "buy_it_now",
    "condition" => "new",
    "listing_type_id" => "gold_special",
    "pictures" => array(
        array(
            "source" => "http://mla-s2-p.mlstatic.com/968521-MLA20805195516_072016-O.jpg"
        )
    ),
    "attributes" => array(
        array(
            "id" => "BRAND",
            "value_name" => "Genérica"
        ),
        array(
            "id" => "EAN",
            "value_name" => "7898095297749"
        ),
        array(
            "id" => "MODEL",
            "value_name" => "Genérica"
        )
    )
));


$ch = curl_init();

curl_setopt_array(
    $ch,
    array(
        CURLOPT_POST => true,
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => [
            "Authorization: Bearer $access_token",
            "Content-Type: application/json"
        ],
        CURLOPT_POSTFIELDS => $payload
    )
);

$response = json_decode(curl_exec($ch), true);

if (curl_error($ch)) {
    throw new Exception('Erro cURL: ' . curl_error($ch));
}

curl_close($ch);

echo "[app] Anúncio foi criado -> {$response['id']}";
