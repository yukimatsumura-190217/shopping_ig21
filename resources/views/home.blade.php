@extends('layouts.app')

@section('content')

<div class="container">



    <div class="row">

        <Items></Items>
        <!-- @if (isset($items))
        @foreach ($items as $item)
        <div class="col-md-4 mb-2">

        <p>
        {{$item->name}}
        </p>
        <p class="row justify-content-center">
            <img src="{{ asset('images/now_printing.jpg') }}" alt="" width="200">
        </p>

        <p class="row justify-content-center">
        <a href="" class="btn btn-info">{{__('Add Cart')}}</a>
        </p> -->
    <!-- </div>
    @endforeach
    @endif -->

    </div>
</div>



<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
