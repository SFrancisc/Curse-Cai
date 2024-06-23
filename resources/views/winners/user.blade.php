@extends('winners.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2>Winners</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-danger" href="{{ route('races.user') }}"> Races</a>
                <a class="btn btn-danger" href="{{ route('horses.user') }}"> Horses</a>
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
            <th>Amount</th>
            <th>Date</th>
        </tr>
        @foreach ($winners as $winner)
        <tr>
            <td>{{ $winner->id }}</td>
            <td>{{ $winner->name }}</td>
            <td>{{ $winner->amount }}</td>
            <td>{{ $winner->date }}</td>
        </tr>
        @endforeach

    </table>
    {{ $winners->links() }}


@endsection
