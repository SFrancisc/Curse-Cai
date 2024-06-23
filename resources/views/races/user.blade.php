@extends('races.layout')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="pull-left">
            <h2>Races</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-danger" href="{{ route('horses.user') }}"> Horses</a>
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
        <th>Location</th>
        <th>Date</th>
        <th>Details</th>
        <th>Distance/km</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($races as $race)
    <tr>
        <td>{{ $race->id }}</td>
        <td>{{ $race->location }}</td>
        <td>{{ $race->date }}</td>
        <td>
            <a class="btn btn-danger"href="{{ route('details.user', $race->id) }}">Details</a>
        </td>
        <td>{{ $race->distance }}</td>
        <td>
            <form>
                <a class="btn btn-info" href="{{ route('bets.index',$race->id) }}">Place Bet</a>
            </form>
        </td>
    </tr>
    @endforeach

</table>
{{ $races->links() }}

@endsection
