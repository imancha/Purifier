<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>HTML Purifier</title>

    <!-- Bootstrap -->
    <link href="bootstrap-3.3.5/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
		<section class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-6">
						<div class="panel panel-success">
							<div class="panel-heading">
								<h3 class="panel-title">
									<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>&nbsp; Input
								</h3>
							</div>
							<div class="panel-body">
								<div class="form-group">
									<textarea class="form-control" name="text" placeholder="Enter Some Text . . ." rows="13" autocomplete="off" value=""></textarea>
								</div>
								<div class="row">
									<div class="col-md-5 col-sm-5 col-xs-12">
										<div class="checkbox">
											<label><input type="checkbox"> HTML Purifier</label>
										</div>
									</div>
									<div class="col-md-7 col-sm-7 col-xs-12">
										<div class="pull-right">
											<button class="btn btn-default" type="reset">Clear</button>
											<button class="btn btn-success" type="submit">Submit &nbsp; <span class="glyphicon glyphicon-random"></span></button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="panel panel-danger">
							<div class="panel-heading">
								<h3 class="panel-title">
									<span class="glyphicon glyphicon-blackboard" aria-hidden="true"></span>&nbsp; Output
								</h3>
							</div>
							<div class="panel-body">
								<div class="result"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="jquery-2.1.4/jquery-2.1.4.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap-3.3.5/js/bootstrap.min.js"></script>
    <script>
			(function(){
				$("body").css("margin","10px");
				$("button[type='reset']").on("click", function(e){
					e.preventDefault();
					$("textarea").val('');
					$(".result").empty();
					$("input[type='checkbox']").attr("checked",false);
				});
				$("button[type='submit']").on("click", function(e){
					e.preventDefault();
					$(".result").empty();
					$.ajax({
						url:'htmlpurifier-4.6.0-lite/imancha.php',
						type:'POST',
						data:{
							'clean':$("input[type='checkbox']").is(":checked"),
							'input':$("textarea[name='text']").val(),
						},
						success:function(data){
							$(".result").html(data);
						},
						error:function(){
							alert('An error has occured...');
						}
					});
				});
			})();
    </script>
  </body>
</html>
