@extends('layouts.app')



@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card location">
                    <div class="card-header">{{ __('Product location list') }}
                        <td><a href="{{route('prod-location.create')}}" id="add-btn-location"
                               class="btn btn-primary col-2 float-right">
                                Add location
                            </a>
                        </td>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Position</th>
                                <th scope="col">Rack</th>
                                <th scope="col">Queue</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($productLocations as $location)
                                <tr>
                                    <td>{{$location->id}}</td>
                                    <td>{{$location->position}}</td>
                                    <td>{{$location->rack}}</td>
                                    <td>{{$location->queue}}</td>
                                    <td><a href="{{route('prod-location.edit', $location->id)}}"
                                           class="btn btn-primary">edit</a></td>
                                    <form method="POST" action="{{route('prod-location.delete', $location->id)}}">
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
                    {{$productLocations->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection

