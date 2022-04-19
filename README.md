agar semua dapat berjalan dengan lancar, import terlebih dahulu database tiket.sql

1. php-Cli untuk membuat sejumlah kode ticket berdasarkan Event id.
  Untuk menjalankan menggunakan php CLI, maka diperlukan menginstal php
  setelah itu buka cmd, lalu untuk root folder menuju ke lokasi file generate_tiket.php
  setelah itu masukan command "php generate_tiket.php {event_id} {jumlah_tiket}" -> php generate_tiket.php 2 1000
  makan akan menjalankan script yang ada didalamnya untuk me-generate secara random
  
2. untuk API saya menggunakan postman untuk melakukan testnya
untuk case 1 menarik data berdasarkan event id dan tiket code
dengan memasukan parameter ticket_code, event_id, dan function (function ini berfungsi untuk menarik API berdasarkan fungsi yang telah di buat didalam 1 file)
http://localhost/detik/API.php?ticket_code={data tiket code}&event_id={data event id}&function=getTiketbyID
jika berhasil maka akan mengeluarkan output berupa tiket code dan statusnya, jika gagal status = 404
  
3. untuk case 2 mengupdate data status event id dan tiket code
dengan memasukan parameter ticket_code, event_id, status dan function (function ini berfungsi untuk menarik API berdasarkan fungsi yang telah di buat didalam 1 file)
http://localhost/detik/API.php?ticket_code={data tiket code}&event_id={data event id}&function=updateTicket&status={status yang di rubah}
jika berhasil maka akan mengeluarkan output beruta tiket code, updated_at  dan statusnya, jika gagal status = 404
