@extends('details.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2>Details for Race: {{ $race->location }} on {{ $race->date }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-danger" href="{{ route('races.index') }}"> Back</a>
                <a class="btn btn-success" href="{{ route('races.details.create', $race->id) }}"> Create New Detail</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Horse</th>
                <th>Share</th>
                <th>Winner</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($details as $detail)
            <tr>
                <td>{{ $detail->id }}</td>
                <td>{{ $detail->horse }}</td>
                <td>{{ $detail->share }}</td>
                <td>{{ $detail->winner ? 'Yes' : 'No' }}</td>
                <td>
                    <form action="{{ route('races.details.destroy', ['race' => $race->id, 'detail' => $detail->id]) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('races.details.show', ['race' => $race->id, 'detail' => $detail->id]) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('races.details.edit', ['race' => $race->id, 'detail' => $detail->id]) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $details->links() }}
@endsection
