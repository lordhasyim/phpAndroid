<?php
/**
 * Created by PhpStorm.
 * User: hacksyim
 * Date: 3/6/2015
 * Time: 5:54 AM
 */

$mysqli = mysqli_connect("localhost", "root", "", "androidhive");
if (mysqli_connect_error()){
    echo "MySql connection data error" . $mysqli->connect_error();
}
