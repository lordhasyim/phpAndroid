<?php
/**
 * Created by PhpStorm.
 * User: hacksyim
 * Date: 3/6/2015
 * Time: 6:30 AM
 */
include "config.php";

$response = array();

$result =$mysqli->query("SELECT * FROM products");
if (!empty($result)) {
    // check for empty result
    if (mysqli_num_rows($result) > 0) {
        $result = mysqli_fetch_array($result);

        $product = array();
        $product["pid"] = $result["pid"];
        $product["name"] = $result["name"];
        $product["price"] = $result["price"];
        $product["description"] = $result["description"];
        $product["created_at"] = $result["created_at"];
        $product["updated_at"] = $result["updated_at"];
        //success
        $response["success"] = 1;

        //user node
        $response["product"] = array();
        array_push($response["product"], $product);

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
