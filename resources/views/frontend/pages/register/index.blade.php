@extends('frontend.layouts.app')
@section('title',__('site.Register'))

@section('content')
     @include('frontend.pages.register.sections.hero')
     @include('frontend.pages.register.sections.form')
   
@endsection