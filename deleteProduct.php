<?php
/**
 * Created by PhpStorm.
 * User: hacksyim
 * Date: 3/7/2015
 * Time: 12:56 PM
 */

$response = array();

require_once __DIR__ . '/DbConnect.php';

$db = new DbConnect();
$con = $db->connect();

if (isset($_POST['pid'])) {
    $pid = $_POST['pid'];

    // mysqli update row with matched pid
    $result = mysqli_query($con, "DELETE FROM products WHERE pid ='$pid'");


    //check if row deleted or not
    if (mysqli_affected_rows($con) > 0) {
        //successfully updated
        $response["success"] = 1;
        $response["message"] = "Product successfully deleted";

        // echo-ing JSON response;
        echo json_encode($response);
    } else {
        //no product found
        $response["success"] = 0;
        $response["message"] = "No product found";

        // echo-ing no users JSON
        echo json_encode($response);
    }
} else {
    // required field is missing
    $reponse["success"] = 0;
    $response["message"] = "Required field(s) is missing";

    echo json_encode($response);
}