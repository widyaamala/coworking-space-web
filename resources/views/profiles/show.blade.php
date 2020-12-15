@extends('layouts.app')

@section('template_title')
    {{ $user->name }}'s Profile
@endsection

@section('template_fastload_css')
    #map-canvas{
        min-height: 300px;
        height: 100%;
        width: 100%;
    }
@endsection

@php
    $currentUser = Auth::user()
@endphp

@section('content')
     <div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="@if ($user->profile->avatar_status == 1) {{ $user->profile->avatar }} @else {{ Gravatar::get($user->email) }} @endif" alt="{{ $user->name }}" class="user-avatar">
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        {{ trans('profile.showProfileTitle',['username' => $user->name]) }}
                                    </h5>
                                    <h6>
                                        {{ trans('profile.showProfileProfession') }}
                                    </h6>
									<p class="proile-rating">MEMBERSHIPS STATUS : <span></span></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Event</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
						
						@if ($user->profile)
                            @if ($currentUser->id == $user->id)
                                {!! HTML::icon_link(route('profile.edit', $currentUser->name), 'fa fa-fw fa-cog', trans('titles.editProfile'), array('class' => 'profile-edit-btn')) !!}
                            @endif
                        @else
                            <p>
                                {{ trans('profile.noProfileYet') }}
                            </p>
                            {!! HTML::icon_link(route('profile.edit', $currentUser->name), 'fa fa-fw fa-plus ', trans('titles.createProfile'), array('class' => 'profile-edit-btn')) !!}
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <p>Social Media</p>
							
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Username</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $user->name }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>First Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $user->first_name }}</p>
                                            </div>
                                        </div>
										@if ($user->last_name && ($currentUser->id == $user->id || $currentUser->hasRole('admin')))
										<div class="row">
                                            <div class="col-md-6">
                                                <label>Last Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $user->last_name }}</p>
                                            </div>
                                        </div>
										@endif
										
										@if ($user->email && ($currentUser->id == $user->id || $currentUser->hasRole('admin')))
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $user->email }}</p>
                                            </div>
                                        </div>
										@endif
										
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $user->profile->phone }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Profession</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $user->profile->profession }}</p>
                                            </div>
                                        </div>
										<div class="row">
                                            <div class="col-md-6">
                                                <label>Institute</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{ $user->profile->institute }}</p>
                                            </div>
                                        </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <p>Events Yang Diikuti</p>
                                        </div>
										<div class="row">
                                            <p><strong>Events Yang Diajukan</strong></p>
                                        </div>
                                        
                            </div>
                        </div>
                    </div>
                </div>
            </form>           
        </div>
@endsection

@section('footer_scripts')

    @if(config('settings.googleMapsAPIStatus'))
        @include('scripts.google-maps-geocode-and-map')
    @endif

@endsection
