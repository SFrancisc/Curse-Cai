@extends('horses.layout')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="pull-left">
            <h2>Horses</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-danger" href="{{ route('races.index') }}"> Races</a>
            <a class="btn btn-danger" href="{{ route('winners.index') }}"> Winners</a>
            <a class="btn btn-info" href="{{ route('races.user') }}"> Users Page</a>
            <a class="btn btn-success" href="{{ route('horses.create') }}"> Create New Horse</a>
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
        <th width="280px">Action</th>
    </tr>
    @foreach ($horses as $horse)
    <tr>
        <td>{{ $horse->id }}</td>
        <td>{{ $horse->name }}</td>
        <td>{{ $horse->age }}</td>
        <td>{{ $horse->win_races }}</td>
        <td>{{ $horse->share }}</td>
        <td>
            <form action="{{ route('horses.destroy',$horse->id) }}" method="POST">
                <a class="btn btn-info" href="{{ route('horses.show',$horse->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('horses.edit',$horse->id) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach

</table>
{{ $horses->links() }}

@endsection
