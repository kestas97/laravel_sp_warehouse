@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card flavors">
                    <div class="card-header">{{ __('Flavors list') }}
                        <td><a href="{{route('flavor.create')}}" id="add-btn flavors"
                               class="btn btn-primary col-2 float-right">Add flavor</a></td>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Flavors</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($flavors as $flavor)
                                <tr>
                                    <td>{{$flavor->id}}</td>
                                    <td>{{$flavor->name}}</td>
                                    <td><a href="{{route('flavor.edit', $flavor->id)}}" class="btn btn-primary">edit</a>
                                    </td>
                                    <form method="POST" action="{{route('flavor.delete', $flavor->id)}}">
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
                </div>
                {{$flavors->links()}}
            </div>
        </div>
    </div>
@endsection
