# DataLeads

DataLeads adalah aplikasi berbasis web untuk mengelola data leads. Aplikasi ini memungkinkan pengguna untuk menyimpan, mencari, dan menampilkan data leads melalui antarmuka web yang sederhana. Aplikasi ini dibuat dengan menggunakan HTML, CSS, Bootstrap, PHP dan MYSQL

## Persyaratan
Anda dapat menjalankan aplikasi DataLeads ini, jika anda sudah memiliki syarat berikut:
1. Server Web dan Database : XAMPP
2. PHP: Versi 7.0 atau lebih baru.

## Instalasi
### 1. Unduh File
1. Sebelum menjalankan aplikasi DataLeads, silahkan anda untuk semua file yang ada di repository ini.
2. Pindahkan semua file ke dalam folder htdocs (untuk XAMPP).
3. Jangan ubah ubah posisi filenya, ini bisa mengakibatkan error karena salah pemanggilan file. Berikut struktur file yang benar 
```arduino
DataLeads/
├── config/
│   ├── database.php
│   └── query.sql
├── public/
│   ├── index.php
│   ├── leads.php
│   ├── save_lead.php
│   └── search_leads.php
└── templates/
    ├── footer.php
    └── header.php

```
berikut perjelasan tiap file
#### config/ - Berisi file konfigurasi :
- database.php - Konfigurasi koneksi database.
- query.sql - Skrip SQL untuk membuat tabel dan memasukkan data awal.
#### public/ - Berisi file-file yang dapat diakses oleh publik: 
- index.php - Halaman utama aplikasi.
- leads.php - Halaman untuk menambahkan leads.
- save_lead.php - Endpoint untuk menyimpan data lead baru.
- search_leads.php - Endpoint untuk mencari leads berdasarkan kriteria tertentu.
#### templates/ - Berisi template untuk header dan footer:
- header.php - Template untuk data data pada head halaman.
- footer.php - Template untuk meng-import script yang dibutuhkan.
### 2. Konfigurasi Database
1. Buka aplikasi MySQL (misalnya phpMyAdmin atau MySQL command line).
2. Jalankan perintah SQL dari file query.sql untuk membuat database lead_management dan tabel produk, sales dan leads

### 3. Menjalankan Aplikasi
1. Buka XAMPP dan aktifkan apache dan MYSQL
2. Akses aplikasi melalui URL yang sesuai, misalnya http://localhost/DataLeads/public/index.php.

### 4. Panduan Penggunaan
#### Menampilkan data leads bulan ini
Akses http://localhost/DataLeads/public/ untuk menampilkan data leads yang tersimpan di database.
#### Menyimpan Data Lead Baru
Gunakan http://localhost/DataLeads/public/leads.php untuk menyimpan data lead baru. Endpoint ini menerima permintaan POST dengan parameter tanggal, sales, product, nomor WhatsApp nama lead dan kota.
#### Mencari Leads
Gunakan http://localhost/DataLeads/public/search_leads.php untuk mencari leads berdasarkan kriteria tertentu. Endpoint ini menerima permintaan GET dengan parameter query. Untuk aplikasi ini bisa mencari berdasarkan nama produk, dan juga berdasarkan Sales dan bulan