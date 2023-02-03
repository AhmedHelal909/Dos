@extends('frontend.layouts.app')
@section('title',__('site.login'))

@section('content')
     @include('frontend.pages.login.sections.hero')
     @include('frontend.pages.login.sections.form')
   
@endsection