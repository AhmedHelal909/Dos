@extends('frontend.layouts.app')
@section('title',__('site.about'))

@section('content')
     @include('frontend.pages.about.sections.hero')
     @include('frontend.pages.about.sections.about')
     @include('frontend.pages.about.sections.features')
     @include('frontend.pages.about.sections.why-choose-us')
     @include('frontend.pages.about.sections.history')
@endsection