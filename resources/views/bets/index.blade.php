@extends('bets.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2>Bets</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-info" href="{{ route('races.user') }}"> Back </a>
                <a class="btn btn-success" href="{{ route('bets.create') }}"> Create New Bet</a>
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
            <th width="280px">Action</th>
        </tr>
        @foreach ($bets as $bet)
        <tr>
            <td>{{ $bet->id }}</td>
            <td>{{ $bet->name }}</td>
            <td>{{ $bet->amount }}</td>
            <td>
                <form action="{{ route('bets.destroy',$bet->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('bets.show',$bet->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('bets.edit',$bet->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach

    </table>
    {{ $bets->links() }}


@endsection
