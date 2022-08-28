# Final Project

Website link :
<https://perpusvsga.000webhostapp.com/>

email : admin@gmail.com
password : password

Buatlah SIM Perpus dengan modul sebagai berikut;

1. Login. ✔
2. Beranda.✔
3. Anggota-list.✔
4. Anggota-form.✔
5. Cetak kartu.✔
6. Buku-list.✔
7. Buku-form.✔
8. Transaksi-list.✔
9. Transaksi-form.✔
10. Cetak laporan (peminjaman & pengembalian).✔

## Final Project Spec DB

    |-- anggota
        |-- id_admin int(11) auto_increment
        |-- nama varchar(50)
        |-- email varchar(75)
        |-- telp varchar(15)
        |-- password varchar(255)
        |-- foto varchar(255)
    |-- anggota
        |-- id_anggota int(11) auto_increment
        |-- kode_anggota varchar(10)
        |-- nama varchar(50)
        |-- email varchar(75)
        |-- telp varchar (15)
        |-- alamat (text)
        |-- foto varchar(255)
        |-- jenis kelamin (enum)
    |-- buku
        |-- id_buku int(11) auto_increment
        |-- kode_buku varchar(15)
        |-- judul varchar(100)
        |-- keterangan text
        |-- pengarang varchar(50)
        |-- penerbit varchar (50)
        |-- tahun YEAR
    |-- transaksi
        |-- id_transaksi int(11) auto_increment
        |-- id_anggota int(11)
        |-- id_buku int(11)
        |-- tanggal_pinjam DATE
        |-- tanggal_kembali DATE
        |-- tanggal_kembali_asli DATE

## Folder structure

    |-- assets
        |-- css
        |-- img
        |-- js
    |-- src
        |-- auth
        |-- books
        |-- members
        |-- transaction
            |-- borrows
            |-- reports
            |-- returns
        |-- dashboard.php
    |-- vendor
    |-- config.php
    |-- helper.php
    |-- index.php
    |-- Readme.md

## Detail of Folder

| Name   | Description                                                 |
| ------ | ----------------------------------------------------------- |
| assets | provides a root-level directory for web server helper files |
| src    | provides a root-level directory for PHP source code files   |
| vendor | provides a root-level directory for additional vendor files |

## Detail File

| Name       | Description                                              |
| ---------- | -------------------------------------------------------- |
| config.php | File containing configuration information and connection |
| helper.php | File containing Function                                 |

## resources

<https://datatables.net/>
<https://www.youtube.com/watch?v=qVSa5v6_nuA&ab_channel=Richard%27sLab>
