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
				{{Form::open(array('report/create'))}}
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="game_number">Game Number</label>
								<input type="text" class="form-control" id="game_number">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="duty">Your Duty</label>
								<select class="form-control" id="duty">
									<option val="center">Center</option>
									<option val="assistant">Assistant</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<h2>Score</h2>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6 form-group">
							<label for="home_score">Home:</label>
							<input class="form-control" type="number" id="home_score">
						</div>
						<div class="col-xs-6 form-group">
							<label for="away_score">Away:</label>
							<input class="form-control" type="number" id="away_score">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<h2>Issues</h2>
						</div>
					</div>
					<div class="row">
						<div id="issue-container" class="col-md-12">
							<div class="row">
								<div class="col-xs-3 form-group">
									<label for="issue-list">Select</label>
									<select class="form-control" class="issue-list">
										<option val="def" selected disabled>Select an issue</option>
										<option value="1">Red Card</option>
										<option value="2">Yellow Card</option>
									</select>
								</div>
								<div class="col-xs-9 form-group last-issue">
									<label>Description</label>
									<input class="form-control" placeholder="your issue here..."></input>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<button id="add-issue-btn" class="btn btn-info">+</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@stop