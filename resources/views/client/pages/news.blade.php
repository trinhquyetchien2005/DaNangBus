@extends('client.layouts.app')

@section('title', 'Tin tức')

@section('sass')
    @vite('resources/sass/news.sass')
@endsection

@section('js')
    <script src="{{ asset('js/news.js') }}"></script>
@endsection

@section('content')
<div>
    <h1>Tin Mới Nhất</h1>
    <hr>
</div>
@endsection