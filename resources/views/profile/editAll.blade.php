@extends('layouts.app', ['page' => __('User Profile'), 'pageSlug' => 'profile'])

@section('content')
    <style>
        .form-group input[type=file] 
        {
         opacity: 1;
         position: relative;      
        }
        textarea.form-control {                                          
        border: 1px solid #cad1d7;
        border-radius: 0.25rem;
        box-shadow: none;
        transition: all 0.2s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }
    </style>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Edit Profile') }}</h5>
                </div>
                <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" autocomplete="off">
                    <div class="card-body">
                            @csrf
                            @method('put')

                            @include('alerts.success')
                            <input type="hidden" name="id" id="id"  value="{{ $user->id }}">
                            <div class="form-group{{ $errors->has('foto') ? ' has-danger' : '' }}">
                                <label>{{ _('Foto') }}</label>
                                <input type="file" name="foto" class="form-control-file" id="foto" value="/img/user/{{ $user->image }}">
                                @include('alerts.feedback', ['field' => 'foto'])
                            </div>

                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label>{{ _('Name') }}</label>
                                <input type="text" name="name" value="{{ $user->name }}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ _('Name') }}" >
                                @include('alerts.feedback', ['field' => 'name'])
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                <label>{{ _('Email address') }}</label>
                                <input type="email" name="email" value="{{ $user->email }}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ _('Email address') }}">
                                @include('alerts.feedback', ['field' => 'email'])
                            </div>

                            <div class="form-group{{ $errors->has('job') ? ' has-danger' : '' }}">
                                <label>{{ _('Função') }}</label>
                                <input type="text" name="job" value="{{ $user->job }}" class="form-control{{ $errors->has('job') ? ' is-invalid' : '' }}" placeholder="{{ _('job address') }}" >
                                @include('alerts.feedback', ['field' => 'job'])
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                <label>{{ _('Descrição') }}</label>                                
                                <textarea name="description" id="description" class="form-control{{ $errors->has('description') ? 'is-invalid' : '' }}" cols="30" rows="10" placeholder="{{ _('description') }}"> {{ $user->description }}</textarea>
                                @include('alerts.feedback', ['field' => 'description'])
                            </div>
                            <div class="form-group{{ $errors->has('facebook') ? ' has-danger' : '' }}">
                                <label>{{ _('facebook') }}</label>
                                <input type="text" name="facebook" value="{{ $user->facebook }}" class="form-control{{ $errors->has('facebook') ? ' is-invalid' : '' }}" placeholder="{{ _('facebook address') }}"> 
                                @include('alerts.feedback', ['field' => 'facebook'])
                            </div>
                            <div class="form-group{{ $errors->has('twitter') ? ' has-danger' : '' }}">
                                <label>{{ _('twitter') }}</label>
                                <input type="text" name="twitter" value="{{ $user->twitter }}" class="form-control{{ $errors->has('twitter') ? ' is-invalid' : '' }}" placeholder="{{ _('twitter address') }}" >
                                @include('alerts.feedback', ['field' => 'twitter'])
                            </div>
                            <div class="form-group{{ $errors->has('gmail') ? ' has-danger' : '' }}">
                                <label>{{ _('gmail +') }}</label>
                                <input type="text" name="gmail" value="{{ $user->gmail }}" class="form-control{{ $errors->has('gmail') ? ' is-invalid' : '' }}" placeholder="{{ _('gmail address') }}" >
                                @include('alerts.feedback', ['field' => 'gmail'])
                            </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary">{{ _('Save') }}</button>
                    </div>
                </form>
            </div>

           
        </div>
        <div class="col-md-4">
            <div class="card card-user "> 
                <div class="card-body">Seu Perfil
                    <p class="card-text">
                        <div class="author">
                            <div class="block block-one"></div>
                            <div class="block block-two"></div>
                            <div class="block block-three"></div>
                            <div class="block block-four"></div>
                            <a href="#">
                                @if( !$user->image )
                                <img class="avatar" src="{{ asset('white') }}/img/default-avatar.png" alt="">
                                @else
                                <img class="avatar" src="/img/profile/{{ $user->image }}" alt="">
                                @endif
                                <h5 class="title">{{ $user->name }}</h5>
                            </a>
                            <p class="description">
                                {{ $user->job }}
                            </p>
                        </div>
                    </p>
                    <div class="card-description">
                        {{ $user->description }}
                    </div>
                </div>
                <div class="card-footer">
                    <div class="button-container">
                        <button class="btn btn-icon btn-round btn-facebook" onclick="window.open('{{ $user->facebook }}','_blank')">
                           <i class="fab fa-facebook"></i>
                        </button>
                        <button class="btn btn-icon btn-round btn-twitter" onclick="window.open('{{ $user->twitter }}','_blank')">
                            <i class="fab fa-twitter"></i>
                        </button>
                        <button class="btn btn-icon btn-round btn-google" onclick="window.open('{{ $user->gmail }}','_blank')">
                            <i class="fab fa-google-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

