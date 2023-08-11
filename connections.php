<?php

declare(strict_types=1);
require __DIR__ . '/vendor/autoload.php';

use Automattic\WooCommerce\HttpClient\HttpClientException;
use Automattic\WooCommerce\Client;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

function validateEnvironmentVariable($name)
{
  if (isset($_ENV[$name]) && !empty($_ENV[$name])) {
    return $_ENV[$name];
  } else {
    throw new \Exception("$name is not defined or empty, please confirm there is .env file with the variables requirred in the documentation defined properly.");
  }
}

try {
  $url = validateEnvironmentVariable('URL');
  $consumerKey = validateEnvironmentVariable('CONSUMER_KEY');
  $consumerSecret = validateEnvironmentVariable('CONSUMER_SECRET');

  $woocommerce = new Client(
    $url,
    $consumerKey,
    $consumerSecret,
    [
      'wp_api' => true,
      'version' => 'wc/v3',
      'verify_ssl' => false, // Allow self-signed certificates (remove for prod)
    ]
  );

  // Now you can use $woocommerce to make API requests

} catch (\Exception $e) {
  echo "Error: " . $e->getMessage();
  $error_message = json_decode($e->getMessage(), true);
 
  if (isset($error_message['code']) && $error_message['code'] === 'woocommerce_rest_cannot_view') {
      echo 'There is a permission issue, confirm that you have the correct permissions.';
  } else {
      echo "Error: " . $e->getMessage();
  }
}
