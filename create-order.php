<?php

// Configura le credenziali API di PayPal
$client_id = 'CLIENT_ID';
$client_secret = 'CLIENT_SECRET';

// Recupera il prezzo dall'input POST
$price = $_POST['price'];

// Crea la richiesta di autorizzazione per PayPal
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.paypal.com/v2/checkout/orders');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"intent": "CAPTURE", "purchase_units": [{"amount": {"currency_code": "EUR", "value": "'.$price.'"}}]}');
curl_setopt($ch, CURLOPT_USERPWD, $client_id.':'.$client_secret);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
$result = curl_exec($ch);
curl_close($ch);

// Restituisci la risposta come JSON
header('Content-Type: application/json');
echo $result;
