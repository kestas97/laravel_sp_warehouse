@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card category">
                    <div class="card-header">{{ __('Categories list') }}
                        <td><a href="{{route('category.create')}}" id="add-btn-category" class="btn btn-primary col-2 float-right">Add category</a></td>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Category</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td><a href="{{route('category.edit', $category->id)}}" class="btn btn-primary">edit</a></td>
                                    <form method="POST" action="{{route('category.delete', $category->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <td><input type="submit" value="Delete" class="btn btn-danger"></td>
                                    </form>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{$categories->links()}}
            </div>
        </div>
    </div>
@endsection
