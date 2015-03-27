@extends('layout.master')

@section('title')
	{{ env('TITLE') }} - Report
@stop

@section('content')
	<h1>Reports</h1>
	<hr>
	<div class="panel panel-default">
		<div class="panel-heading">
			<form class="form-horizontal">
				<div class="form-group">
					<label class="col-md-1 control-label">Period</label>
					<div class="col-md-2">
					<?php
						$segments = Request::segments();
	    				$selectedPeriod = end($segments);
					?>
						<select class="form-control" id="month" name="month" autocomplete="off">
							@foreach ($periods as $period) 
							<option value="{{ $period->year . "-" . $period->month }}" {{ ($selectedPeriod == $period->year . "-" . $period->month) ? 'selected' : '' }}>{{ $period->year . " - " . $period->month }}</option>
							@endforeach
						</select>
				</div>
				<a id="generateReport" class="btn btn-success" href="{{ action('ReportController@show', $periods[0]->year . "-" . $periods[0]->month)}}">Generate Report</a>
			</form>
		</div>
	</div>
	<script type="text/javascript">
		$("#month").on("change",function(){
			var period = $(this).val();
			$("#generateReport").attr("href","{{ action('ReportController@index') }}/" + period);
		});
	</script>
	@yield('reportDetail')

@stop