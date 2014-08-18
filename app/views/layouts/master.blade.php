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
		<title>PCSA</title>
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
				<span class="navbar-brand">Brand</span>
			</div>
			<div id="game-report-navbar-collapse" class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li>{{HTML::link('/report/create', 'Create Report')}}</li>
					@if(Auth::user()->user_type_id <= 2)
						<li>{{HTML::link('/report/search', 'Search Reports')}}</li>
						<li>{{HTML::link('/user/add', 'Add User')}}</li>
					@endif
					<li>{{HTML::link('/logout', 'Logout')}}</li>
				</ul>
			</div>
		</div>
	</nav>

	@if(isset($plainContainer))
	<div id="content" class="container">
	@else
	<div id="content" class="container page-effect">
	@endif
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