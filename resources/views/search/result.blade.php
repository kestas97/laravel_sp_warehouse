@extends('layouts.app')

@section('content')
    @if(count($products) > 0)
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card search-result">
                    <div class="card-header">{{ __('Search results') }}</div>

                    <div class="card-body">
                        <table class="table">

                            <thead>
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Title</th>
                                <th scope="col">Flavor</th>
                                <th scope="col">Manufacturer</th>
                                <th scope="col">Category</th>
                                <th scope="col">Location</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">QR</th>
                                <th scope="col">Download-QR</th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($products as $product)
                                <tr>
                                    <td><img src="/public/image/{{$product->image}}" style="height: 200px; width: 200px">
                                    </td>
                                    <td><a href="{{route('product.show', $product->id)}}"> {{$product->title}}</a></td>
                                    <td>{{$product->flavor->name}}</td>
                                    <td>{{$product->manufacturer->name}}</td>
                                    <td>{{$product->category->name}}</td>
                                    <td>{{$product->location->position . '-' .$product->location->rack . '-' .$product->location->queue }}</td>
                                    <td>{{$product->quantity}}</td>
                                    <td><a href="{{route('generate', $product->id)}}"
                                           class="btn btn-primary">Generate</a></td>
                                    <td><a href="{{route('qrcode.download', $product->id)}}" class="btn btn-primary"
                                           download="svg">Download</a></td>
                                    <td><a href="{{route('product.edit', $product->id)}}" class="btn btn-primary">edit</a></td>
                                    <form method="POST" action="{{route('product.destroy', $product->id)}}">
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
                        @else
                            <div class="card">
                                <div class="card-body">
                                    <h2>Not Found Any Products</h2>
                                </div>
                            </div>
                        @endif
                    </div>
                    {{$products->links()}}
                </div>
            </div>
        </div>
    </div>

@endsection
