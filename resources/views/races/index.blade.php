@extends('races.layout')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="pull-left">
            <h2>Races</h2>
        </div>
        <div class="pull-right">

            <a class="btn btn-success" href="{{ route('races.create') }}"> Create New Race</a>
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
        <th>Distance</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($races as $race)
    <tr>
        <td>{{ $race->id }}</td>
        <td>{{ $race->location }}</td>
        <td>{{ $race->date }}</td>
        <td><a class="btn btn-info" href="{{ route('details.index') }}">HDetails</a></td>
        <td>{{ $race->distance }}</td>
        <td>
            <form action="{{ route('races.destroy',$race->id) }}" method="POST">
                <a class="btn btn-info" href="{{ route('races.show',$race->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('races.edit',$race->id) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach

</table>
{{ $races->links() }}

@endsection
