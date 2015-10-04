@extends('master')

@section('content')
<h1>Daily Intake page</h1>

<div class="wrapper">
    <div class="row">
        <div class="cell" style="margin: 9px 147px 0px 160px !important; float: right !important; font-size: 35px;">
            Intake for the day = ${{ $daily_intake }}    
        </div>
    </div>
</div>
@stop