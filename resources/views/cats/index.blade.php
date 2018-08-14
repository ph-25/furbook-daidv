@extends('layouts.master')

@section('header')
	@if(isset($breed))
		All cats of {{$breed->name}}
	@else
		All cats
	@endif
	<a class="btn btn-primary pull-right" href="{{route('cat.create')}}">Add new cat</a>
	<div class="clearfix"></div>
@endsection

@section('content')
	@include('partials.cat')
@endsection