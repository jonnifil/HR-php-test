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
                    {{ $product->price }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $products->links() }}
@endsection