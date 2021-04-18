@extends('templates.layouts.common')

@section('title',$landing->title)

@section('content')
    <div class="container" style="color: {{ $landing['font_color'] }}">
        <h5 class="mt-5">Template: premium</h5>
        <h1>Title: {{ $landing->title }}</h1>
        <img src="{{ asset($landing->image ) }}" alt="{{ $landing->title }}" class="img-fluid">
        <h2>Subtitle: {{ $landing->subtitle }}</h2>
        <p>Content: {!! $landing->content !!}</p>
    </div>
@endsection


