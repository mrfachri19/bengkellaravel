## About Project

project berisikan aplikasi untuk bengkel, bisa sebagai inventori barang dan penjualan

1. install Composer
2. install xampp\

### notes
login admin : adminadmin1@gmail.com
pass : test123
note semua user pass nya test123
import db ke xampp
env tidak perlu diubah
### Setup Aplikasi

Jalankan perintah

```bash
composer update
```

atau:

```bash
composer install
```

Copy file .env dari .env.example

```bash
cp .env.example .env
```

Konfigurasi file .env

```bash
php artisan key:generate
```

Migrate database

```bash
php artisan migrate
```

Seeder table User, Pengaturan

```bash
php artisan db:seed
```

Menjalankan aplikasi

```bash
php artisan serve
```
