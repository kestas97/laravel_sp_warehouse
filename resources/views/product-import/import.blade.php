@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card bg-light mt-3">
            <div class="card-header">Import new products</div>

            <div class="card-body">
                <form action="{{ route('product.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file" class="form-control" placeholder="Add new CSV file">
                    <br>
                    <button class="btn btn-success">Import new product</button>
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
                </form>
            </div>
        </div>
    </div>
    @endif
@endsection
