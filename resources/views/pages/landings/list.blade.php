@extends('layouts.common')

@section('title', 'Landings')

@section('content')
    <div class="container">
        <h3 class="mt-3 mb-3">Your landing</h3>
        <div class="card">
            <div class="card-body">
                @if(!empty($landings) && $free_domains)
                    @foreach($landings as $landing)
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="{{ asset($landing['image']) }}" class="img-fluid">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $landing['title'] }}</h5>
                                        <a href="http://{{ $landing['domain'] }}/" class="btn btn-success" target="_blank">Your domain</a>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                @elseif(empty($landings) && $free_domains)
                    <p class="text-center">
                        You don't have a landing page yet
                    </p>
                    <p class="d-flex mb-0 justify-content-center"><a class="btn btn-success text-center ml-3" href="{{ route('landings.create') }}">Add</a></p>

                @else
                                <p class="text-center mb-0">
                                    Sorry. We have no free domains.
                                </p>
                @endif
            </div>
        </div>
    </div>
@endsection
