<h1>Update Product Page</h1>

<form action="/products/{{$product->id}}" method="post">
    @csrf
    @method('put')
    <input type="text" name="name" value="{{$product->name}}">
    <input type="text" name="quantity" value="{{$product->quantity}}">
    <button class="btn" type="submit">Submit</button>
</form>

@foreach ($product->product_model as $model)
    {{ $model->model_name }}
@endforeach