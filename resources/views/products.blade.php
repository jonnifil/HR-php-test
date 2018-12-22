@extends('layouts.app')

@section('title', 'Продукты')


@section('content')
    <h1 class="text-center">Продукты</h1>

    {{ $products->links() }}
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>
                ид продукта
            </th>
            <th>
                наименование продукта
            </th>
            <th>
                наименование поставщика
            </th>
            <th>
                цена
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)
            <tr>
                <td>
                    {{ $product->id }}
                </td>
                <td>
                    {{ $product->name }}
                </td>
                <td>
                    {{ $product->vendor->name }}
                </td>
                <td>
                    <div class="show_price_{{ $product->id }}">
                        <div id="price_{{ $product->id }}" class="col-md-7">
                            {{ $product->price }}
                        </div>
                        <div class="col-md-5">
                            <button class="btn btn-lg" onclick="$('.show_price_{{ $product->id }}').toggleClass('hide')"><span class="glyphicon glyphicon-pencil"></span> </button>
                        </div>
                    </div>
                    <div class="hide show_price_{{ $product->id }}">
                        <div class="col-md-5">
                            <input class="form-control" value="{{ $product->price }}" id="input_price_{{ $product->id }}">
                        </div>
                        <div class="col-md-7">
                            <button class="btn btn-lg" onclick="$('.show_price_{{ $product->id }}').toggleClass('hide')"><span>Отмена</span> </button>
                            <button class="btn btn-lg" onclick="savePrice({{ $product->id }})"><span>Сохранить</span> </button>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $products->links() }}
@endsection