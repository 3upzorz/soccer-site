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
								<label for="game-number">Game Number</label>
								<input type="text" class="form-control" id="game-number" name="gameNumber">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="duty">Your Duty</label>
								<select class="form-control" id="ref-type" name="refType">
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
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-12">
									<label for="home-name">Home:</label>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-8 form-group">
									<input class="form-control" type="text" id="home-name" name="homeName" placeholder="Home Team Name">
								</div>
								<div class="col-xs-4 form-group no-padding-left">
									<input class="form-control" type="number" id="home-score" name="homeScore" placeholder="Goals">
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-12">
									<label for="away-name">Away:</label>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-8 form-group">
									<input class="form-control" type="text" id="away-name" name="awayName" placeholder="Away Team Name">
								</div>
								<div class="col-xs-4 form-group no-padding-left">
									<input class="form-control" type="number" id="away-score" name="awayScore" placeholder="Goals">
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<h2>Comments</h2>
						</div>
						<div class="col-md-12">
							<textarea id="comments" name="comments" class="form-control" rows="3"></textarea>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<h2>Issues</h2>
						</div>
					</div>
					<div class="row">
						<div id="issue-container" class="col-md-12" data-issue-count="1">
							<div class="row issue-row">
								<div class="col-sm-3 col-xs-4 form-group no-padding-right">
									<label for="issue-list-1">Select</label>
									<select class="form-control issue-list" id="issue-list-1" name="issueList1">
										<option val="def" selected disabled>Select an issue</option>
										<option value="1">Red Card</option>
										<option value="2">Yellow Card</option>
									</select>
								</div>
								<div class="col-sm-9 col-xs-8 form-group">
									<label>Description</label>
									<input class="form-control" id="issue-description-1" name="issueDescription1" placeholder="your issue here..."></input>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<button id="add-issue-btn" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span></button>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<button id="create-report-submit-btn" class="btn btn-success" type="submit">Create Report</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@stop