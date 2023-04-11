$(document).ready(function () {
    $('.gopay').click(function (e) { 
        e.preventDefault();


        var fname = $('.fname').val();
        var lname = $('.lname').val();
        
        if(!fname){
            fname_error = "First Name is Required";
            $('#fname_error').html('');
            $('#fname_error').html(fname_error);
        }else{
            fname_error = "";
            $('#fname_error').html('');
        }
        if(!lname){
            lname_error = "Last Name is Required";
            $('#lname_error').html('');
            $('#lname_error').html(lname_error);
        }else{
            lname_error = "";
            $('#lname_error').html('');
        }
        if(fname_error != '' || lname_error != ''){
            return false;
        }
        else{
            var data = {
                'fname':fname,
                'lname':lname,
            }
            $.ajax({
                method: "POST",
                url: "/proceed-to-pay",
                data: data,
                success: function (response) {
                    alert(response.total_price);
                }
            });
        }
    });
});