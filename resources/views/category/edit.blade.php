@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit category') }}</div>

                    <div class="card-body">
                        <form class="form " method="post" action="{{route('category.update', $category->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <input value="{{$category->name}}" type="text" name="name" class="form-control" placeholder="category">
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
