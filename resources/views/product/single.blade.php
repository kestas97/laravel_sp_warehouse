@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center" style="margin: 0 auto 0 auto">
            <div class="col-md-8">
                <div class="card show-product">
                    <td><a href="{{route('product.edit', $product->id)}}" id="edit-roduct" class="btn btn-primary  ">edit</a>
                    </td>

                    <div class="card-header">{{$product->title}}</div>
                    <td>
                        <img src="/public/image/{{$product->image}}" style="height: 350px; width: 400px">
                    </td>
                    <div class="card-body">
                        <div class="col-6">
                            <p>
                                Manufacturer: {{$product->manufacturer->name}}
                            </p>
                            <p>
                                Category: {{$product->category->name}}
                            </p>
                            <p>
                                Flavor: {{$product->flavor->name}}
                            </p>
                            <p>
                                Quantity: {{$product->quantity}}
                            </p>
                            <p>
                                Location: {{$product->location->position . '-' .$product->location->rack . '-' .$product->location->queue}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection


