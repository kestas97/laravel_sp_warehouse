@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit manufacturer') }}</div>

                    <div class="card-body">
                        <form class="form " method="post" action="{{route('manufacturer.update', $manufacturer->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <input value="{{$manufacturer->name}}" type="text" name="name" class="form-control"
                                       placeholder="manufacturer">
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
