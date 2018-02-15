$(document).ready(function () {
	$('#cBtn').click(function() {
		var user_img = $('#user_img').val();
		var post_id = $('#post_id').val();
		var comment = $('#showme').val();
		var token = $('input[name=_token ').val();
		$('#commentsection-div').hide();
		$('#loader').show();
		$.ajax({
            url: 'postcomment',
            type: 'post',
            data: {
                '_token': token,
                'comment': comment,
                'user_img': user_img,
                'post_id': post_id,
            },
        })
        .done(function(data) {
            $('#showme').val(' ');
            $('.csshide').hide();
            $('#loader').hide();
            $('#commentsection-div').show();
            $('#commentscount-div').load(location.href + ' #commentscount-div')
            $('#commentsdisplay-div').load(location.href + ' #commentsdisplay-div')

            console.log(data);
        })
        .fail(function() {
            console.log(user_id);
            console.log(user_img);
            console.log(comment);

        })
        .always(function() {
            console.log("complete");
        });
	});

	// Dele comment js
	

});

/* Act on the event */
		$(document).on('click', '.commentoptions', function() {
		var comment_id = $(this).find('#comment-id-df').val();
		$('.comment-id').val(comment_id);
		console.log(comment_id);
			/* Act on the event */
		});

$(document).on('click', '.delete-comment', function(event) {
		var ready_comment_id = $('.comment-id').val();
		var token = $('input[name=_token ').val();

		$.ajax({
            url: 'deleteComment',
            type: 'post',
            data: {
                '_token': token,
                'comment_id': ready_comment_id,
            },
        })
        .done(function(data) {
            $('#commentsdisplay-div').load(location.href + ' #commentsdisplay-div')
			$('#commentscount-div').load(location.href + ' #commentscount-div')
            console.log(data);
        })
        .fail(function() {
            console.log('error');

        })
        .always(function() {

            console.log("complete");
        });

	});		
		