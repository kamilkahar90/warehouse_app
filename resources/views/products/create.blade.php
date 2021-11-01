<h1>Create Product Page</h1>

<form action="/products" method="post">
    @csrf
    <input type="text" name="name">
    <input type="text" name="quantity">
    <button class="btn" type="submit">Submit</button>
</form>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
