
@if(count($products) > 0)
        <table class="table search">

            @foreach($products as $product)
                <tr>
                    <td><img src="/public/image/{{$product->image}}" style="height: 170px; width: 150px";></td>

                    <td><a href="{{route('product.show', $product->id)}}">{{$product->title}}</a> </td>

                    <td>{{$product->flavor->name}}</td>

                    <td>{{$product->manufacturer->name}}</td>
                </tr>
            @endforeach
        </table>
    @else
        <h2>No Results Found</h2>
    @endif



