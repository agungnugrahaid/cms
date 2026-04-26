# 🌐 GMEDIA NOC CMS

## 📖 Overview

This project is a custom **Content Management System (CMS)** built using the Laravel framework, specifically designed for the **GMEDIA Network Operations Center (NOC)**. 

It serves as a hybrid dynamic application where the layout and structure are strictly maintained in code to preserve a premium, high-tech dark-mode aesthetic, while the core content, incident updates, and homepage highlights are driven entirely by a robust **Oracle Database**.

---

## ✨ Key Features Implemented

* **Oracle Database Integration:** Fully integrated with Oracle XE using the `yajra/laravel-oci8` driver.
* **Dynamic Content Management:** 
  * "Pages" table controls high-level titles and introductory content for the Home, About, and Contact pages.
  * "Articles" and "Categories" tables manage the core updates feed.
* **Dynamic Hero Carousel:** The homepage features a fully automated, cross-fading hero carousel that automatically pulls featured articles from the `home-carousel` database category.
* **Intelligent Routing:** Employs SEO-friendly slug-based routing (e.g., `/articles/global-expansion-q3`) instead of traditional numeric IDs.
* **Category Filtering:** The Updates page features a dynamic sidebar that automatically tallies article counts and filters content by category (News, Incident, Maintenance).
* **Responsive & Adaptive UI:** 
  * Built with Tailwind CSS, featuring a fully functional Dark/Light mode toggle that saves user preference.
  * A custom-built mobile responsive "hamburger" navigation menu.
  * Dynamic category-based UI coloring (e.g., Incident posts automatically receive red warning UI treatments).

---

## ⚙️ Tech Stack

* **Backend:** PHP / Laravel
* **Database:** Oracle XE
* **Database Driver:** `yajra/laravel-oci8`
* **Frontend:** Laravel Blade, Tailwind CSS, Vanilla JavaScript
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
*Note: Ensure your `.env` is configured for Oracle (DB_CONNECTION=oracle, DB_HOST=oracle, DB_PORT=1521).*

### 3. Run using Laravel Sail

```bash
./vendor/bin/sail up -d
```

### 4. Generate application key

```bash
./vendor/bin/sail artisan key:generate
```

### 5. Run Migrations & Seed Database

To build the Oracle tables and populate the default Pages, Categories, and initial Carousel Articles:

```bash
./vendor/bin/sail artisan migrate:fresh --seed
```
*(If you encounter a LogMiner drop error during migrate:fresh due to Oracle system tables, run `./vendor/bin/sail artisan db:seed` directly).*

---

## 🌐 Access Application

Open in your browser:

```
http://localhost
```

---

## 👨‍💻 Author

**Agung Nugraha**
GitHub: [https://github.com/agungnugrahaid](https://github.com/agungnugrahaid)

---

## 📄 License

This project is open-source and free to use for educational purposes.
