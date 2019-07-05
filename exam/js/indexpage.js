$(document).ready(function() {
    $('#username').val($.cookie("user"));
    $('#password').val($.cookie("password"));
    document.onkeydown = function(e){
        var ev = document.all ? window.event : e;
        if(ev.keyCode == 13) {
            $('#login').click();
        }
    }
});
            
$('#login').click(function () {
    var user = $('#username').val();
    var op = $('#password').val();
    var password = hex_sha1(op);
    //console.log(password);
    $.ajax({
        url: 'ajax/login_validate.php',
        type: 'post',
        data: {user: user, password : password},
        dataType: 'html',
        success: function(data) {
            //console.log(data);
            $.cookie("user", user, { expires: 7 });
            $.cookie("password", op, { expires: 7 });
            window.location.href = 'choose.php';
        }
    });
});
            
          