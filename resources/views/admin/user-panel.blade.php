@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card product-list">
                    <div class="card-header">{{ __('Users List') }}</div>

                    <div class="card-body">
                        <table class="table">

                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Action</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    @if($user->active != 1)
                                        <form method="POST" action="{{route('user.activate', $user->id)}}">
                                            @csrf
                                            <td><input type="submit" class="btn btn-success" value="activate"></td>
                                        </form>
                                    @else
                                        <form method="POST" action="{{route('user.deactivate', $user->id)}}">
                                            @csrf
                                            <td><input type="submit" class="btn btn-danger" value="inactive"></td>
                                        </form>
                                    @endif
                                    <form method="POST" action="{{route('destroy.user', $user->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <td><input type="submit" value="Delete" class="btn btn-danger"></td>
                                    </form>
                                </tr>
                            @endforeach

                            @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                            </tbody>
                        </table>
                    </div>
                    {{$users->links()}}
                </div>
            </div>
        </div>
@endsection
