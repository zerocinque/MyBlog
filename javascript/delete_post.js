    
$('document').ready(function() {
    $('#lbl-alert').hide();
});


function deletePost(id){

    var post = new Object();
    post.id = id;

    $.post('/MyBlog/controller/delete_post.php', 
        {"post": JSON.stringify(post)},
        function(data){
            //console.log(data);
            var obj = JSON.parse(data);

            console.log(obj);
            if(obj.Error){
                event.preventDefault();
                $('#lbl-alert').append('DB Error').show();
                return;
            }

            $('#post' + post.id).hide('slow', function() {
                $('#post' + post.id).remove()
            })
            
    });
}
