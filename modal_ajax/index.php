<?php
/**
 * Created by PhpStorm.
 * User: erevos13
 * Date: 27/6/2017
 * Time: 3:44 μμ
 */
require "connect.php";

 $query = "SELECT * FROM info ORDER BY id DESC";
 $result = mysqli_query($connect, $query);

 ?>
<!DOCTYPE html>
<html>
<head>
    <title>Orfeas Voutsaridis | PHP Ajax Update MySQL Data.</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Lato|Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="main.css">
</head>



<div class="container" style="width:700px; "  >
    <h1 align="center">Orfeas Voutsaridis CRUD with php ajax mysql</h1>
    <br />
    <div class="col-md-12">
        <form method="post" id="insert_form" onsubmit="return addData();">
            <label>Name</label>
            <input type="text" name="name" id="name" class="form-control" />
            <br />
            <label>Last name</label>
            <input name="last_name" id="last_name" class="form-control"/>
            <br />
            <label>Email</label>
            <input type="text" name="email" id="email" class="form-control" />
            <br />

            <label>Phone</label>
            <input type="text" name="phone" id="phone" class="form-control" />
            <br />
                <div class="form-group">
                    <label for="comments">Comment:</label>
                    <textarea class="form-control" rows="5" id="comments" name="comments"></textarea>
                </div>
                <br />
                <input type="hidden" name="employee_id" id="employee_id" />
            <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />
        </form>
    </div>
</div>
</div>
<div class="text-center">
    <h2>Table of data</h2>
    <div class="table-responsive col-md-8  col-md-offset-2">
        <br/>
        <div id="employee_table"></div>
    </div>
</div>
</div>
</div>
<script src="app.js"></script>
</body>
</html>

