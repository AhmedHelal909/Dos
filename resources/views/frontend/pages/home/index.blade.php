@extends('frontend.layouts.app')
@section('title',__('site.Home'))

@section('content')
     @include('frontend.pages.home.slider')
     @include('frontend.pages.home.howWork')
     @include('frontend.pages.home.mostPop')
     @include('frontend.pages.home.why-choose')
     @include('frontend.pages.home.FAQ')
@endsection