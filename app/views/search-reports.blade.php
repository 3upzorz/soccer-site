@extends('layouts.master')

@section('container')
<div class="row">
	<div class="col-md-12">
		<div class="row search-controls">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-12">
						<h1>Game Reports</h1>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						{{Form::open(array(
							'url' => 'report/search',
							'id' => 'search-report-form'
						))}}
							<div class="row">
								<div class="col-xs-6 col-sm-3">
									<div class="form-group">
										<label for="search-game-number">Game Number</label>
										<input type="text" class="form-control" id="search-game-number" name="gameNumber">
									</div>
								</div>
								<div class="col-xs-6 col-sm-3">
									<div class="form-group">
										<label for="search-game-date">Date (dd/mm/yyyy)</label>
										<input type="text" class="form-control" id="search-game-date" name="gameDate">
									</div>
								</div>
								<div class="col-xs-6 col-sm-3">
									<div class="form-group">
										<label for="search-team">Team</label>
										<input id="search-team" class="form-control" type="text" placeholder="Team Name" name="teamName">
									</div>
								</div>
								<div class="col-xs-6 col-sm-3">
									<div class="form-group">
										<label for="search-ref">Referee</label>
										<input id="search-ref" class="form-control" type="text" placeholder="Referee Name" name="refName">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<button id="search-submit-btn" form="search-report-form" class="btn btn-default" type="submit">Search</button>
								</div>
							</div>
						{{Form::close()}}
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<table class="table table-striped">
					<thead>
						<tr>
							<th colspan="7">14 Results</th>
						</tr>
						<tr>
							<th><a href="#">Date</a></th>
							<th><a href="#">Time</a></th>
							<th><a href="#">Home</a></th>
							<th>Score</th>
							<th><a href="#">Away</a></th>
							<th>Issues</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>23/07/2014</td>
							<td>4:30 PM</td>
							<td>Buccaneers</td>
							<td>4 : 3</td>
							<td>Grizzly Bears</td>
							<td>
								<ul class="flag-list">
									<li class="flag red"></li>
									<li class="flag yellow"></li>
								</ul></td>
							<td><a href="#" class="btn btn-primary btn-xs">View</a></td>
						</tr>
						<tr>
							<td>23/07/2014</td>
							<td>4:30 PM</td>
							<td>Buccaneers</td>
							<td>4 : 3</td>
							<td>Grizzly Bears</td>
							<td>
								<ul class="flag-list">
									<li class="flag red"></li>
									<!-- <li class="flag yellow"></li> -->
								</ul></td>
							<td><a href="#" class="btn btn-primary btn-xs">View</a></td>
						</tr>
						<tr>
							<td>23/07/2014</td>
							<td>4:30 PM</td>
							<td>Buccaneers</td>
							<td>4 : 3</td>
							<td>Grizzly Bears</td>
							<td>
								<!-- <ul class="flag-list">
									<li class="flag red"></li>
									<li class="flag yellow"></li>
								</ul> --></td>
							<td><a href="#" class="btn btn-primary btn-xs">View</a></td>
						</tr>
						<tr>
							<td>23/07/2014</td>
							<td>4:30 PM</td>
							<td>Buccaneers</td>
							<td>4 : 3</td>
							<td>Grizzly Bears</td>
							<td>
								<ul class="flag-list">
									<!-- <li class="flag red"></li> -->
									<li class="flag yellow"></li>
								</ul></td>
							<td><a href="#" class="btn btn-primary btn-xs">View</a></td>
						</tr>
						<tr>
							<td>23/07/2014</td>
							<td>4:30 PM</td>
							<td>Buccaneers</td>
							<td>4 : 3</td>
							<td>Grizzly Bears</td>
							<td>
								<ul class="flag-list">
									<li class="flag red"></li>
									<li class="flag yellow"></li>
								</ul></td>
							<td><a href="#" class="btn btn-primary btn-xs">View</a></td>
						</tr>
						<tr>
							<td>23/07/2014</td>
							<td>4:30 PM</td>
							<td>Buccaneers</td>
							<td>4 : 3</td>
							<td>Grizzly Bears</td>
							<td>
								<ul class="flag-list">
									<li class="flag red"></li>
									<li class="flag yellow"></li>
								</ul></td>
							<td><a href="#" class="btn btn-primary btn-xs">View</a></td>
						</tr>
						<tr>
							<td>23/07/2014</td>
							<td>4:30 PM</td>
							<td>Buccaneers</td>
							<td>4 : 3</td>
							<td>Grizzly Bears</td>
							<td>
								<ul class="flag-list">
									<li class="flag red"></li>
									<li class="flag yellow"></li>
								</ul></td>
							<td><a href="#" class="btn btn-primary btn-xs">View</a></td>
						</tr>
						<tr>
							<td>23/07/2014</td>
							<td>4:30 PM</td>
							<td>Buccaneers</td>
							<td>4 : 3</td>
							<td>Grizzly Bears</td>
							<td>
								<ul class="flag-list">
									<li class="flag red"></li>
									<li class="flag yellow"></li>
								</ul></td>
							<td><a href="#" class="btn btn-primary btn-xs">View</a></td>
						</tr>
						<tr>
							<td>23/07/2014</td>
							<td>4:30 PM</td>
							<td>Buccaneers</td>
							<td>4 : 3</td>
							<td>Grizzly Bears</td>
							<td>
								<ul class="flag-list">
									<li class="flag red"></li>
									<li class="flag yellow"></li>
								</ul></td>
							<td><a href="#" class="btn btn-primary btn-xs">View</a></td>
						</tr>
						<tr>
							<td>23/07/2014</td>
							<td>4:30 PM</td>
							<td>Buccaneers</td>
							<td>4 : 3</td>
							<td>Grizzly Bears</td>
							<td>
								<ul class="flag-list">
									<li class="flag red"></li>
									<li class="flag yellow"></li>
								</ul></td>
							<td><a href="#" class="btn btn-primary btn-xs">View</a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@stop