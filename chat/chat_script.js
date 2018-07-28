$(document).ready(function(){
    //If user submits the form
  	$("#submitmsg").click(function(){
  		var clientmsg = $("#usermsg").val();
  		$.post("chat/chat_post.php", {text: clientmsg});
  		$("#usermsg").attr("value", "");
  		return false;
  	});

    //Load the file containing the chat log
	   function loadLog(){
		  var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height before the request
  		$.ajax({
  			url: "chat/log.html",
  			cache: false,
  			success: function(html){
  			     $("#chatbox").html(html); //Insert chat log into the #chatbox div
  				   //Auto-scroll
  			   	 var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height after the request
  				   if(newscrollHeight > oldscrollHeight){
  					        $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
  				   }
  		  	}
  		}); //Конец ajax запроса
    }//конец функции loadlog
    setInterval (loadLog, 2500);
  });//конец ready
