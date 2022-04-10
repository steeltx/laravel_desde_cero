<div class="card">
    <img src="{{asset($product->images->first()->path)}}" class="card-img-top" height="500">
    <div class="card-body">
        <h4 class="text-right"><strong>${{$product->price}}</strong></h4>
        <h5 class="card-title">{{$product->title}}</h5>
        <p class="card-text">{{$product->descriion}}</p>
        <p class="card-text"><strong>{{$product->stock}} left</strong></p>
        <form
            class="d-inline"
            method="POST"
            action="{{route('products.carts.store',['product' => $product->id])}}">

            @csrf
            <button type="submit" class="btn btn-success">Add to Cart</button>

        </form>
    </div>
</div>
