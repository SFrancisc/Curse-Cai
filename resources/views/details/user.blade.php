@extends('details.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2>Details for Race: {{ $race->location }} on {{ $race->date }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-danger" href="{{ route('races.user') }}"> Back</a>
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
            <th>Horse</th>
            <th>Share</th>
            <th>Winnes</th>
        </tr>
        @foreach ($details as $detail)
        <tr>
            <td>{{ $detail->id }}</td>
            <td>{{ $detail->horse }}</td>
            <td>{{ $detail->share }}</td>
            <td>{{ $detail->winner }}</td>
        </tr>
        @endforeach

    </table>
    {{ $details->links() }}


@endsection
