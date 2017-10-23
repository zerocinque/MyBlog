function deleteUser(id){

    var user = new Object();
    user.id = id;

    $.post('/MyBlog/controller/delete_user.php', 
        {"user": JSON.stringify(user)},
        function(data){
            console.log('data: '+data);

            var obj = JSON.parse(data);

            console.log(obj);
            if(obj.Error){
                event.preventDefault();
                $('#lbl-alert').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>DB Error.</strong></div>').show();
                return;
            }

            $('#user' + user.id).hide('slow', function() {
                $('#user' + user.id).remove()
            })
            
    });
}
