<?php
/**
 * Created by PhpStorm.
 * User: hacksyim
 * Date: 3/7/2015
 * Time: 12:39 PM
 */

include "config.php";

$response = array();

// check for required fields
if (isset($_POST['pid']) && isset($_POST['name']) && isset($_POST['price']) && isset($_POST['description'])) {
    $pid = $_POST['pid'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    //mysqli update row with matched pid
    $result = $mysqli->query($db, "UPDATE products SET name = '$name', price = '$price', description= '$description' WHERE pid = '$pid'");

    //check if row is inserted or not
    if ($result) {
        // successfully updated
        $response["success"] = 1;
        $response["message"] = "Product successfully updated. ";

        // echo-ing JSON response
        echo json_encode($response);
    } else {
    }
} else {
    //required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";

    //echo-ing JSON response
    echo json_encode($response);
}