@extends('layouts.app')

@section('title', 'Заказа')


@section('content')
    <h1 class="text-center">Заказ № {{ $order->id }}</h1>

    <div class="col-sm-7" style="margin-top: 40px">
        <div class="form-horizontal">
            <div class="form-group">
                <label class="col-sm-4 control-label">email клиента</label>
                <div class="col-sm-8">
                    <p class="form-control-static">
                        {{ $order->client_email }}
                    </p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">партнер</label>
                <div class="col-sm-8">
                    <p class="form-control-static">
                        {{ $order->partner->name }}
                    </p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">статус заказа</label>
                <div class="col-sm-8">
                    <p class="form-control-static">
                        {{ $order->statusName() }}
                    </p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">состав заказа</label>
                <div class="col-sm-8">
                    <p class="form-control-static">
                        @foreach($order->orderProduct as $orderProduct)
                            {{ $orderProduct->product->name }} - {{ $orderProduct->quantity }} <br>
                        @endforeach
                    </p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">стоимость заказа</label>
                <div class="col-sm-8">
                    <p class="form-control-static">
                        {{ $order->sumOrder() }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection