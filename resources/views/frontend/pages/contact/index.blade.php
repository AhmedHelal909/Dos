@extends('frontend.layouts.app')
@section('title',__('site.contact us'))

@section('content')
     @include('frontend.pages.contact.sections.hero')
     @include('frontend.pages.contact.sections.contact')
@endsection