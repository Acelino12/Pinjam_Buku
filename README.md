1. setup .env <br>

<table>
    <tr>
        <td>sqllite</td>
        <td>mysql</td>
        <td>postgres</td>
    </tr>
    <tr>
        <td>
        <br>DB_CONNECTION=sqlite
        <br>DB_HOST=127.0.0.1
        <br>DB_PORT=3306
        <br>DB_DATABASE=pinjam_buku
        <br>DB_USERNAME=
        <br>DB_PASSWORD=
        </td>
        <td>
        <br>DB_CONNECTION=sqlite
        <br>DB_HOST=127.0.0.1
        <br>DB_PORT=3306
        <br>DB_DATABASE=pinjam_buku
        <br>DB_USERNAME=
        <br>DB_PASSWORD=
        </td>
        <td>
        <br>DB_CONNECTION=pgsql
        <br>DB_HOST=127.0.0.1
        <br>DB_PORT=5432
        <br>DB_DATABASE=pinjam_buku
        <br>DB_USERNAME=
        <br>DB_PASSWORD=
        </td>
    </tr>

</table>

2. generate key untuk .env dengan CLI

    php artisan key:generate <br>

3. lakukan migrasi database 

    php artisan migrate <br>

4. jalakan aplikasi

    php artisan serve <br>
