<?php
declare(strict_types=1);

$candy = [
    'Toffee' => ['price' => 3.00, 'stock' => 12],
    'Mints' => ['price' => 2.00, 'stock' => 26],
    'Fudge' => ['price' => 4.00, 'stock' => 8],
    'Caramel Swirls' => ['price' => 5.50, 'stock' => 6],
    'Berry Drops' => ['price' => 3.50, 'stock' => 18],
    'Choco Truffles' => ['price' => 7.00, 'stock' => 9],
];

$tax = 20;

function get_reorder_message(int $stock): string
{
    return ($stock < 10) ? 'Yes' : 'No';
}

function get_total_value(float $price, int $quantity): float
{
    return $price * $quantity;
}

function get_tax_due(float $price, int $quantity, int $tax_rate = 0): float
{
    return ($price * $quantity) * ($tax_rate / 100);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Control - Santa's Candy Shop</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php include 'includes/header.php'; ?>

    <main class="container main-content">
        <section class="ui-card span-full stock-section">
            <div class="card-header">
                <div>
                    <span class="pill stock-pill">Module 3 &bull; PHP Functions</span>
                    <h1>Santa's Candy Shop — Stock Control</h1>
                </div>
                <span class="chip">Tax Rate: <?= $tax ?>% &bull; PHP (₱)</span>
            </div>
            <p class="card-desc">
                Inventory monitoring table powered by strict typing, a multidimensional product array, and custom stock
                calculation functions.
            </p>

            <div class="table-wrap">
                <table class="stock-table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Stock</th>
                            <th>Re-order</th>
                            <th>Total Value</th>
                            <th>Tax Due</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($candy as $product_name => $data): ?>
                            <?php
                            $stock = (int) $data['stock'];
                            $price = (float) $data['price'];
                            $reorder = get_reorder_message($stock);
                            $total_value = get_total_value($price, $stock);
                            $tax_due = get_tax_due($price, $stock, $tax);
                            ?>
                            <tr>
                                <td class="product-cell"><?= htmlspecialchars($product_name) ?></td>
                                <td><?= $stock ?></td>
                                <td>
                                    <span class="status-pill <?= $reorder === 'Yes' ? 'status-yes' : 'status-no' ?>">
                                        <?= $reorder ?>
                                    </span>
                                </td>
                                <td>₱<?= number_format($total_value, 2) ?></td>
                                <td>₱<?= number_format($tax_due, 2) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="stock-footer-actions">
                <a href="index.php" class="btn btn-ghost stock-back-btn">&larr; Back to Overview</a>
            </div>
        </section>
    </main>

    <?php require 'includes/footer.php'; ?>
</body>

</html>