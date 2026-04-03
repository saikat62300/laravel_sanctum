# 🛡️ Laravel Sanctum Task Manager API

A simple and secure RESTful API built with Laravel using **Sanctum authentication**.
This project demonstrates user authentication and a complete CRUD system for managing tasks.

---

## 🚀 Features

* User Registration
* User Login & Logout (Token-based via Sanctum)
* Secure API Authentication
* Task Management (CRUD)

  * Create Task
  * Read Tasks
  * Update Task
  * Delete Task
* Protected Routes
* Clean and scalable API structure

---

## 🛠️ Tech Stack

* Backend: Laravel
* Authentication: Laravel Sanctum
* Database: MySQL
* API Type: REST

---

## 📦 Installation

```bash
git clone https://github.com/your-username/laravel-sanctum-task-api.git

cd laravel-sanctum-task-api

composer install

cp .env.example .env

php artisan key:generate
```

---

## ⚙️ Environment Setup

Update your `.env` file with database credentials:

```env
DB_DATABASE=your_db_name
DB_USERNAME=your_db_user
DB_PASSWORD=your_db_password
```

---

## 🗄️ Database Migration

```bash
php artisan migrate
```

---

## 🔐 Sanctum Setup

```bash
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"

php artisan migrate
```

---

## ▶️ Run the Application

```bash
php artisan serve
```

API will be available at:

```
http://127.0.0.1:8000/api
```

---

## 🔑 Authentication Endpoints

### Register

```
POST /api/register
```

### Login

```
POST /api/login
```

### Logout (Protected)

```
POST /api/logout
```

---

## 📋 Task Endpoints (Protected)

| Method | Endpoint        | Description     |
| ------ | --------------- | --------------- |
| GET    | /api/tasks      | Get all tasks   |
| POST   | /api/tasks      | Create a task   |
| GET    | /api/tasks/{id} | Get single task |
| PUT    | /api/tasks/{id} | Update a task   |
| DELETE | /api/tasks/{id} | Delete a task   |

---

## 🔐 Authentication Flow

1. User registers or logs in
2. API returns a token
3. Send token in headers:

```
Authorization: Bearer {token}
```

---

## 📁 Project Structure (Simplified)

```
app/
 ├── Models/
 ├── Http/
 │   ├── Controllers/
 │   └── Middleware/
routes/
 └── api.php
```

---

## 🧪 Testing with Postman

* Register a user
* Login to get token
* Add token in Authorization header
* Access protected task routes

---

## 🌐 Future Improvements

* Pagination for tasks
* Task filtering & search
* Role-based access control
* API rate limiting

---

## 👨‍💻 Author

Developed as a portfolio project to demonstrate Laravel API development and authentication using Sanctum.

---

## ⭐ Why This Project?

This project showcases:

* Secure API development
* Authentication handling
* Clean backend architecture
* Real-world CRUD operations

---

## 📜 License

This project is open-source and available under the MIT License.
