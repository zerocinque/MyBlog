var inputs = document.getElementsByTagName('input');

$('document').ready(function() {
    $('#lbl-alert').hide();
});


function submit() {
    var msg = '';
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

    var usernameRegex = /^[\w.\-\_]+$/;
    var emailRegex = /^[\w.]+@[a-zA-Z_.]+?\.[a-zA-Z]{2,3}$/;
    var user_name = document.getElementById('input_username');
    var email = document.getElementById('input_email');
    var r_password = document.getElementById('input_check_pass')
    var password = document.getElementById('input_password');

    if (!usernameRegex.test(user_name.value)) {
        event.preventDefault();
        user_name.placeholder = 'user_name uncorrect! re-enter it! You can use only letters, numbers, "_", "." and "-"';
        user_name.value = '';
        r_password.value = '';
        password.value = '';
        return;
    }

    if (!emailRegex.test(email.value)) {
        event.preventDefault();
        email.placeholder = 'Email uncorrect! re-enter it!';
        email.value = '';
        r_password.value = '';
        password.value = '';
        return;
    }

    var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}$/;
    if (!passwordRegex.test(password.value)) {
        event.preventDefault();
        password.placeholder = 'Password format uncorrect! Must have at lest a lowercase, an uppercase letter, a number and a simbol';
        password.value = '';
        r_password.value = '';
        return;
    }

    var r_password = document.getElementById('input_check_pass');
    if(r_password.value.localeCompare(password.value) != 0){
        event.preventDefault();
        r_password.value = '';
        password.value = '';
        r_password.placeholder = '';
        password.placeholder = '';
        alert("re-enter the password! the entered password are not the same.");
        return;
    }

    //event.preventDefault();


    var shaObj = new jsSHA("SHA-512", "TEXT");
    shaObj.update(password.value);
    var hash = shaObj.getHash("HEX");
    //console.log(hash.length)

    //console.log(hash);

    var user = new Object();
    user.user_name = user_name.value;
    user.email = email.value;
    user.password = hash;
    
    $.post('/MyBlog/controller/sign_in.php', 
        {"user": JSON.stringify(user)},
        function(data){
            console.log(data);

            var obj = JSON.parse(data);
            console.log(obj.state);
            if(obj.error){
                event.preventDefault();
                $('#lbl-alert').html('The Username or the Email is already been used. change it.').show();
                return;
            }
            window.location.replace('home.php');
        });

    
}

