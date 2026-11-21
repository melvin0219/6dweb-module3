<?php
$store_name = "Santa's Candy Shop";
$nav_links = [
    'Overview' => 'index.php#overview',
    'Best Sellers' => 'index.php#bestsellers',
    'Nutrition' => 'index.php#nutrition',
    'Shopping Cart' => 'index.php#cart',
    'Stock Control' => 'stock-control.php'
];
?>
<header class="site-header">
    <div class="container header-inner">
        <div class="brand">
            <span class="brand-badge">Melvin's VC</span>
            <a href="index.php" class="brand-title"><?= $store_name ?></a>
        </div>
        <nav class="site-nav">
            <?php foreach ($nav_links as $label => $url): ?>
                <a href="<?= $url ?>" class="nav-link"><?= $label ?></a>
            <?php endforeach; ?>
        </nav>
    </div>
</header>