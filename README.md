# Lagi Kelas, Ga?

Repository ini adalah repository project untuk cek keadaan lab di kelas. Saat ini project ini difokuskan untuk mengganti progam Pengumuman yang lama terpasang di TV di depan ruang administrator. 

Kedepan, kami akan berusaha membuka jadwal ini diluar lab (*rencananya*: [http://lagi-kelas.ga](http://lagi-kelas.ga)) agar mahasiswa/dosen yang ingin menggunakan Lab dapat mengecek apakah lab sedang kosong atau tidak.

## Teknologi

Untuk display pengumuman di TV, kami menggunakan [Handlebars.js](http://handlebarsjs.com) agar dapat merender tampilan yang baru setiap kali kita refresh data menggunakan Ajax. Untuk Ajax sendiri kita menggunakan library bawaan dari [jQuery](http://jquery.com) dengan sedikit racikan Promise.

Sisanya, untuk framework UInya, kita menggunakan [Bootstrap](http://getbootstrap.com) dan [Fat Free Framework](http://fatfreeframework.com) untuk Framework PHPnya.

Punya pertanyaan / Usulan? Anda boleh membuat sebuah issue untuk itu.

## Memulai

Setelah melakukan **Clone**, anda diharuskan untuk mendownload depedency dari project ini. Kami menggunakan 2 dependency manager yaitu `npm` dari Node.js dan `composer` dari PHP. Anda dapat menginstall **Node.js + NPM** dari [sini](https://nodejs.org/en/download/), dan **Composer** [di sini](https://getcomposer.org/download/).

Execute Command dibawah ini (setelah Composer dan NPM tersedia.)

```shell
npm install
composer install
```

Dan dependency terdownload, anda sekarang hanya perlu mengatur Web Engine (Nginx/Apache) anda agar project ini berjalan.

**Berikutnya** anda perlu megatur settingan database anda. Anda dapat melakukannya di file `site.ini` di folder `app/config/`.

- Pergi ke `app/config/`.

- Copy `site.example.ini` ke `site.ini`.

- Setting database anda,

  ```ini
  [database]
  ; This is database settings.
  ; we're using dsn to connect to the database.
  ; we use SQL-based database. So, if you need other langs,
  ; ask us to change some code and files.
  ; refrence link : https://fatfreeframework.com/3.6/sql
  dsn="mysql:host=127.0.0.1;port=3306;dbname=root;charset=utf8"
  username=root
  password=
  ```

  - `dsn` adalah setting mirip URL ke database anda, dalam hal ini, anda cukup mengganti `host` dan `dbname`.
  - `host` adalah alamat tempat anda menjalankan server database anda. Jika menggunakan XAMPP, cukup tuliskan `127.0.0.1`.
  - `dbname` adalah nama database anda, bukan nama tabelnya, misalkan nama tabel anda adalah `dev_ftis_pengumuman`, maka `dsn` yang harus anda tulis adalah

    ```ini
    dsn="mysql:host=127.0.0.1;port=3306;dbname=dev_ftis_pengumuman;charset=utf8"
    ```

    selalu ingat, ada `;` di setiap bagian setting tersebut.

  - `username` dan `password` adalah credential anda untuk mengakses database tersebut.

- Selesai.


## Credits & License

Siapapun boleh menggunakan repository ini diluar dari Lab Komputasi FTIS UNPAR. Project ini open source dan kami sampai saat ini masih belum menentukan license untuk project ini 😂😂.

Tapi yang pasti project ini sangat menerima sekali bantuan kontribusi dari anda.

Anyway, project ini tidak terbatas harus menggunakan PHP/HTML untuk tampilan, kami open banget untuk kemungkinan lain yang mungkin lebih menarik. Bisa buatkan issue juga kalo kamu punya ide!