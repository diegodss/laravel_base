@extends('layouts.app')
@yield('main-content')
@section('main-content')

@include('layouts.boxtop')

<?php
$show_view = true;
$readonly = "css class";
$action = "show";
?>
@include('region.form_open_edit')
@include('region.form')

@include('layouts.boxbottom')
@endsection