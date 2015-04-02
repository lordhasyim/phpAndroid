<?php
/**
 * Created by PhpStorm.
 * User: hacksyim
 * Date: 3/7/2015
 * Time: 12:37 PM
 */

// coba bikin class DbConnect yg mengambil fungsi con di dbconfig


// array for JSON response
$response = array();

// check for required fields
if (isset($_POST['name']) && isset($_POST['price']) && isset($_POST['description'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    // include db connect
    require_once __DIR__ . '/DbConnect.php';

    // connect to db
    $db = new DbConnect();
    $con = $db->connect();

    // mysqli inserting a new row
    $result = mysqli_query($con, "INSERT INTO products (name, price, description) VALUES ('$name','$price','$description')");

    // check if row inserted or not
    if ($result) {
        // succesfully inserted into database
        $response["success"] = 1;
        $response["message"] = "Product succesfully created";
        // echo-ing JSON response
        echo json_encode($response);
    } else {
        // failed inserted into database
        $response["success"] = 0;
        $response["message"] = "Oops An error occurred!!!";
        echo json_encode($response);
    }
} else {
    // required is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
    echo json_encode($response);
}
