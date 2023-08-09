@extends('main')
@section('content')
    <div class="row my-2">
    <form action="{{ route('orders') }}" method="GET">
        <button type="submit" class="btn btn-primary">Заказы</button>
    </form>
    </div>
    @foreach($products as $product)
        <div class="col-sm-6">
    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-primary-emphasis">{{ $product['manufacturer'] }}</strong>
            <h3 class="mb-0">{{$product['name']}}</h3>
            <p class="card-text mb-auto">{{ $product['description'] }}</p>

        </div>

    </div>
        </div>
    @endforeach

@endsection
