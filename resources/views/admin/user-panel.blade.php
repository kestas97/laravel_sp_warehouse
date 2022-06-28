@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    <div class="card-body">
                        <table class="table">

                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Active</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->role->name}}</td>
                                    @if($user->active != 1)
                                    <form method="POST" action="{{route('user.activate', $user->id)}}">
                                        @csrf
                                        <td><input type="submit" value="activate"></td>
                                    </form>
                                    @else
                                        <form method="POST" action="{{route('user.deactivate', $user->id)}}">
                                            @csrf
                                            <td><input type="submit" value="inactive"></td>
                                        </form>
                                    @endif
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
