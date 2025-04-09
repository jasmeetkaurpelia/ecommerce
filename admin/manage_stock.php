<?php
session_start();
include "../config/db.php";
if (!isset($_SESSION['admin']) || !in_array($_SESSION['admin']['role'], ['admin', 'kapil'])) {
    die("Access denied.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['product_id'];
    $qty = intval($_POST['quantity']);
    $type = $_POST['type']; // add/remove
    $ref = $_POST['reference'];

    if ($type === 'add') {
        $conn->query("UPDATE products SET stock = stock + $qty WHERE id = $product_id");
    } elseif ($type === 'remove') {
        $conn->query("UPDATE products SET stock = stock - $qty WHERE id = $product_id AND stock >= $qty");
    }

    $msg = "Stock updated!";
}
?>

<?php include "header.php"; ?>
<h2>Manage Stock</h2>
<?php if (isset($msg)) echo "<p style='color:green;'>$msg</p>"; ?>

<form method="post">
    Product:
    <select name="product_id">
        <?php
        $products = $conn->query("SELECT id, name FROM products");
        while ($prod = $products->fetch_assoc()) {
            echo "<option value='{$prod['id']}'>{$prod['name']}</option>";
        }
        ?>
    </select><br>
    Quantity: <input type="number" name="quantity" min="1" required><br>
    Type:
    <select name="type">
        <option value="add">Add Stock</option>
        <option value="remove">Remove Stock</option>
    </select><br>
    Reference #: <input type="text" name="reference"><br>
    <button type="submit">Update Stock</button>
</form>
