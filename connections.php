<?php

declare(strict_types=1);
require __DIR__ . '/vendor/autoload.php';
use Automattic\WooCommerce\HttpClient\HttpClientException;
use Automattic\WooCommerce\Client;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeload();

$woocommerce = new Client(
  $_ENV['URL'],
  $_SERVER['CONSUMER_KEY'],
  $_SERVER['CONSUMER_SECRET'],
  [
    'wp_api'     => true,
    'version' => 'wc/v3',
    'verify_ssl' => false, // Allow self-signed certificates (remove for prod)
  ]
);

?>