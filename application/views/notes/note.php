<!DOCTYPE html>
	<html>
	<head>
		<title></title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<style type="text/css">
			.add, .note{
				margin: 0px 0px 0px 50px;
			}
			.note{
				display: inline-block;
				width: 90%;
				padding: 10px 0px 10px 50px;
				border-top: 2px solid #ccc;
			}
			.form-div, #notes{
				width: 50%;
				padding: 10px;
				margin-left: 230px;
			}
			.add{
				padding: 20px;
				border: 1px solid #ccc;
			}
			.add-title, .add-desc, .update-desc, .update-title{
				width: 70%;
			}
			.add-desc, .update-desc{
				height: 100px;
			}
			.delete, .update{
				display: inline-block;
			}
			.delete{
				vertical-align: top;
				margin-top: 20px;
				
			}
			#delete-btn{
				background: none;
   				border: none;
   				color: blue;
    			text-decoration: underline;
    			cursor: pointer;
			}
			.update-title{
				margin-bottom: 20px;
			}
			.update-btn, .update-title{
				visibility: hidden;
			}
			.main-div{
				padding: 10px;
				width: 80%;
				margin-left: 100px;
			}
		</style>
		<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {			
				$.get("notes/index_html", function(res){
					$("#notes").html(res);
				});

				$(document).on("click", ".update-desc", function() {
					var id = $(this).attr('id');
					$("#update-btn"+id).css("visibility","visible");
					$("#update-title"+id).css("visibility","visible");
				});

				//delete request 
				$(document).on("submit", "#delete", function() {
					$.post($(this).attr("action"), $(this).serialize(), function(res) {
						$("#notes").html(res);
					});
					return false;
				});
				//update request
				$(document).on("submit", "#update", function() {
					$.post($(this).attr("action"), $(this).serialize(), function(res) {
						$("#notes").html(res);
					});
					return false;
				});
				$("#add").submit(function() {
					$.post($(this).attr("action"), $(this).serialize(), function(res) {
						$("#notes").html(res);
					});
					return false;
				});
				
			});
		</script>
		
	</head>
	<body>
		<div class="main-div">
			<div class="form-div">
				<form action="notes/create" method="post" class="add" id="add">
					<p>
						<textarea name="desc" placeholder="Enter Description" class="add-desc"></textarea>	
					</p>
			    	<p>
			        	<input type="text" name="title" placeholder="Enter note title here" class="add-title">
			      	</p>
			      	<input type="submit" value="Add Note">
			    </form>
		    </div>
		    <div id="notes">
		    	
		    </div>
	   </div>
	</body>
</html>