var inputs = document.getElementsByTagName('input');
$(document).ready(function() {
	$("#lbl-alert").hide();
});


function hash(string){
	var shaObj = new jsSHA("SHA-512", "TEXT");
    shaObj.update(string);
    var hash = shaObj.getHash("HEX");
    return hash;
}

function processResult(){

}

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

    var user_or_email_regex = /^[\w\.\-\_]+@[\w\.\-\_]+$/;
    var user = document.getElementById('input_user');
    var password = document.getElementById('input_password');
    var input = new Object();

    if (!user_or_email_regex.test(user.value)) {
    	//user input email
    	//set user_name
    	input.user_name = user.value;
    	input.email = null;
    }

    else if(user_or_email_regex.test(user.value)) {
    	//user input username
    	//set email
    	input.user_name = null;
    	input.email = user.value;
    }

    input.password = hash(password.value);

    //console.log(input);
    
    $.post('/MyBlog/controller/login.php', 
        {"user": JSON.stringify(input)},
        function(data){
            //console.log(data);

            var obj = JSON.parse(data);
            //console.log(obj.state);

            switch(obj.state){
            	case 1:
            		window.location.replace('home.php');
            		break;
            	case 0:
            		password.value = '';
            		$('#lbl-alert').html('The username/email entered there ins\'t in our archives').show();
            		break;
            	case -1:
            		password.value = '';
            		$('#lbl-alert').html('The password is uncorrect! Re-enter it.').show();
            		break;
            }            
        });

    
}
