## Persyaratan

Sebelum memulai, pastikan sistem Anda sudah terpasang:
- PHP >= 8.2
- Composer
- Node.js dan NPM

## Instalasi

1. **Clone Repository**
   ```bash
   git clone [<URL-REPOSITORY-ANDA>](https://github.com/muhBilal/email.git)
   cd email
   ```

2. **Instal Dependensi PHP dengan Composer**
   ```bash
   composer install
   ```

3. **Instal Dependensi Frontend dengan NPM**
   ```bash
   npm install
   ```

4. **Salin File Konfigurasi**
   ```bash
   cp .env.example .env
   ```

5. **Generate Key Aplikasi**
   ```bash
   php artisan key:generate
   ```

6. **Konfigurasi Database**
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nama_database
   DB_USERNAME=username_database
   DB_PASSWORD=password_database
   ```

7. **Migrasi dan Seed Database**
   ```bash
   php artisan migrate --seed
   ```

8. **Jalankan Server Lokal**
   ```bash
   php artisan serve
   ```

9. **Compile Aset Frontend (Vite)**
   ```bash
   npm run dev
   ```

## Lisensi

Proyek ini menggunakan lisensi MIT. Silakan periksa file [LICENSE](LICENSE) untuk informasi lebih lanjut.
