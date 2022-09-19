## Tentang Aplikasi
Aplikasi ini merupakan sebuah miniproject user management pada sistem penjualan parfum.

## Kebutuhan Pendukung
1. Visual Studio Code
2. Composer
3. Nodejs
4. XAMPP (php versi 8)

## Cara Menjalankan Aplikasi
1. Buka folder yang akan digunakan, misalnya folder <code>D:/MiniProject/</code>
2. Jalankan terminal pada folder yang akan digunakan, bisa dengan klik kanan dan pilih `open in terminal`
3. Download sourcecode ini dengan mengetikkan peritah pada cli <code>git clone https://github.com/naufal-rafif/sales-mangement.git</code>
4. Setelah sourcecode terinstall, masuk kedalam folder install dengan mengetikkan <code>cd sales-management</code> 
5. Kemudian, install juga seluruh dependensi yang akan digunakan dengan mengetikkan perintah <code>composer install</code> dan <code>npm install</code> (pastikan bahwa <a href="https://getcomposer.org/">composer</a> dan <a href="https://nodejs.org/en/download/">nodejs</a> sudah terinstall)
6. kemudian ketikkan perintah <code>code .</code> untuk membuka code editor (visual studio code)
7. copy file `.env.example` dan ubah file hasil copy tersebut menjadi `.env`
8. Buka file `.env` tersebut dan ubah `APP_URL=http://localhost:8080` dan `DB_DATABASE=sales_management` (pastikan database `sales_management` sudah terbuat pada MySQL database)
9. Buka terminal pada visual studio code dan ketikkan perintah `php artisan migrate:fresh --seed` (perintah ini digunakan untuk generate tabel dan isi tabel pada database)
10. Ketikkan perintah `php artisan key:generate` untuk menambahkan kunci pada file `.env`
11. Jalankan aplikasi dengan 2 terminal yang berbeda dan ketikkan `php artisan serve` dan `npm run dev`
12. Aplikasi sudah siap digunakan

## Akses Aplikasi
### Superadmin
- email = `admin@gmail.com`
- password = `password = 123456`
### Supervisor
- email = `supervisor@gmail.com`
- password = `123456`
### Supervisor Cabang
- email = `subsupervisor@gmail.com`
- password = `123456`
### Sales
- email = `sales@gmail.com`
- password = `123456`
### Reseller
kamu bisa kunjungi `http://127.0.0.1:8000/register` untuk registrasi sebagai reseller

## User Stories
1. Super admin yg dapat mengelola seluruh akses user
2. Supervisor Kantor pusat yg dpt mengelola akses kantor cabang
3. Supervisor Kantor cabang yg dapat mengelola akses sales kantor cabang n reseller
4. Sales kantor cabang melakukan input penjualan
5. Reseller baru dari external yg perlu approval Supervisor Kantor Cabang

## Fitur
1. Manajemen User
2. Manajemen Cabang
3. Manajemen Penjualan
4. Manajemen Produk

## Keberlanjutan
1. Menambahkan kategori produk
2. Menambahkan email authentication
3. Menambahkan statistik penjualan produk
4. dan lain sebagainya
