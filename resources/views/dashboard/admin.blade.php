@extends('layout.layout')

@php
    $title='Dashboard';
    $subTitle = 'AI';
    $script= '<script src="' . asset('assets/js/homeOneChart.js') . '"></script>';
@endphp

@section('content')

<h1>This is admin dashboard.</h1>

@endsection
