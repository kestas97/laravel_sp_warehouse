@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create products location') }}</div>

                    <div class="card-body">
                        <form class="form " method="post" action="{{route('prod-location.store' )}}">
                            @csrf
                            <div class="form-group">
                                <input  type="text" name="position" class="form-control" placeholder="position">
                                <input  type="text" name="rack" class="form-control" placeholder="rack">
                                <input  type="text" name="queue" class="form-control" placeholder="queue">
                                <input type="submit" value="Create" class="btn btn-primary">
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
