<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
include "../config/db.php";
$role = $_SESSION['admin']['role'];
$username = $_SESSION['admin']['username'];

$totalProducts = $conn->query("SELECT COUNT(*) as total FROM products")->fetch_assoc()['total'];
$lowStock = $conn->query("SELECT COUNT(*) as low FROM products WHERE stock < 5")->fetch_assoc()['low'];
$totalCategories = $conn->query("SELECT COUNT(*) as total FROM categories")->fetch_assoc()['total'];
$totalNotifications = $conn->query("SELECT COUNT(*) as total FROM notifications")->fetch_assoc()['total'];
?>

<?php include "header.php"; ?>

<h2>👋 Welcome back, <?= ucfirst($username) ?>!</h2>
<p>Your role: <strong><?= ucfirst($role) ?></strong></p>

<div style="display: flex; gap: 20px; flex-wrap: wrap; margin-top: 20px;">
    <div style="flex: 1; min-width: 200px; background: #fff; padding: 15px; border: 1px solid #ddd;">
        <h3>📦 Products</h3>
        <p>Total: <?= $totalProducts ?></p>
        <p>Low Stock (&lt;5): <?= $lowStock ?></p>
    </div>
    <div style="flex: 1; min-width: 200px; background: #fff; padding: 15px; border: 1px solid #ddd;">
        <h3>🗂️ Categories</h3>
        <p>Total Categories: <?= $totalCategories ?></p>
    </div>
    <div style="flex: 1; min-width: 200px; background: #fff; padding: 15px; border: 1px solid #ddd;">
        <h3>📬 Notifications</h3>
        <p>Requests: <?= $totalNotifications ?></p>
    </div>
</div>

<h3 style="margin-top:30px;">🚀 Quick Actions</h3>
<div style="display: flex; gap: 15px;">
    <?php if (in_array($role, ['admin', 'rajesh'])): ?>
        <a href="add_product.php" class="dashboard-btn">➕ Add Product</a>
    <?php endif; ?>
    <?php if (in_array($role, ['admin', 'kapil'])): ?>
        <a href="manage_stock.php" class="dashboard-btn">🛠️ Manage Stock</a>
    <?php endif; ?>
</div>

<style>
    .dashboard-btn {
        display: inline-block;
        padding: 10px 20px;
        background: #007bff;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        margin-top: 10px;
    }
    .dashboard-btn:hover {
        background: #0056b3;
    }
</style>

</body>
</html>

