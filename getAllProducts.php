<?php
/**
 * Created by PhpStorm.
 * User: hacksyim
 * Date: 3/6/2015
 * Time: 6:30 AM
 */
//include "config.php";

$response = array();

// include db connect
require_once __DIR__ . '/DbConnect.php';

// connect to db
$db = new DbConnect();
$con = $db->connect();

$result = mysqli_query($con, "SELECT * FROM products");

if (!empty($result)) {
    // check for empty result
    if (mysqli_num_rows($result) > 0) {
        //looping hasil
        // products node
        $response["products"] = array();

        while ($row = $result->fetch_array()) {
            $product = array();
            $product["pid"] = $row["pid"];
            $product["name"] = $row["name"];
            $product["price"] = $row["price"];
            $product["description"] = $row["description"];
            $product["created_at"] = $row["created_at"];
            $product["updated_at"] = $row["updated_at"];

            //user node
            //$response["product"] = array();
            // push single record into final response
            array_push($response["products"], $product);
        }

        //success
        $response["success"] = 1;

        //echo-ing JSON response
        echo json_encode($response);

    } else {
        // no product found
        // succesfully inserted into database
        $response["success"] = 0;
        $response["message"] = "No product found";

        // echo-ing JSON response
        echo json_encode($response);
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";

    //echo-ing JSON response
    echo json_encode($response);
    die();
}
