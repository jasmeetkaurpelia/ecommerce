<?php include "config/db.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Dynasty’s Grace</title>
</head>
<body>
<div class="page-wrapper">
<header><?php include "include/navbar.php"; ?></header>

<div class="container">
    <h2>Our Products</h2>

    <!-- Category Filter -->
    <form method="GET" style="margin-bottom: 20px;">
        <label for="category">Filter by Category:</label>
        <select name="category" onchange="this.form.submit()">
            <option value="">-- All Categories --</option>
            <?php
            $categories = $conn->query("SELECT * FROM categories");
            $selected = isset($_GET['category']) ? $_GET['category'] : '';

            while ($cat = $categories->fetch_assoc()) {
                $isSelected = ($selected == $cat['id']) ? "selected" : "";
                echo "<option value='{$cat['id']}' $isSelected>{$cat['name']}</option>";
            }
            ?>
        </select>
    </form>

    <?php
    $query = "SELECT p.*, c.name AS category FROM products p JOIN categories c ON p.category_id = c.id";

    if (!empty($selected)) {
        $query .= " WHERE p.category_id = " . intval($selected);
    }

    $res = $conn->query($query);

    if ($res->num_rows === 0) {
        echo "<p>No products found for this category.</p>";
    }

    while ($row = $res->fetch_assoc()):
    ?>
    <div class="product">
        <img src="uploads/<?= $row['image'] ?>" alt="<?= $row['name'] ?>">
        <div>
            <h3><?= $row['name'] ?> (<?= $row['category'] ?>)</h3>
            <p><?= $row['description'] ?></p>
            <p><strong>Stock:</strong> <?= $row['stock'] ?></p>

            <?php if ($row['stock'] <= 0): ?>
                <form action="notify.php" method="post">
                    <input type="hidden" name="product_id" value="<?= $row['id'] ?>">
                    Email: <input type="email" name="email" required>
                    Phone: <input type="text" name="phone">
                    <button type="submit">Notify Me</button>
                </form>
            <?php endif; ?>
        </div>
    </div>
    <?php endwhile; ?>
</div>

<footer>&copy; 2025 Dynasty’s Grace</footer>

</div> 
</body>
</html>
