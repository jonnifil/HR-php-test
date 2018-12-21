@extends('layouts.app')

@section('title', 'Редактирование заказа')


@section('content')
    <h1 class="text-center">Редактирование заказа № {{ $order->id }}</h1>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="col-sm-7" style="margin-top: 40px">
        <form class="form-horizontal" role="form" action="{{ route('order_store') }}">
            <input type="hidden" name="id" value="{{ $order->id }}">
            <div class="form-group">
                <label for="inputEmail" class="col-sm-4 control-label">email клиента</label>
                <div class="col-sm-8">
                    <input type="email" name="client_email" class="form-control" id="inputEmail" placeholder="Email" value="{{ $order->client_email }}">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPartners" class="col-sm-4 control-label">партнер</label>
                <div class="col-sm-8">
                    <select name="partner_id" class="form-control" id="inputPartners">
                        @foreach($partners as $partner)
                            <option value="{{ $partner->id }}" @if($partner->id == $order->partner_id) selected @endif>{{ $partner->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputStatus" class="col-sm-4 control-label">статус заказа</label>
                <div class="col-sm-8">
                    <select name="status" class="form-control" id="inputStatus">
                        @foreach($statuses as $status)
                            <option value="{{ $status['id'] }}" @if($status['id'] == $order->status) selected @endif>{{ $status['name'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Сохранить</button>
                </div>
            </div>
        </form>
    </div>
@endsection
