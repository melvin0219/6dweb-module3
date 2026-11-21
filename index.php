<?php
$best_sellers = [
    'Chocolate',
    'Mints',
    'Fudge',
    'Bubble gum',
    'Coffee',
    'Jelly beans'
];
$featured_count = 3;

$nutrition = [
    'fat' => 16,
    'sugar' => 51,
    'salt' => 6.3
];

if ($nutrition['sugar'] >= 40) {
    $sugar_status = 'High Sugar Treat';
    $sugar_badge = 'badge-warn';
} elseif ($nutrition['sugar'] >= 15) {
    $sugar_status = 'Moderate Sweetness';
    $sugar_badge = 'badge-info';
} else {
    $sugar_status = 'Low Sugar';
    $sugar_badge = 'badge-ok';
}

$items = 3;
$cost = 5;
$subtotal = $cost * $items;
$tax = ($subtotal / 100) * 20;
$total = $subtotal + $tax;

$order_tier = match (true) {
    $total >= 20 => 'Festive Bundle Unlocked (Free Gift Wrap)',
    $total >= 10 => 'Standard Candy Pack',
    default => 'Starter Treat Bag'
};
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Santa's Candy Shop - PHP Control Structures</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php include 'includes/header.php'; ?>

    <main class="container main-content">
        <section id="overview" class="hero-card">
            <div class="hero-text">
                <span class="pill">Progressive PHP Activity</span>
                <h1>Santa's Candy Shop</h1>
                <p>
                    Compiled from our Module 1 activities into one unified dynamic page using PHP control flow,
                    modular includes, and clean 2026s card-based layout design.
                </p>
                <div class="hero-actions">
                    <a href="#cart" class="btn btn-primary">View Shopping Cart (₱<?= number_format($total, 2) ?>)</a>
                    <a href="#bestsellers" class="btn btn-ghost">Explore Best Sellers</a>
                </div>
            </div>
            <div class="hero-stat-box">
                <span class="stat-label">Order Status</span>
                <strong class="stat-value"><?= $order_tier ?></strong>
                <span class="stat-sub"><?= $items ?> items &times; $<?= $cost ?> base price</span>
            </div>
        </section>

        <div class="bento-grid">
            <section id="bestsellers" class="ui-card">
                <div class="card-header">
                    <h2>Best Sellers</h2>
                    <span class="chip">Indexed Array &bull; For Loop</span>
                </div>
                <p class="card-desc">Top featured treats from our catalog:</p>
                <ul class="clean-list">
                    <?php for ($i = 0; $i < $featured_count; $i++): ?>
                        <li class="list-item">
                            <span class="item-rank">#<?= $i + 1 ?></span>
                            <span class="item-name"><?= $best_sellers[$i] ?></span>
                        </li>
                    <?php endfor; ?>
                </ul>
                <div class="tag-row">
                    <?php foreach ($best_sellers as $index => $candy): ?>
                        <?php if ($index >= $featured_count): ?>
                            <span class="mini-tag"><?= $candy ?></span>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </section>

            <section id="nutrition" class="ui-card">
                <div class="card-header">
                    <h2>Nutrition (per 100g)</h2>
                    <span class="chip <?= $sugar_badge ?>"><?= $sugar_status ?></span>
                </div>
                <p class="card-desc">Nutritional breakdown via associative array &amp; loop:</p>
                <div class="nutrition-list">
                    <?php foreach ($nutrition as $nutrient => $amount): ?>
                        <div class="nutrition-row">
                            <span class="nutrient-label"><?= ucfirst($nutrient) ?></span>
                            <span class="nutrient-value"><?= $amount ?>%</span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>

            <section id="cart" class="ui-card span-full">
                <div class="card-header">
                    <h2>Shopping Cart Summary</h2>
                    <span class="chip">Arithmetic &amp; Match</span>
                </div>
                <div class="summary-grid">
                    <div class="summary-box">
                        <span>Items</span>
                        <strong><?= $items ?></strong>
                    </div>
                    <div class="summary-box">
                        <span>Cost per pack</span>
                        <strong>₱<?= number_format((float) $cost, 2) ?></strong>
                    </div>
                    <div class="summary-box">
                        <span>Subtotal</span>
                        <strong>₱<?= number_format((float) $subtotal, 2) ?></strong>
                    </div>
                    <div class="summary-box">
                        <span>Tax (20%)</span>
                        <strong>₱<?= number_format((float) $tax, 2) ?></strong>
                    </div>
                    <div class="summary-box highlight-box">
                        <span>Total</span>
                        <strong>₱<?= number_format((float) $total, 2) ?></strong>
                    </div>
                </div>
                <p class="promo-banner"><?= $order_tier ?></p>
            </section>
        </div>
    </main>

    <?php require 'includes/footer.php'; ?>
</body>

</html>