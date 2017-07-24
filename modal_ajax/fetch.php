<?php
/**
 * Created by PhpStorm.
 * User: erevos13
 * Date: 27/6/2017
 * Time: 3:43 μμ
 */
require "connect.php";



$output ='';
$select_query = "SELECT * FROM info ORDER BY id DESC";
$result = mysqli_query($connect, $select_query);
$output .= '  
                <table class="table table-bordered">  
                     <tr>
                         <th width="15%">Name</th>  
                         <th width="15%">Last Name</th>  
                         <th width="15%">email</th>  
                         <th width="15%">Phone</th>  
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
                          <td>' . $row["comments"] . '</td>                            
                          <td><input type="button" name="edit" value="edit" id="'.$row["id"] .'" class="btn btn-info btn-xs edit_data" /></td>  
                     </tr>  
                     
                ';
}
$output .= '</table>';

echo $output;
