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
    <div class="col-md-6">
        <form method="post" id="insert_form">
            <label>Name</label>
            <input type="text" name="name" id="name" class="form-control" />
            <br />
            <label>Last name</label>
            <input name="last_name" id="last_name" class="form-control"/>
            <br />
            <label>Email</label>
            <input type="text" name="email" id="email" class="form-control" />
            <br />
            <div class="form-group">
                <label for="bridge">Select list:</label>
                <select class="form-control" id="bridge" name="bridge">
                    <option>None</option>
                    <option>eAgent</option>
                    <option>iArts</option>
                    <option>Orbit</option>
                    <option>G&G</option>
                    <option>EstateWeb</option>
                    <option>Globalc</option>
                </select>
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
<div class="col-md-6">
    <a href="https://www.spiti360.gr/index.php?lang=el" target="_blank" ><img src="image/spiti360.png"></a>
</div>

</div>

<div class="text-center">
    <h2>Table of data</h2>
    <div class="table-responsive col-md-8  col-md-offset-2">

        <br />
        <div id="employee_table">
            <table class="table table-bordered ">
                <tr>
                    <th width="20%">Name</th>
                    <th width="15%">Last Name</th>
                    <th width="15%">Email</th>
                    <th width="15%">Phone</th>
                    <th width="15%">Bridge</th>
                    <th width="15%">Comments</th>
                    <th width="15%">Edit</th>

                </tr>
                <?php
                while($row = mysqli_fetch_array($result))
                {
                    ?>
                    <tr>
                        <td><?php echo $row["name"]; ?></td>
                        <td><?php echo $row["last_name"]; ?></td>
                        <td><?php echo $row["email"]; ?></td>
                        <td><?php echo $row["phone"]; ?></td>
                        <td><?php echo $row["bridge"]; ?></td>
                        <td><?php echo $row["comments"]; ?></td>

                        <td>
                            <input type="button" name="edit" value="edit" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs edit_data" />
                        </td>

                    </tr>
                    <?php
                }
                ?>
            </table>

        </div>

    </div>
</div>
</div>



</div>

</body>
</html>

<div id="add_data_Modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Update the databases</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="update_form">
                    <label>Name</label>
                    <input type="text" name="name" id="name_modal" class="form-control" />
                    <br />
                    <label>Last name</label>
                    <input name="last_name" id="last_name_modal" class="form-control"/>
                    <br />
                    <label>Email</label>
                    <input type="text" name="email" id="email_modal" class="form-control" />
                    <br />
                    <div class="form-group">
                        <label for="bridge">Select list:</label>
                        <select class="form-control" id="bridge_modal" name="bridge">
                            <option>None</option>
                            <option>eAgent</option>
                            <option>iArts</option>
                            <option>Orbit</option>
                            <option>G&G</option>
                            <option>EstateWeb</option>
                            <option>Globalc</option>
                        </select>
                        <label>Phone</label>
                        <input type="text" name="phone" id="phone_modal" class="form-control" />
                        <br />
                        <div class="form-group">
                            <label for="comments">Comment:</label>
                            <textarea class="form-control" rows="5" id="comments_modal" name="comments"></textarea>
                        </div>
                        <br />
                    <input type="hidden" name="id" id="employee_id_modal" />
                    <input type="submit" name="insert" id="insert_modal"  value="update" class="btn btn-success " />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){


        $(".edit_data").click(function(){

            var employee_id = $(this).attr("id");
            $.ajax({
                url:"fetch.php",
                method:"POST",
                data:{employee_id:employee_id},
                dataType:"json",
                success:function(data){
                    $('#name_modal').val(data.name);
                    $('#last_name_modal').val(data.last_name);
                    $('#phone_modal').val(data.phone);
                    $('#email_modal').val(data.email);
                    $('#bridge_modal').val(data.bridge);
                    $('#comments_modal').val(data.comments);
                    $('#employee_id_modal').val(data.id);
                    $('#add_data_Modal').modal('show');
                    console.log(data);
                    return false;
                }
            });
        });

        $('#insert').click(function(){

            var name = $("#name").val();
            var last_name = $("#last_name").val();
            var email = $("#email").val();
            var phone = $("#phone").val();
            var bridge = $("#bridge").val();
            var comments = $("#comments").val();

            if($('#name').val() == "")
            {
                alert("Name is required");
            }
            else if($('#last_name').val() == '')
            {
                alert("Last name is required");
            }
            else if($('#email').val() == '')
            {
                alert("Email is required");
            }
            else if($('#phone').val() == '')
            {
                alert("Phone is required");
            }
            else
            {
                $.ajax({
                    url:"insert.php",
                    method:"POST",

                    data  : {'name': name,'email': email ,'last_name':last_name,'phone':phone,'bridge': bridge, 'comments': comments},

                    success:function(data){
                        $('#employee_table').html(data);
                        console.log(data);

                    }
                });

            }
        });

        $('#insert_modal').click(function(){


            $.ajax({
                    url:"insert.php",
                    method:"POST",
                    data:$('#update_form').serialize(),
                    success:function(data){
                        $('#employee_table').html(data);
                        console.log(data);
                    }
                });

        });


    });
</script>
