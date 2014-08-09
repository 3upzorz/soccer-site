@extends('layouts.master')

@section('container')

<div class="row">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-12">
				<h1>Game Report</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-12">
						<h3>Game Number</h3>
						<p class="report-p">12312346</p>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-6">
						<h3>Date (dd/mm/yyyy)</h3>
						<p class="report-p">23/07/2014</p>
					</div>
					<div class="col-xs-6">
						<h3>Time</h3>
						<p class="report-p">1:40 PM</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<h3>Field</h3>
						<p class="report-p">Riverside Field A</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<h3>Referee</h3>
						<p class="report-p">Donald McDonald - Center</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<h2>Score</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<table class="table">
							<thead>
								<tr>
									<th>Home</th>
									<th>Score</th>
									<th>Away</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>The Buccaneers</td>
									<td>4 : 1</td>
									<td>Grizzly Bears</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<!-- <div class="row">
					<div class="col-xs-6">
						<div class="row">
							<div class="col-md-12">
								<h3>Home:</h3>
							</div>
						</div>	
						<div class="row">
							<div class="col-xs-8">
								<p>The Buccaneers</p>
							</div>
							<div class="col-xs-4">
								<p>4</p>
							</div>
						</div>
					</div>
				</div> -->
				<div class="row">
					<div class="col-md-12">
						<h2>Comments</h2>
					</div>
					<div class="col-md-12">
						<p class="report-comments">Nulla vestibulum dictum nulla, interdum mattis leo malesuada nec. Aenean auctor lacus risus, a sodales sem cursus et. Proin eleifend et metus non pretium. Sed eleifend rhoncus urna, eu consequat tellus lacinia rhoncus.</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<h2>Issues</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<table class="table">
							<thead>
								<tr>
									<th>Type</th>
									<th>Description</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<ul class="flag-list">
											<li class="flag red"></li>
										</ul>
									</td>
									<td>Aenean auctor lacus risus, a sodales sem cursus et. Proin eleifend et metus non pretium.</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@stop