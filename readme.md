# Aplikasi Pemesanan Tiket Wisata
![enter image description here](https://img.shields.io/badge/HTML-239120?style=for-the-badge&logo=html5&logoColor=white)![enter image description here](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)![enter image description here](https://img.shields.io/badge/CSS-239120?&style=for-the-badge&logo=css3&logoColor=white)![alt text](https://img.shields.io/badge/JavaScript-323330?style=for-the-badge&logo=javascript&logoColor=F7DF1E)

Aplikasi Pemesan Tiket Wisata merupakan aplikasi pemesanan tiket wisata sederhana yang di bangun menggunakan **PHP** dan **MySQL**.

## Struktur Folder
Berikut ini merupakan Struktur Folder dari Tugas6.
```
📦ujian_jwd  
 ┣ 📂admin  
 ┃ ┣ 📜.DS_Store  
 ┃ ┣ 📜galeri.php  
 ┃ ┣ 📜home.php  
 ┃ ┣ 📜pesanan.php  
 ┃ ┗ 📜wisata.php  
 ┣ 📂assets  
 ┃ ┣ 📂css  
 ┃ ┃ ┣ 📜bootstrap-grid.css  
 ┃ ┃ ┣ 📜bootstrap-grid.css.map  
 ┃ ┃ ┣ 📜bootstrap-grid.min.css  
 ┃ ┃ ┣ 📜bootstrap-grid.min.css.map  
 ┃ ┃ ┣ 📜bootstrap-grid.rtl.css  
 ┃ ┃ ┣ 📜bootstrap-grid.rtl.css.map  
 ┃ ┃ ┣ 📜bootstrap-grid.rtl.min.css  
 ┃ ┃ ┣ 📜bootstrap-grid.rtl.min.css.map  
 ┃ ┃ ┣ 📜bootstrap-reboot.css  
 ┃ ┃ ┣ 📜bootstrap-reboot.css.map  
 ┃ ┃ ┣ 📜bootstrap-reboot.min.css  
 ┃ ┃ ┣ 📜bootstrap-reboot.min.css.map  
 ┃ ┃ ┣ 📜bootstrap-reboot.rtl.css  
 ┃ ┃ ┣ 📜bootstrap-reboot.rtl.css.map  
 ┃ ┃ ┣ 📜bootstrap-reboot.rtl.min.css  
 ┃ ┃ ┣ 📜bootstrap-reboot.rtl.min.css.map  
 ┃ ┃ ┣ 📜bootstrap-utilities.css  
 ┃ ┃ ┣ 📜bootstrap-utilities.css.map  
 ┃ ┃ ┣ 📜bootstrap-utilities.min.css  
 ┃ ┃ ┣ 📜bootstrap-utilities.min.css.map  
 ┃ ┃ ┣ 📜bootstrap-utilities.rtl.css  
 ┃ ┃ ┣ 📜bootstrap-utilities.rtl.css.map  
 ┃ ┃ ┣ 📜bootstrap-utilities.rtl.min.css  
 ┃ ┃ ┣ 📜bootstrap-utilities.rtl.min.css.map  
 ┃ ┃ ┣ 📜bootstrap.css  
 ┃ ┃ ┣ 📜bootstrap.css.map  
 ┃ ┃ ┣ 📜bootstrap.min.css  
 ┃ ┃ ┣ 📜bootstrap.min.css.map  
 ┃ ┃ ┣ 📜bootstrap.rtl.css  
 ┃ ┃ ┣ 📜bootstrap.rtl.css.map  
 ┃ ┃ ┣ 📜bootstrap.rtl.min.css  
 ┃ ┃ ┣ 📜bootstrap.rtl.min.css.map  
 ┃ ┃ ┣ 📜dashboard.css  
 ┃ ┃ ┣ 📜dashboard.rtl.css  
 ┃ ┃ ┗ 📜signin.css  
 ┃ ┣ 📂js  
 ┃ ┃ ┣ 📜bootstrap.bundle.js  
 ┃ ┃ ┣ 📜bootstrap.bundle.js.map  
 ┃ ┃ ┣ 📜bootstrap.bundle.min.js  
 ┃ ┃ ┣ 📜bootstrap.bundle.min.js.map  
 ┃ ┃ ┣ 📜bootstrap.esm.js  
 ┃ ┃ ┣ 📜bootstrap.esm.js.map  
 ┃ ┃ ┣ 📜bootstrap.esm.min.js  
 ┃ ┃ ┣ 📜bootstrap.esm.min.js.map  
 ┃ ┃ ┣ 📜bootstrap.js  
 ┃ ┃ ┣ 📜bootstrap.js.map  
 ┃ ┃ ┣ 📜bootstrap.min.js  
 ┃ ┃ ┣ 📜bootstrap.min.js.map  
 ┃ ┃ ┗ 📜dashboard.js  
 ┃ ┣ 📂vendor  
 ┃ ┃ ┗ 📂jquery-mask  
 ┃ ┃ ┃ ┗ 📜jquery-mask.min.js  
 ┃ ┗ 📜.DS_Store  
 ┣ 📂config  
 ┃ ┣ 📜conn.php  
 ┃ ┗ 📜function.php  
 ┣ 📂process  
 ┃ ┣ 📜galeri.php  
 ┃ ┣ 📜pesan_tiket.php  
 ┃ ┣ 📜view_galeri.php  
 ┃ ┣ 📜view_wisata.php  
 ┃ ┗ 📜wisata.php  
 ┣ 📂uploads  
 ┃ ┗ 📂wisata  
 ┃ ┃ ┣ 📂cover  
 ┃ ┃ ┃ ┣ 📜Gunung Botak-20220728123151.jpeg  
 ┃ ┃ ┃ ┣ 📜Pantai Pasir Putih-20220728123226.jpeg  
 ┃ ┃ ┃ ┣ 📜Pintu Angin-20220728123246.jpeg  
 ┃ ┃ ┃ ┗ 📜Raja Ampat-20220728221710.jpeg  
 ┃ ┃ ┗ 📂gallery  
 ┃ ┃ ┃ ┗ 📜Galeri File-20220728194533.jpeg  
 ┣ 📂views  
 ┃ ┣ 📜daftar_harga.php  
 ┃ ┣ 📜home.php  
 ┃ ┗ 📜pesan_tiket.php  
 ┣ 📜.DS_Store  
 ┣ 📜admin.php  
 ┣ 📜akun.php  
 ┣ 📜index.php  
 ┣ 📜login.php  
 ┣ 📜logout.php  
 ┗ 📜ujian_jwd.sql
```

## Prasyarat

* XAMP : PHP >= 8.0.0

## Instalasi

Pindahkan file **UjianJWD_Eka Saputra.zip** ke dalam folder **htdocs** kemudian **Ekstrak** file tersebut.

## Penggunaan

Pastikan **XAMP** sudah berjalan, kemudian tuliskan **url** berikut pada browser.
```
http://localhost/ujian_jwd/index.php
```

## Tentang Saya

![enter image description here](https://img.shields.io/github/followers/ekza97.svg?style=social&label=Follow&maxAge=2592000)
![enter image description here](https://github-readme-stats.vercel.app/api?username=ekza97&theme=blue-green)![enter image description here](https://github-readme-stats.vercel.app/api/top-langs/?username=ekza97&theme=blue-green)
