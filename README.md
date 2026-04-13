# 📘 CMS Learning Project (Laravel)

## 📖 Overview

This project is a **Content Management System (CMS)** built using the Laravel framework.
The main purpose of this repository is for **learning and experimenting with CMS development concepts**.

---

## 🎯 Objectives

* Learn Laravel fundamentals (routing, controllers, models)
* Understand CMS architecture
* Practice CRUD operations
* Explore authentication and user management
* Experiment with frontend tools (Vite, Node.js)

---

## ⚙️ Tech Stack

* **Backend:** PHP (Laravel)
* **Frontend:** Blade / Vite / Node.js
* **Database:** MySQL
* **Environment:** Docker (Laravel Sail)

---

## 🚀 Getting Started

### 1. Clone the repository

```bash
git clone https://github.com/agungnugrahaid/cms.git
cd cms
```

### 2. Setup environment

```bash
cp .env.example .env
```

### 3. Run using Laravel Sail

```bash
./vendor/bin/sail up -d
```

### 4. Generate application key

```bash
./vendor/bin/sail artisan key:generate
```

### 5. Run migrations

```bash
./vendor/bin/sail artisan migrate
```

---

## 🌐 Access Application

Open in browser:

```
http://localhost
```

or:

```
http://<your-server-ip>
```

---

## 🧪 Development Commands

```bash
# Access container
./vendor/bin/sail shell

# Run Laravel commands
./vendor/bin/sail artisan <command>

# Install frontend dependencies
./vendor/bin/sail npm install

# Run Vite dev server
./vendor/bin/sail npm run dev
```

---

## 📌 Notes

* This project is **for learning purposes only**
* Not intended for production use (yet)
* Will be improved over time

---

## 👨‍💻 Author

**Agung Nugraha**
GitHub: [https://github.com/agungnugrahaid](https://github.com/agungnugrahaid)

---

## 📄 License

This project is open-source and free to use for educational purposes.

---

# 👍 You can customize:

* Add features list (posts, categories, users, etc.)
* Add screenshots later
* Add architecture diagram (good for your NOC/DevOps profile)
