<?php

// Configura le credenziali API di PayPal
$client_id = 'CLIENT_ID';
$client_secret = 'CLIENT_SECRET';

// Recupera l'ID dell'ordine dall'input POST
$order_id = $_POST['order_id'];

// Ottieni i dettagli dell'ordine da PayPal
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.paypal.com/v2/checkout/orders/'.$order_id);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERPWD, $client_id.':'.$client_secret);
$result = curl_exec($ch);
curl_close($ch);

// Restituisci i dettagli dell'ordine come JSON
header('Content-Type: application/json');
echo $result;
