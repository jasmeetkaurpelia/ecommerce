# 🧾 Application Requirements – Dynasty’s Grace

## 🎯 Objective

Build a role-based eCommerce application to:

- Display products by category
- Handle stock notifications for out-of-stock items
- Manage products & inventory via admin panel
- Restrict access to stock/product pages based on user role

## 🧱 Functional Requirements

### Customer View

- See product listings (with image, description, category, stock)
- Filter by category (optional)
- Out-of-stock products should show a “Notify me” form

### Admin Panel

- **Admin**: Can add products, upload images, manage stock
- **Rajesh**: Can only manage product details/images
- **Kapil**: Can only manage stock (add/remove), with reference number

## 🔐 Access Control

| Action            | Admin | Rajesh | Kapil |
|-------------------|-------|--------|-------|
| Add Product       | ✅     | ✅      | ❌     |
| Upload Image      | ✅     | ✅      | ❌     |
| Manage Stock      | ✅     | ❌      | ✅     |
| Add/Remove Stock  | ✅     | ❌      | ✅     |

## 🔌 Tech Requirements

- PHP 7+
- MySQL 5.7+
- No frameworks or CMS
- Use MySQLi, not PDO
- Passwords must be hashed
- Use sessions for login control

## 🗃️ Database Entities

- `users (id, username, password, role)`
- `categories (id, name)`
- `products (id, name, description, category_id, image, stock)`
- `notifications (id, product_id, email, phone)`

## 📁 Folder Naming Convention

- Use lowercase with underscores
- Use `uploads/` for product images
- Keep `config/` and `assets/` separate

## 🧪 Test Credentials

- Username: admin / rajesh / kapil
- Password: 123456

## 🚫 Excluded

- No cart or checkout system
- No order history or invoices
- No customer registration or login
