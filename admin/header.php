<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<header><h1>Admin Panel - Dynasty’s Grace</h1></header>

<nav class="navbar">
    <div class="nav-container">
        <a href="index.php" class="logo">Dashboard</a>
        <ul class="nav-links">
            <?php if (in_array($_SESSION['admin']['role'], ['admin', 'rajesh'])): ?>
                <li><a href="add_product.php">Add Product</a></li>
            <?php endif; ?>
            <?php if (in_array($_SESSION['admin']['role'], ['admin', 'kapil'])): ?>
                <li><a href="manage_stock.php">Manage Stock</a></li>
            <?php endif; ?>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
</nav>

<div class="container">
