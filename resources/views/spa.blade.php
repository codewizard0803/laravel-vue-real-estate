@extends('layouts.app')

@section('content')
    <div id="vue-app">
        <app></app>
    </div>

@endsection

@section('scripts')
    <script>
        USER_API_TOKEN="{{ $userApiToken }}"
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
