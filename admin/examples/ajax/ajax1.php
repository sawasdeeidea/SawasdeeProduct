<html>
<head>
<title>ThaiCreate.Com jQuery Tutorials</title>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){

	$("#btn1").click(function(){

				$.ajax({
				   type: "POST",
				   url: "ajax11.php",
				   cache: false,
				   data: "name=John&location=Boston",
				   success: function(msg){
					 alert( "Data Call : " + msg);
					 $("p").append(msg);
				   }
				 });

        });
        $("#btn2").click(function(){

						var bodyContent = $.ajax({
							  url: "ajax1.php",
							  global: false,
							  type: "POST",
							  data: "name=John&location=Boston",
							  dataType: "html",
							  async:false,
							  success: function(msg){
								 alert(msg);
							  }
						   }
						).responseText;

						$("p").text(bodyContent);

		});
});

</script>
</head>
<body>
	<p></p>
	<input type="button" id="btn1" value="Call">
        
        <p></p>
	<input type="button" id="btn2" value="Call">
</body>
</html>