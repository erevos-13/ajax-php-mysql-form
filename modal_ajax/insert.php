<?php
/**
 * Created by PhpStorm.
 * User: erevos13
 * Date: 27/6/2017
 * Time: 3:44 μμ
 */

require "connect.php";
if(!empty($_POST))
{
    $output = '';
    $message = '';
    $id = $_POST["id"];
    $name = mysqli_real_escape_string($connect,$_POST['name']);
    $last_name = mysqli_real_escape_string($connect, $_POST["last_name"]);
    $email = mysqli_real_escape_string($connect, $_POST["email"]);
    $phone = mysqli_real_escape_string($connect, $_POST["phone"]);
    $bridge = mysqli_real_escape_string($connect, $_POST["bridge"]);
    $comments = mysqli_real_escape_string($connect, $_POST["comments"]);
    if($id != '')
    {

        $query = "
           UPDATE info SET name='{$name}', last_name='{$last_name}', email='{$email}', phone='{$phone}', bridge='{$bridge}', comments='{$comments}'  WHERE id='{$id}'";

    }
    else
    {
        $query = "INSERT INTO info ( name, last_name, email , phone, bridge, comments ) VALUES (  '{$name}' , ' {$last_name} ','{$email }', '{$phone}' , '{$bridge}','{$comments}')";


    }
    if(mysqli_query($connect, $query))
    {

        $select_query = "SELECT * FROM info ORDER BY id DESC";
        $result = mysqli_query($connect, $select_query);
        $output .= '  
                <table class="table table-bordered">  
                     <tr>  
                          <th width="70%">Name</th>  
                          <th width="15%">Last Nmae</th>  
                          <th width="15%">email</th>  
                          <th width="15%">Phone</th>  
                          <th width="15%">Bridge</th>  
                          <th width="15%">Comments</th>
                          <th width="15%">Edit</th>
                            
                     </tr>  
           ';
        while($row = mysqli_fetch_array($result))
        {
            $output .= '  
                     <tr>  
                          <td>' . $row["name"] . '</td> 
                          <td>' . $row["last_name"] . '</td> 
                          <td>' . $row["email"] . '</td> 
                          <td>' . $row["phone"] . '</td> 
                          <td>' . $row["bridge"] . '</td> 
                          <td>' . $row["comments"] . '</td> 
                           
                          <td><input type="button" name="edit" value="edit" id="'.$row["id"] .'" class="btn btn-info btn-xs edit_data" /></td>  
                     </tr>  
                     
                ';
        }
        $output .= '</table>';
    }
    echo $output;
}
