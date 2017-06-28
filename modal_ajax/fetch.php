<?php
/**
 * Created by PhpStorm.
 * User: erevos13
 * Date: 27/6/2017
 * Time: 3:43 μμ
 */
require "connect.php";

if(isset($_POST["employee_id"]))
{
    $id = $_POST['employee_id'];

    $query = "SELECT * FROM info WHERE id = '{$id}'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_array($result);
    echo json_encode($row);
}
