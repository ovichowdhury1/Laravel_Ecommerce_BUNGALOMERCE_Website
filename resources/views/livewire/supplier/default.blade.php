@extends('apps.backend')
@section('title', 'CATAGORIES')
@section('css')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    @livewireStyles
@endsection
@section('main')
    <!-- row -->
    <div class="p-3">
        <div class="card">
            <div class="card-header text-uppercase text-center bg-primary d-inline">
                <h2 class="text-light">CATAGORIES</h2>
            </div>
            <div class="card-body">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                @livewire('suppliers')
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @livewireScripts
@endsection
