@extends('winners.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2>Winners</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-danger" href="{{ route('races.index') }}"> Races</a>
                <a class="btn btn-danger" href="{{ route('horses.index') }}"> Horses</a>
                <a class="btn btn-info" href="{{ route('races.user') }}"> Users Page</a>
                <a class="btn btn-success" href="{{ route('winners.create') }}"> Create New Winner</a>
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
            <th>Amount</th>
            <th>Date</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($winners as $winner)
        <tr>
            <td>{{ $winner->id }}</td>
            <td>{{ $winner->name }}</td>
            <td>{{ $winner->amount }}</td>
            <td>{{ $winner->date }}</td>
            <td>
                <form action="{{ route('winners.destroy',$winner->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('winners.show',$winner->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('winners.edit',$winner->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach

    </table>
    {{ $winners->links() }}


@endsection
