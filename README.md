# 🛍️ Dynasty’s Grace - Sample E-commerce Application

This is a simple, role-based eCommerce platform built in **PHP**, **MySQL (MySQLi)**, and **HTML/CSS**. It showcases a product listing, category filtering, out-of-stock notifications, and an admin panel with user role restrictions.

---

## 🚀 Features

- Customer-facing product list with category tags
- Notify form for out-of-stock items
- Admin panel with 3 roles:
  - **Admin**: Full access (products + stock)
  - **Rajesh**: Can add/manage products
  - **Kapil**: Can update stock only
- Role-based access control
- Image upload and file handling
- Clean code, simple structure

---

## 🛠️ Tech Stack

- **PHP (MySQLi)** – Server-side scripting
- **MySQL** – Database
- **HTML5 + CSS3** – UI design
- **No frameworks used** – 100% raw code

## 🧪 Dummy Credentials

All users use password: **123456**

| Username | Role            |
|----------|-----------------|
| admin    | Admin           |
| rajesh   | Manage Products |
| kapil    | Manage Stocks   |

---

## 🧰 How to Run

1. Import `setup.sql` into MySQL (`ecommerce` DB)
2. Place project in your PHP server (e.g., `htdocs/`)
3. Open in browser:
   - Customer side: `http://localhost/ecommerce-app/index.php`
   - Admin side: `http://localhost/ecommerce-app/admin/login.php`

**Note:** No XAMPP required if using native Apache+MySQL stack or Docker.

---

## 📦 Libraries Used

- None! This is built from scratch using native PHP & MySQLi.

---

## 🧠 Self Evaluation

- I’m comfortable with both frontend and backend, but stronger in backend logic.
- No UI libraries used; layout kept simple and functional.
- Passwords hashed using `password_hash()`.
- Role-based routing and file security is handled via `$_SESSION`.

---

## 🧠 AI/Assistance Used

- ChatGPT was used to brainstorm structure and improve logic separation.
- Code is handwritten but assisted via ChatGPT suggestions and optimization tips.

---

## 📡 Deployment

> Optional: Include Docker steps or live URL if deployed

---

## 🧾 License

This is a sample app for internship & educational purposes only."# ecommerce" 
