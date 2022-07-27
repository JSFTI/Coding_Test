# Coding Test USU

Jawaban soal pertama disimpan dalam file No_1.php

Jawaban soal kedua adalah repositori ini.

API dibangun menggunakan framework CodeIgniter 4

Langkah-langkah installasi:
1. Clone repositori ini
2. Jalankan perintah composer install
3. Gandakan file .env.example dan ganti nama file gandaan menjadi .env
4. Konfigurasi .env sesuai dengan keperluan sistem
5. Import database dari file coding_test.sql
6. Jalankan perintah php spark serve

API Endpoint:
GET   /mahasiswa
Mengembalikan daftar mahasiswa

POST  /mahasiswa
Menambahkan data mahasiswa ke database.
Request body params:
{
  nim: string
  nama: string
  hp: string
  jk: 'pria' | 'wanita'
}