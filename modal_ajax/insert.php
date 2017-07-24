<?php
/**
 * Created by PhpStorm.
 * User: erevos13
 * Date: 27/6/2017
 * Time: 3:44 μμ
 */

require "connect.php";

$data = $_REQUEST;
    $output = '';
    $message = '';

    $name = mysqli_real_escape_string($connect,$data['name']);
    $last_name = mysqli_real_escape_string($connect, $data["last_name"]);
    $email = mysqli_real_escape_string($connect, $data["email"]);
    $phone = mysqli_real_escape_string($connect, $data["phone"]);
    $comments = mysqli_real_escape_string($connect, $data["comments"]);


    $query = "INSERT INTO info ( name, last_name, email , phone,  comments ) VALUES (  '{$name}' , ' {$last_name} ','{$email }', '{$phone}' , '{$comments}')";


if (mysqli_query($connect,$query) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " ;
}

$connect->close();


