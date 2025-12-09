Sistem Area Parkir Warga Sekolah - Laravel 12

Proyek ini merupakan aplikasi manajemen **area parkir kendaraan warga sekolah**, dibuat menggunakan **Laravel 12**.

---

Fitur Utama:
- Pendataan kepemilikan kendaraan warga sekolah
- Riwayat masuk keluarnya kendaraan warga sekolah

---

Instalasi dan Setup

1. Clone Repository

git clone https://github.com/harakuharonori-svg/EduPark

cd EduPark

2. Installing

composer install

3. Konfigurasi env

cp .env.example .env

lalu atur konfigurasi database di file .env:

DB_DATABASE=edupark (atau nama database lain)

DB_USERNAME=root

DB_PASSWORD=

4. Generate Key

php artisan key:generate

5. Migrasi Database

php artisan migrate

6. Menjalankan Seeder

php artisan db:seed

---

Cara Menjalankan Web:
php artisan serve

Web akan berjalan di:
http://127.0.0.1:8000
