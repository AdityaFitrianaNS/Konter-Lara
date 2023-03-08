## Deskripsi
Konter Lara dibuat untuk sistem informasi dalam bentuk dashboard. Digunakan untuk konter pulsa/hp yang dimana memuat informasi seperti data aksesoris handphone, kuota, pulsa, pendapatan, dan pemasukan.

Role :
- Owner (Pemilik)       : Memiliki semua hak akses
- Employee (Karyawan)   : `Read` data aksesoris dan provider,  Pengeluaran dan Pendapatan bisa `Create` dan `Update`
- User(Default)

## Teknologi
- Toastr
- Bootstrap 5
- Javascript
- Datatables
- JQuery
- PHP8
- Laravel 10
- MySQL

## Instalasi

### Persiapan dependencies
```
- composer install
- copy .env.example, and paste change to .env 
or 
- change name .env.example to .env
```
  
### Generate dan Migration
```
- php artisan key:generate
- php artisan migrate --seed
```

### Persiapan Front End
```
- npm install
- npm run dev
```

### Run Development Server
```
- php artisan serve
```
### Akun Owner
email    : owner@gmail.com
password : password

Template menggunakan <a href="https://github.com/adminkit/adminkit">AdminKit</a> dan mengubah beberapa stylenya di project `Konter Lara`.