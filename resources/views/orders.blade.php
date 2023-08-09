@extends('main')
@section('content')
    <div class="row my-2">
        <form action="{{ route('tovars') }}" method="GET">
            <button type="submit" class="btn btn-primary">Товары</button>
        </form>
    </div>

    @foreach($orders as $order)
        <div class="col-sm-4">
            <div class="col">
                <div class="card shadow-sm">

                    <div class="card-body">
                        <h3>{{$order['number']}}</h3>
                        <p class="card-text">
                            @isset($order['lastName'])
                            {{ $order['lastName'] }}
                            @endisset
                            @isset($order['firstName'])
                            {{ $order['firstName'] }}
                                @endisset
                            @isset($order['patronymic'])
                            {{ $order['patronymic'] }}</p>
                            @endisset
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-body-secondary">{{ $order['phone'] }}</small>
                            <small class="text-body-secondary">{{ $order['totalSumm'] }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="row my-2">
        <div class="col-sm-4">
            <div class="card">
                    <form action="{{ route('make_order') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Имя</label>
                            <input type="text" class="form-control" name="inputName" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Номер телефона</label>
                            <input type="text" class="form-control" name="inputPhone">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="email" class="form-control" name="inputEmail" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                        <select class="form-select" aria-label="Default select example" name="selectedProduct">
                            <option selected>Open this select menu</option>
                            @foreach($products as $product)
                                <option value="{{ $product['id'] }}">{{ $product['name'] }}</option>
                            @endforeach
                        </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Добавить заказ</button>
                    </form>
            </div>
        </div>
    </div>
@endsection
