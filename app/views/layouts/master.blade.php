<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	{{HTML::style('css/bootstrap-theme.min.css')}}
	{{HTML::style('css/bootstrap.min.css')}}
	{{HTML::style('css/datepicker.css')}}
	{{HTML::style('css/bootstrap-timepicker.min.css')}}
	{{HTML::style('css/containers.css')}}
	{{HTML::style('css/components.css')}}
	{{HTML::style('css/skins.css')}}
	@if(isset($title))
		<title>{{$title}}</title>
	@else
		<title>Port Coquitlam Soccer Association</title>
	@endif
</head>
<body>
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
					<li class="class">{{HTML::link('/', 'Home')}}</li>
					<li class="class">{{HTML::link('/report/create', 'Create')}}</li>
					<li class="class">{{HTML::link('/report/search', 'Search')}}</li>
				</ul>
			</div>
		</div>
	</nav>

	<div id="content" class="container">
	@section('container')

	@show
	</div>

	{{HTML::script('js/jquery-1.11.1.min.js')}}
	{{HTML::script('js/bootstrap.min.js')}}
	{{HTML::script('js/bootstrap-datepicker.js')}}
	{{HTML::script('js/bootstrap-timepicker.js')}}
	{{HTML::script('js/jquery.validate.js')}}
	{{HTML::script('js/soccer-site.js')}}
</body>
</html>