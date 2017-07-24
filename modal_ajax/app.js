/**
 * Created by erevos13 on 24/7/2017.
 */
function addData() {

    if( $('#name').val().length == 0 ) {
        alert('Please Enter a name');
        return false;
    }

    if( $('#last_name').val().length == 0 ) {
        alert('Please Enter a name');
        return false;
    }

    if( $('#email').val().length == 0 ) {
        alert('Please Enter a name');
        return false;
    }

    requestData = $("#name,#last_name,#email,#phone,#comments").serialize();
    $.ajax({
        url: "http://localhost/ajax-php-mysql-form/modal_ajax/insert.php",
        type: "post",
        data: requestData,
        dataType: "html",
        cache: false,
        success: function (data) {
            $('#name').val('');
            $('#last_name').val('');
            $('#email').val('');
            $('#phone').val('');
            $('#comments').val('');

        },
        error : function( http , status , error ) {
            alert( 'Some Error : ' + error );
        }
    });
    return false;

    
}

function update() {
    requestData = $("#employee_id").serialize();
    $.ajax({
        url: "http://localhost/ajax-php-mysql-form/modal_ajax/fetch.php",
        type: "post",
        data: requestData,
        dataType: "html",
        cache: false,
        success: function (data) {
            $('#employee_table').html(data);



        },
        error : function( http , status , error ) {
            alert( 'Some Error : ' + error );
        }
    });

}




setInterval( update , 2000 );


