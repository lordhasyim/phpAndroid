<?php
/**
 * Created by PhpStorm.
 * User: hacksyim
 * Date: 3/30/2015
 * Time: 10:40 PM
 */

//class untuk menghandle koneksi

class DbConnect
{
    //konstruktor
    function __construct()
    {
        //konek ke database
        $this->connect();
    }

    // destruktor
    function __destruct()
    {
        $this->close();
    }

    public function connect()
    {
        // import properti database untuk koneksi
        require_once __DIR__ . '/db_config.php';

        // konek ke db mysql
        $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD) or die("Tidak bisa koneksi" . mysqli_connect_error());

        // select database
        $db = mysqli_select_db($con, DB_DATABASE) or die("Tidak bisa memilih database");

        // returning connection error
        return $con;

    }

    /**
     *
     */
    public function close()
    {


    }

}
