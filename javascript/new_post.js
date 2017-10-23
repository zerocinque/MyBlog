$('#lbl-alert').hide();
var inputs = document.getElementsByTagName('input');


function submit() {
    var flag = false;

    for (var i = 0; i < inputs.length - 1; i++) {
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

    var title = document.getElementById('input_title');
    var body = document.getElementById('input_body');
    var tags = document.getElementById('input_tags');

    if (!title.value) {
        event.preventDefault();
        title.placeholder = 'Insert the Title!';
        return;
    }

    if (!body.value) {
        event.preventDefault();
        body.placeholder = 'Insert the Body!';
        return;
    }

    if (title.value.length>255) {
        event.preventDefault();
        $('#lbl-alert').html('The Title is too long, max length: 255 characters').show();
        return;
    }

    if(body.value.length>65535){
        event.preventDefault();
        $('#lbl-alert').html('The Body is too long, max length: 65.535 characters').show();
        return;
    }


    var post = new Object();
    post.title = title.value;
    post.body = body.value;
    post.tags = tags.value;
    
    $.post('/MyBlog/controller/new_post.php', 
        {"post": JSON.stringify(post)},
        function(data){
            //console.log(data);
            var obj = JSON.parse(data);

            console.log(data);
            //bisogna gestire le eccezioni
            if(obj.Error || !obj.id){
                event.preventDefault();
                $('#lbl-alert').html('DB Error').show();
            }

            window.location.replace('./');
            
        });

    
}
