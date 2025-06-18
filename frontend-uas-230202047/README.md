# 🚀 Laravel 10 Project Setup Guide

Panduan lengkap untuk membuat dan menjalankan project Laravel 10 dari awal.

---

## ✅ Prasyarat

Pastikan kamu sudah menginstal hal-hal berikut:

- PHP >= 8.1
- [Composer](https://getcomposer.org/)
- [MySQL](https://www.mysql.com/) / PostgreSQL / SQLite / DB lain
- [Git](https://git-scm.com/) (opsional)

---

## 🛠️ 1. Membuat Project Laravel 10 Baru

Gunakan Composer untuk membuat project baru:

```bash
composer create-project laravel/laravel nama-project-anda
```
Gantilah nama-project-anda dengan nama folder project yang kamu inginkan.

## 📂 2. Masuk ke Direktori Project
``` bash
cd nama-project-anda
```
## ⚙️ 3. Menyalin File .env
```bash
cp .env.example .env
```
## 📝 4. Konfigurasi Environment
Edit file .env sesuai konfigurasi lokal kamu:
``` bash
APP_NAME=Laravel
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=root
DB_PASSWORD=
```
## 🔑 5. Generate Application Key
```
php artisan key:generate
```
## 🧱 6. Jalankan Migrasi (Opsional)
Jika kamu ingin langsung menggunakan struktur database default:
```
php artisan migrate
```
## ▶️ 7. Menjalankan Server Laravel
Jalankan built-in development server:
```
php artisan serve
```
Akses aplikasi di:
```
http://127.0.0.1:8000
```
## 🎨 8. (Opsional) Install dan Jalankan Asset Frontend
Jika menggunakan Laravel dengan Vite:
```
npm install
npm run dev
```

Gunakan .env.testing untuk konfigurasi khusus saat menjalankan automated tests.

Untuk autentikasi cepat, bisa gunakan Laravel Breeze atau Jetstream.



# Cara Push Laravel ke GitHub dengan Git Bash

## 1. Inisialisasi Git
```
git init
```
## 2. Tambahkan semua file ke Git
```
git add .
```
## 3. Commit perubahan pertama
```
git commit -m "Initial commit"
```
## 5. Buat repository di GitHub, lalu hubungkan dengan:
```
git remote add origin https://github.com/username/repo-kamu.git
```
## 6. Ganti nama branch ke main (kalau belum)
```
git branch -M main
```
## 7. Push ke GitHub
```
git push -u origin main
```
