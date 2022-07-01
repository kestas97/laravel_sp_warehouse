@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit products location') }}</div>

                    <div class="card-body">
                        <form class="form " method="post" action="{{route('prod-location.update', $prodLocation->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <input value="{{$prodLocation->position}}" type="text" name="position"
                                       class="form-control" placeholder="position">
                                <input value="{{$prodLocation->rack}}" type="text" name="rack" class="form-control"
                                       placeholder="rack">
                                <input value="{{$prodLocation->queue}}" type="text" name="queue" class="form-control"
                                       placeholder="queue">

                                <input type="submit" value="Update" class="btn btn-primary">
                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li>{{$error}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if(session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session()->get('message') }}
                                    </div>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
