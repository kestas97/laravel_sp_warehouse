@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create new products') }}</div>

                    <div class="card-body">
                        <form class="form " method="post" action="{{route('product.store' )}}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="file" name="image" class="form-control" placeholder="product image">
                                <input type="text" name="title" class="form-control" placeholder="title">
                                <select name="manufacturer_id" class="form-control">
                                    <option>Manufacturer</option>
                                    @foreach($manufacturers as $manufacturer )
                                        <option value="{{$manufacturer->id}}">{{$manufacturer->name}}</option>
                                    @endforeach
                                </select>
                                <select name="category_id" class="form-control">
                                    <option>Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                <select name="flavor_id" class="form-control">
                                    <option>Flavor</option>
                                    @foreach($flavors as $flavor)
                                        <option value="{{$flavor->id}}">{{$flavor->name}}</option>
                                    @endforeach
                                </select>
                                <select name="location_id" class="form-control">
                                    <option>Position</option>
                                    @foreach($locations as $location)
                                        <option
                                            value="{{$location->id}}">{{$location->position . '-' . $location->rack . '-' . $location->queue}}</option>
                                    @endforeach
                                </select>
                                <input type="text" name="quantity" class="form-control" placeholder="Quantyti">
                                <input type="submit" value="Create" class="btn btn-primary">
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

