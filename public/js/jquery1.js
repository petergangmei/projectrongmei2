$(document).ready(function(){
 $('[data-toggle="popover"]').popover({
        placement : 'top',
        trigger:'hover'
    });

// black under line animation when focus in comment field
	$("#showme").click(function(){
       $(".c_textarea").css("border-bottom", "2px solid black");
	});
	$("#showme").keydown(function(){
         $(".c_textarea").css("border-bottom", "2px solid black");
	});
	$("#showme").focusout(function(){
       $(".c_textarea").css("border-bottom", "1px solid silver");
	});
// black under line animation when focus in comment field ends here

// show comment button logic
$("#showme").keyup(function(){
        // alert('test alert');
    var comment = $("#showme").val();
    var comment_length = comment.length;
         val_check();
  
    if(comment_length > 0){
      $('.csshide').show(); 
    }else{
      $('.csshide').hide();
    }
    
    // disabled or enable comment button accoring to value enter in commen field logic
    function val_check(){
      var comment = $('#showme').val();
      var pattern = /^[ ]*$/;

    if(pattern.test(comment)){
    $('#cBtn').prop('disabled', true);
    // alert('empty');

    }else{
    $('#cBtn').prop('disabled', false);
    // alert('not empty');
    }

    };

    });
// show comment button logic ends here


   

    //jquewry for comment post
    $('#cBtn').click(function(event) {
      var text = $('#showme').val();
      $.post('list', {'comment': text}, function(data) {
        console.log(data);
      });
    });

});




// Registration form script
$(document).ready(function(){
  // accout type switch
  // individual to community toggle
  $("#community").click(function(){
    $('.individual_rcontent').fadeOut(function(){
      $('.community_rcontent').fadeIn();
    });
  });

  // community to individual toggle
  $("#individual").click(function(){
    $('.community_rcontent').fadeOut(function(){
      $('.individual_rcontent').fadeIn();
    });
  });
});

// Registration form script ends here.
