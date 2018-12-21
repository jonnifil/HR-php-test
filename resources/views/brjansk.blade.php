@extends('layouts.app')

@section('title', 'Температура воздуха в Брянске')


@section('content')
    <h1 class="text-center">Температура воздуха в Брянске {{ $temp }}</h1>
@endsection