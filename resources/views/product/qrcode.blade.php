@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-5 text-center" >
            {!! $qrcode !!}
{{--            <a href="{{route('generate', $product->id)}}" download="{!! $qrcode !!}"></a>--}}
        </div>
    </div>

@endsection
