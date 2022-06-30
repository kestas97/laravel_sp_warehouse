@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header edit">{{ __('Edit information about product') }}</div>

                    <div class="card-body">
                        <form class="form " method="post" action="{{route('product.update', $product->id )}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                @if($product->image)
                                    <img src="{{url("public/image/".$product->image)}}" style="height: 350px; width: 400px">
                                @else
                                    <p>No image found</p>
                                @endif
                                <input  type="file" name="image" class="form-control" placeholder="product image">
                            </div>
                            <div class="form-group">

                                <input value="{{$product->title}}"  type="text" name="title" class="form-control" placeholder="title">
                                <select name="manufacturer_id" class="form-control">
                                    <option>Manufacturer</option>
                                    @foreach($manufacturers as $manufacturer )
                                        @if($manufacturer->id == $product->manufacturer_id)
                                        <option selected value="{{$manufacturer->id}}">{{$manufacturer->name}}</option>
                                        @else
                                            <option value="{{$manufacturer->id}}">{{$manufacturer->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <select name="category_id" class="form-control">
                                    <option>Category</option>
                                    @foreach($categories as $category)
                                        @if($category->id == $product->category_id)
                                        <option selected value="{{$category->id}}">{{$category->name}}</option>
                                        @else
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <select name="flavor_id" class="form-control">
                                    <option>Flavor</option>
                                    @foreach($flavors as $flavor)
                                        @if($flavor->id == $product->flavor_id)
                                            <option selected value="{{$flavor->id}}">{{$flavor->name}}</option>
                                        @else
                                        <option value="{{$flavor->id}}">{{$flavor->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <select name="location_id" class="form-control">
                                    <option>Position</option>
                                    @foreach($locations as $location)
                                        @if($location->id == $product->location_id)
                                        <option selected value="{{$location->id}}">{{$location->position . '-' . $location->rack . '-' . $location->queue}}</option>
                                        @else
                                            <option value="{{$location->id}}">{{$location->position . '-' . $location->rack . '-' . $location->queue}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <input value="{{$product->quantity}}"  type="text" name="quantity" class="form-control" placeholder="Quantyti">
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

