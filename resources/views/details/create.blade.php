@extends('details.layout')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Detail for Race: {{ $race->location }} on {{ $race->date }}</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('races.details.index', $race->id) }}"> Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('races.details.store', $race->id) }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Horse:</strong>
                <input type="text" name="horse" class="form-control" placeholder="Horse Name" value="{{ old('horse') }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Share:</strong>
                <input type="number" name="share" class="form-control" placeholder="Share" value="{{ old('share') }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Winner:</strong>
                <input type="checkbox" name="winner" value="1" {{ old('winner') ? 'checked' : '' }}>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection
