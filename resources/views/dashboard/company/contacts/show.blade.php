@extends('dashboard.layouts.app')

@section('title', __('site.' . $module_name_plural))



@section('content')


    <div class="page-content-wrapper ">

        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card m-b-30">
                        <div class="card-body">

                            @include('dashboard.partials.global.nav-btn-show-page')

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#home" role="tab">
                                        <span class="d-none d-md-block">Home</span><span class="d-block d-md-none"><i
                                                class="mdi mdi-home-variant h5"></i></span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#profile" role="tab">
                                        <span class="d-none d-md-block">Profile</span><span class="d-block d-md-none"><i
                                                class="mdi mdi-account h5"></i></span>
                                    </a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">

                                <div class="tab-pane active p-3" id="home" role="tabpanel">
                                    @include('dashboard.company.' . $module_name_plural . '.partials.home')
                                </div>

                                <div class="tab-pane p-3" id="profile" role="tabpanel">
                                    @include('dashboard.company.' . $module_name_plural . '.partials.profile')
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
