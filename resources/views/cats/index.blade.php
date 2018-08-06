@extends('layouts.master')

@section('header')
	@if(isset($breed))
		All cats of {{$breed->name}}
	@else
		All cats
	@endif
@endsection

@section('content')
<table class="table table-border">
	<thead>
		<th>ID</th>
		<th>Name</th>
		<th>Birthday</th>
		<th>Breed name</th>
		<th colspan="2">Action</th>
	</thead>
	<tbody>
		@foreach ($cats as $cat)
		<tr>
			<td>{{$cat->id}}</td>
			<td>{{$cat->name}}</td>
			<td>{{$cat->date_of_birth}}</td>
			<td><a href="/cats/breeds/{{$cat->breed->name}}">{{$cat->breed->name}}</a></td>
			<td><a class="btn btn-warning" href="#">Edit</a></td>
			<td><a class="btn btn-danger" href="#">Delete</a></td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection