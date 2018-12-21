@extends('layouts.app')

@section('title', 'Заказы')


@section('content')
    <h1 class="text-center">Заказы</h1>

    <ul class="nav nav-tabs">
        <li class="active"><a href="#overdue" data-toggle="tab">Просроченные</a></li>
        <li><a href="#current" data-toggle="tab">Текущие</a></li>
        <li><a href="#new" data-toggle="tab">Новые</a></li>
        <li><a href="#complete" data-toggle="tab">Выполненные</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="overdue">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>
                        ид заказа
                    </th>
                    <th>
                        название партнера
                    </th>
                    <th>
                        стоимость заказа
                    </th>
                    <th>
                        наименование состав заказа
                    </th>
                    <th>
                        статус заказа
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach ($overdueOrders as $order)
                    <tr>
                        <td>
                            <a href="{{ route('edit_order', ['id' => $order->id]) }}">{{ $order->id }}</a>
                        </td>
                        <td>
                            {{ $order->partner->name }}
                        </td>
                        <td>
                            {{ $order->sumOrder() }}
                        </td>
                        <td>
                            @foreach($order->orderProduct as $orderProduct)
                                {{ $orderProduct->product->name }} - {{ $orderProduct->quantity }} <br>
                            @endforeach
                        </td>
                        <td>
                            {{ $order->statusName() }} - {{ $order->delivery_dt }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="tab-pane" id="current">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>
                        ид заказа
                    </th>
                    <th>
                        название партнера
                    </th>
                    <th>
                        стоимость заказа
                    </th>
                    <th>
                        наименование состав заказа
                    </th>
                    <th>
                        статус заказа
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach ($currentOrders as $order)
                    <tr>
                        <td>
                            <a href="{{ route('edit_order', ['id' => $order->id]) }}">{{ $order->id }}</a>
                        </td>
                        <td>
                            {{ $order->partner->name }}
                        </td>
                        <td>
                            {{ $order->sumOrder() }}
                        </td>
                        <td>
                            @foreach($order->orderProduct as $orderProduct)
                                {{ $orderProduct->product->name }} - {{ $orderProduct->quantity }} <br>
                            @endforeach
                        </td>
                        <td>
                            {{ $order->statusName() }} - {{ $order->delivery_dt }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="tab-pane" id="new">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>
                        ид заказа
                    </th>
                    <th>
                        название партнера
                    </th>
                    <th>
                        стоимость заказа
                    </th>
                    <th>
                        наименование состав заказа
                    </th>
                    <th>
                        статус заказа
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach ($newOrders as $order)
                    <tr>
                        <td>
                            <a href="{{ route('edit_order', ['id' => $order->id]) }}">{{ $order->id }}</a>
                        </td>
                        <td>
                            {{ $order->partner->name }}
                        </td>
                        <td>
                            {{ $order->sumOrder() }}
                        </td>
                        <td>
                            @foreach($order->orderProduct as $orderProduct)
                                {{ $orderProduct->product->name }} - {{ $orderProduct->quantity }} <br>
                            @endforeach
                        </td>
                        <td>
                            {{ $order->statusName() }} - {{ $order->delivery_dt }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="tab-pane" id="complete">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>
                        ид заказа
                    </th>
                    <th>
                        название партнера
                    </th>
                    <th>
                        стоимость заказа
                    </th>
                    <th>
                        наименование состав заказа
                    </th>
                    <th>
                        статус заказа
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach ($completeOrders as $order)
                    <tr>
                        <td>
                            <a href="{{ route('edit_order', ['id' => $order->id]) }}">{{ $order->id }}</a>
                        </td>
                        <td>
                            {{ $order->partner->name }}
                        </td>
                        <td>
                            {{ $order->sumOrder() }}
                        </td>
                        <td>
                            @foreach($order->orderProduct as $orderProduct)
                                {{ $orderProduct->product->name }} - {{ $orderProduct->quantity }} <br>
                            @endforeach
                        </td>
                        <td>
                            {{ $order->statusName() }} - {{ $order->delivery_dt }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection