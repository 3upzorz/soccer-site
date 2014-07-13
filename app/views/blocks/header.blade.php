<!doctype html>
<html lang="en"><!-- Closing tag in footer -->
<head>
	<meta charset="UTF-8">
	{{HTML::style('css/bootstrap-theme.min.css')}}
	{{HTML::style('css/bootstrap.min.css')}}
	@if(isset($title))
		<title>{{$title}}</title>
	@else
		<title>PoCo Soccer Association</title>
	@endif
</head>
<body><!-- Closing tag in footer -->
	<nav class="navbar navbar-default" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#game-report-navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
				<a href="#" class="navbar-brand">Brand</a>
			</div>
			<div id="game-report-navbar-collapse" class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li class="class"><a href="#">Home</a></li>
					<li class="class"><a href="#">Reports</a></li>
					<li class="class"><a href="#">Something</a></li>
				</ul>
			</div>
		</div>
	</nav>
