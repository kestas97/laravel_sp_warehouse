@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create flavor') }}</div>

                    <div class="card-body">
                        <form class="form " method="post" action="{{route('flavor.store' )}}">
                            @csrf
                            <div class="form-group">
                                <input  type="text" name="name" class="form-control" placeholder="flavor">
                                <input type="submit" value="Create" class="btn btn-primary">
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

