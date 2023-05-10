<?php
include 'partials/header.php';
include './connections.php';

use Automattic\WooCommerce\HttpClient\HttpClientException;
?>
<div class="w-full px-4 mx-auto max-w-8xl">


  <?php
  try {
    // Array of response results.
    $results = $woocommerce->get('orders', array('per_page' => 20));
    // Example: ['customers' => [[ 'id' => 8, 'created_at' => '2015-05-06T17:43:51Z', 'email' => ...
    //echo '<pre><code>' . print_r($results, true) . '</code><pre>'; // JSON output.

    $orders = json_decode(json_encode($results), true);


    ob_start();
    include './templates/orders_table.php';
    $allorders = ob_get_clean();
    echo $allorders;
  } catch (HttpClientException $e) {
    echo '<pre><code>' . print_r($e->getMessage(), true) . '</code><pre>'; // Error message.
    echo '<pre><code>' . print_r($e->getRequest(), true) . '</code><pre>'; // Last request data.
    echo '<pre><code>' . print_r($e->getResponse(), true) . '</code><pre>'; // Last response data.
  }



  include 'partials/footer.php';
  ?>
</div>