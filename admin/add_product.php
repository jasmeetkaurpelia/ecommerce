<?php
session_start();
include "../config/db.php";
if (!isset($_SESSION['admin']) || !in_array($_SESSION['admin']['role'], ['admin', 'rajesh'])) {
    die("Access denied.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $desc = $_POST['description'];
    $cat = $_POST['category'];
    $imageName = basename($_FILES['image']['name']);
    $uploadPath = "../uploads/" . $imageName;

    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath)) {
        $stmt = $conn->prepare("INSERT INTO products (name, description, category_id, image, stock) VALUES (?, ?, ?, ?, 0)");
        $stmt->bind_param("ssis", $name, $desc, $cat, $imageName);
        $stmt->execute();
        $msg = "Product added successfully!";
    } else {
        $msg = "Image upload failed!";
    }
}
?>

<?php include "header.php"; ?>
<h2>Add Product</h2>
<?php if (isset($msg)) echo "<p style='color:green;'>$msg</p>"; ?>

<form method="post" enctype="multipart/form-data">
    Name: <input type="text" name="name" required><br>
    Description: <input type="text" name="description" required><br>
    Category:
    <select name="category" required>
        <?php
        $cats = $conn->query("SELECT * FROM categories");
        while ($cat = $cats->fetch_assoc()) {
            echo "<option value='{$cat['id']}'>{$cat['name']}</option>";
        }
        ?>
    </select><br>
    Image: <input type="file" name="image" accept="image/*" required><br>
    <button type="submit">Add Product</button>
</form>
