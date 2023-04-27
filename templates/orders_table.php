<h1 class="text-blue">Current Orders</h1>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="table-auto w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">Order ID</th>
                <th scope="col" class="px-6 py-3">Status</th>
                <th scope="col" class="px-6 py-3">Date Created</th>
                <th scope="col" class="px-6 py-3">Shipping</th>
                <th scope="col" class="px-6 py-3">Email</th>
                <th scope="col" class="px-6 py-3">Phone</th>
                <th scope="col" class="px-6 py-3">Track</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order) : ?>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4"><?php echo $order['id']; ?></td>
                    <td class="px-6 py-4"> <?php echo $order['status']; ?></td>
                    <td class="px-6 py-4"><?php echo $order['date_created']; ?></td>
                    <td class="px-6 py-4"><?php
                                            $billing = $order['billing'];
                                            echo $billing['address_1'];
                                            echo $billing['state'];
                                            $shipping = $order['shipping'];

                                            echo $shipping['address_1'];
                                            echo $shipping['state'];
                                            ?></td>
                    <td class="px-6 py-4">
                        <?php
                        $billing = $order['billing'];
                        foreach ($billing as $key => $value) {
                            echo "$key: $value\n";
                        }
                        $shipping = $order['shipping'];
                        foreach ($shipping as $key => $value) {
                            echo "$key: $value\n";
                        }
                        ?>
                    </td>
                    <td class="px-6 py-4"><?php
                                            $billing = $order['billing'];
                                            echo $billing['phone'];

                                            $shipping = $order['shipping'];
                                            echo $shipping['phone'];
                                            ?></td>
                    <td class="px-6 py-4">
                    <?php
                        $meta_data = $order['meta_data'][5];
                        foreach ($meta_data as $key => $value) {
                            echo "$key: $value\n";
                        }
                        
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>