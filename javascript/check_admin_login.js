//var form = document.getElementById('form');
var inputs = document.getElementsByTagName('input');

function check(){
    var flag = false;

    for (var i = 0; i < inputs.length; i++) {
        if (!inputs[i].value) {
            event.preventDefault();
            inputs[i].placeholder = 'Insert the ' + inputs[i].name + '!';
            console.log('Error: ' + inputs[i].name + ' has not been inserted.');
            if (!flag) {
                flag = true;
            }
        }
    }

    if (flag) {
        return;
    }

    flag = false;
    var usernameRegex = /^[\w.\-\_]+$/;
    var user_name = document.getElementById('input_username');
    var password = document.getElementById('input_password');

    /*if (!user_name.test(user_name.value)) {
        event.preventDefault();
        user_name.placeholder = 'User Name uncorrect! re-enter it!';
        user_name.value = '';
        password.value = '';
        return;
    }*/

    /*var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}$/;
    if (!passwordRegex.test(password.value)) {
        event.preventDefault();
        password.placeholder = 'Password uncorrect!';
        password.value = '';
        r_password.value = '';
        return;
    }*/
    //event.preventDefault();


    var shaObj = new jsSHA("SHA-512", "TEXT");
    shaObj.update(password.value);
    var hash = shaObj.getHash("HEX");
    //console.log(hash.length)

    //console.log(hash);

    var adm = new Object();
    adm.user_name = user_name.value;
    adm.password = hash;
    //console.log(adm);

    $.post('/MyBlog/controller/admin_login.php', 
        {"admin": JSON.stringify(adm)},
        function(data){
            var obj = JSON.parse(data);
            
            //console.log(data);
            
            if(!obj.user_name){
                event.preventDefault();
                $('#lbl_error').html('ERROR: the username is uncorrect. Re-enter it.');
                user_name.value = '';
                password.value = '';
                return;
            }
            else if(!obj.password){
                event.preventDefault();
                $('#lbl_error').html('ERROR: the password is uncorrect. Re-enter it.');
                password.value = '';
                return;
            }
            else{
                //console.log(obj.user_name);
                //$('#lbl_error').html('OK');
                //event.preventDefault();
                window.location.replace('./');
            }
            //event.preventDefault();
            
        });

    
}

