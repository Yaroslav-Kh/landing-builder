@extends('templates.layouts.common')

@section('title',$landing['title'])
@section('description',$landing['content'])

@section('content')
    <div class="container">
        <h5 class="mt-5">Template: start</h5>
        <h1>Title: {{ $landing['title'] }}</h1>
        <img src="{{ asset($landing['image']) }}" alt="{{ $landing['title'] }}" class="img-fluid">
        <div style="color: {{ $landing['font_color'] }}">
            <h2>Subtitle: {{ $landing['subtitle'] }}</h2>
            <p>Content: {!! $landing['content'] !!}</p>
        </div>
    </div>
@endsection


