@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card manufact">
                    <div class="card-header">{{ __('Manufacturer list') }}
                        <td><a  href="{{route('manufacturer.create')}}" id="add-btn manufac" class="btn btn-primary col-2 float-right">Add manufacturer</a></td>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Manufacturer</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($manufacturers as $manufacturer)
                                <tr>
                                    <td>{{$manufacturer->id}}</td>
                                    <td>{{$manufacturer->name}}</td>
                                    <td><a href="{{route('manufacturer.edit', $manufacturer->id)}}" class="btn btn-primary">edit</a></td>
                                    <form method="POST" action="{{route('manufacturer.delete', $manufacturer->id)}}">
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
                {{$manufacturers->links()}}
            </div>
        </div>
    </div>
@endsection
