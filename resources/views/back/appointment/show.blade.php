@extends('back.layouts.app', [
    'title' => 'Appointment detail'
])

@section('app')
<div class="dashboard-wrapper">
    <div class="container-fluid">
        @include('back.appointment.partials.sidebar')
        <div class="main-content container-fluid p-0">
            <div class="email-head">
                <div class="email-head-subject">
                    <div class="title"><a class="active" href="#"><span class="icon"><i class="fas fa-star"></i></span></a> <span>Development Files</span>
                        <div class="icons"><a href="#" class="icon"><i class="fas fa-reply"></i></a><a href="#" class="icon"><i class="fas fa-print"></i></a><a href="#" class="icon"><i class="fas fa-trash"></i></a></div>
                    </div>
                </div>
                <div class="email-head-sender">
                    <div class="date">August 23, 3:37</div>
                    <div class="avatar"><img src="{{ asset('back/images/avatar-2.jpg') }}" alt="Avatar" class="rounded-circle user-avatar-md"></div>
                    <div class="sender"><a href="#"><strong>{{$app->name}}</strong></a> to <a href="#">{{logged_in_user()->name}}</a>
                        <div class="actions"><a class="icon toggle-dropdown" href="#" data-toggle="dropdown"><i class="fas fa-caret-down"></i></a>
                            <div class="dropdown-menu" role="menu"><a class="dropdown-item" href="#">Mark as read</a><a class="dropdown-item" href="#">Mark as unread</a><a class="dropdown-item" href="#">Spam</a>
                                <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="email-body">
                {{$app->message}}
            </div>
        </div>
    </div>
</div>
@endsection