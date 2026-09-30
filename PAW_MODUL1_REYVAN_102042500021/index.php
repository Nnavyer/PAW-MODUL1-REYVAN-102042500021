<?php
$products = [
    [
        "name" => "Keyboard Mechanical RGB",
        "category" => "Aksesoris",
        "price" => 450000,
        "stock" => 15
    ],
    [
        "name" => "Mouse Wireless Silent",
        "category" => "Aksesoris",
        "price" => 180000,
        "stock" => 8
    ],
    [
        "name" => "Monitor 24 Inch Full HD",
        "category" => "Monitor",
        "price" => 1800000,
        "stock" => 4
    ],
    [
        "name" => "Laptop Productivity i5",
        "category" => "Laptop",
        "price" => 8500000,
        "stock" => 3
    ],
    [
        "name" => "Headset Gaming 7.1",
        "category" => "Audio",
        "price" => 650000,
        "stock" => 0 // Stok habis
    ],
    [
        "name" => "Webcam Full HD 1080p",
        "category" => "Kamera",
        "price" => 1200000,
        "stock" => 0 // Stok habis
    ]
];

$total_products = count($products);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cia Store - Premium Tech Essentials</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header class="navbar">
        <div class="brand">
            <span class="brand-name">Cia Store</span>
        </div>
        <nav class="nav-menu">
            <a href="#home">Beranda</a>
            <a href="#katalog">Katalog</a>
        </nav>
    </header>

    <section class="hero-banner" id="home">
        <div class="hero-wrapper">
            <span class="hero-tag">Koleksi Pilihan</span>
            <h1>Perangkat Teknologi</h1>
            <a href="#katalog" class="cta-button">Jelajahi Produk</a>
        </div>
    </section>

    <main class="main-container" id="katalog">
        <div class="section-bar">
            <div class="section-title">
                <h2>Daftar Produk</h2>
            </div>
            <!-- Informasi Total Produk -->
            <div class="counter-box">
                <span>Tersimpan: </span>
                <strong><?php echo $total_products; ?> Produk</strong>
            </div>
        </div>

        <div class="catalog-grid">
            <?php foreach ($products as $item): ?>
                <?php 
                    // Logika Diskon 10% (Challenge)
                    $has_discount = $item['price'] >= 1000000;
                    $final_price = $item['price'];
                    
                    if ($has_discount) {
                        $discount_amount = $item['price'] * 0.10;
                        $final_price = $item['price'] - $discount_amount;
                    }
                ?>
                <article class="item-card">
                    <div class="item-header">
                        <span class="cat-pill"><?php echo $item['category']; ?></span>
                        
                        <?php if ($has_discount): ?>
                            <span class="promo-badge">PROMO 10%</span>
                        <?php endif; ?>
                    </div>

                    <div class="item-body">
                        <h3 class="item-title"><?php echo $item['name']; ?></h3>

                        <div class="price-box">
                            <?php if ($has_discount): ?>
                                <span class="price-striked">Rp<?php echo number_format($item['price'], 0, ',', '.'); ?></span>
                                <span class="price-main price-discounted">Rp<?php echo number_format($final_price, 0, ',', '.'); ?></span>
                            <?php else: ?>
                                <span class="price-main">Rp<?php echo number_format($item['price'], 0, ',', '.'); ?></span>
                            <?php endif; ?>
                        </div>

                        <div class="stock-status">
                            <span class="stock-qty">Sisa: <strong><?php echo $item['stock']; ?></strong></span>
                            <?php if ($item['stock'] > 0): ?>
                                <span class="label-status avail">Tersedia</span>
                            <?php else: ?>
                                <span class="label-status empty">Stok Habis</span>
                            <?php endif; ?>
                        </div>

                        <div class="action-wrapper">
                            <?php if ($item['stock'] > 0): ?>
                                <button class="btn-checkout">Beli Sekarang</button>
                            <?php else: ?>
                                <button class="btn-checkout btn-disabled" disabled>Tidak Tersedia</button>
                            <?php endif; ?>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </main>

    <footer class="footer">
        <p>&copy; Praktikum PAW</p>
    </footer>

</body>
</html>