function sendMessage() {

	$('#form-container').hide('slow', function() {
        $('#form-container').remove()
    })

    $('#container').append('<div class="col col-md-6 col-md-offset-3"><div class="alert alert-success"><strong>The message has been send</strong></div><a href="./" class="btn btn-lg btn-block btn-link">Back to Home</a></div>')
}