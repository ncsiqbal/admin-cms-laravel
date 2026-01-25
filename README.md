# 🚀 CMS Admin Dashboard (Laravel)

CMS Admin Dashboard adalah aplikasi **Content Management System (CMS)** berbasis **Laravel** dengan tampilan modern, responsif, dan mendukung **Dark Mode**. Project ini dirancang untuk kebutuhan admin panel seperti dashboard, manajemen konten, dan pengelolaan data secara terstruktur.

---

## ✨ Fitur Utama

* 🔐 Authentication (Login / Logout)
* 📊 Dashboard Admin modern
* 🌙 Dark Mode (tersimpan di localStorage)
* 📚 Manajemen Guides
* 🧭 Sidebar navigasi aktif otomatis
* 🎨 UI berbasis Tailwind CSS
* ⚡ Animasi halus menggunakan AOS
* 📱 Responsive (Desktop & Mobile friendly)

---

## 🛠️ Tech Stack

* **Backend**: Laravel 10+
* **Frontend**: Blade Template
* **Styling**: Tailwind CSS
* **Interactivity**: Alpine.js
* **Animation**: AOS (Animate On Scroll)
* **Build Tool**: Vite

---

## 📂 Struktur Folder Penting

```
resources/
├── views/
│   ├── layouts/
│   │   └── admin.blade.php
│   ├── dashboard.blade.php
│   └── admin/
│       └── guides/
```

---

## ⚙️ Instalasi

1. Clone repository

```bash
git clone https://github.com/username/cms-admin.git
```

2. Masuk ke folder project

```bash
cd cms-admin
```

3. Install dependency

```bash
composer install
npm install
```

4. Copy file environment

```bash
cp .env.example .env
```

5. Generate application key

```bash
php artisan key:generate
```

6. Jalankan migrasi database

```bash
php artisan migrate
```

7. Jalankan server

```bash
php artisan serve
npm run dev
```

---

## 🔑 Login Admin

Pastikan sudah memiliki user di database.

```bash
php artisan tinker
```

```php
User::create([
  'name' => 'Admin',
  'email' => 'admin@example.com',
  'password' => bcrypt('password')
]);
```

Login melalui:

```
http://localhost:8000/login
```

---

## 🎨 Dark Mode

* Toggle tersedia di Top Bar
* Status Dark Mode tersimpan otomatis menggunakan **localStorage**

---

## 📸 Preview UI

* Dashboard dengan cards statistik
* Sidebar admin modern
* Animasi transisi lembut

---

## 📌 Rencana Pengembangan

* 📈 Chart statistik (Chart.js)
* 🧑‍💼 Manajemen User
* 🔔 Notifikasi Admin
* 📱 Sidebar mobile (hamburger menu)
* 🧾 Log aktivitas admin

---

## 🤝 Kontribusi

Pull request sangat dipersilakan.
Untuk perubahan besar, silakan buka issue terlebih dahulu.

---

## 📄 Lisensi

Project ini bersifat **open-source** dan bebas digunakan untuk kebutuhan pembelajaran maupun pengembangan internal.

---

🔥 Dibangun dengan Laravel & Tailwind — siap untuk production!
