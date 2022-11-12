@extends('layouts.home')
@section('title', 'Browse')
@section('content')


@livewire('browse-add-cart')

                    
@endsection
@section('footer-script')
    <script src="{{ asset('assets_home/js/browse.js') }}"></script>
@endsection
