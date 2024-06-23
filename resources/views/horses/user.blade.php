@extends('horses.layout')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="pull-left">
            <h2>Horses</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-danger" href="{{ route('races.user') }}"> Races</a>
            <a class="btn btn-danger" href="{{ route('winners.user') }}"> Winners</a>
            <a class="btn btn-success" href="{{ route('races.index') }}"> Admin Page</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Age</th>
        <th>Win Races</th>
        <th>Share</th>
    </tr>
    @foreach ($horses as $horse)
    <tr>
        <td>{{ $horse->id }}</td>
        <td>{{ $horse->name }}</td>
        <td>{{ $horse->age }}</td>
        <td>{{ $horse->win_races }}</td>
        <td>{{ $horse->share }}</td>
    </tr>
    @endforeach

</table>
{{ $horses->links() }}

@endsection
