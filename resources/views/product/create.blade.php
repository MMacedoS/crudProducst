@extends('layouts.app', ['page' => __('Products'), 'pageSlug' => 'products'])

@section('content')

     <link rel="stylesheet" href="/css/taginput.css">
     <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
     <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>

  
    </style>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Create Products') }}</h5>
                </div>
                <form method="post" action="{{ route('product.add') }}" enctype="multipart/form-data" autocomplete="off">
                    <div class="card-body">
                            @csrf
                            @method('put')

                            @include('alerts.success')

                            <div class="form-group{{ $errors->has('image') ? ' has-danger' : '' }}">
                                <label>{{ _('Image') }}</label>
                                <input type="file" name="image" class="form-control-file" id="image" >
                                @include('alerts.feedback', ['field' => 'image'])
                            </div>

                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label>{{ _('Name') }}</label>
                                <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ _('Name') }}" >
                                @include('alerts.feedback', ['field' => 'name'])
                            </div>

                            <div class="form-group{{ $errors->has('Price') ? ' has-danger' : '' }}">
                                <label>{{ _('Price') }}</label>
                                <input type="number" name="price" step="0.01" min="0.00" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" placeholder="{{ _('Price') }}">
                                @include('alerts.feedback', ['field' => 'price'])
                            </div>                          

                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                <label>{{ _('Descrição') }}</label>                                
                                <textarea name="description" id="description" class="form-control{{ $errors->has('description') ? 'is-invalid' : '' }}" cols="30" rows="10" placeholder="{{ _('description') }}"></textarea>
                                @include('alerts.feedback', ['field' => 'description'])
                            </div>

                            <div class="form-group">
                                <label for="name">Tags</label>
                                <select class="js-example-basic-multiple form-control" name="tags[]" id="tags" multiple="multiple">
                                    @foreach($tags as $tag)
                                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @endforeach
                                </select>
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
                <div class="card-body">Product
                    <p class="card-text">
                        <div class="text-center">
                            <div class="block block-one"></div>
                            <div class="block block-two"></div>
                            <div class="block block-three"></div>
                            <div class="block block-four"></div>
                            <a href="#">
                                @if( !auth()->user()->image )
                                <img class="avatar" src="{{ asset('white') }}/img/default-avatar.png" alt="">
                                @else
                                <img class="avatar" src="/img/profile/{{ auth()->user()->image }}" alt="">
                                @endif
                                <h5 class="title">{{ auth()->user()->name }}</h5>
                            </a>
                            <p class="description">
                                {{ auth()->user()->job }}
                            </p>
                        </div>
                    </p>
                    <div class="card-description">
                        {{ auth()->user()->description }}
                    </div>
                </div>
                <div class="card-footer">
                    <div class="button-container">
                        <button class="btn btn-icon btn-round btn-facebook" onclick="window.open('{{ auth()->user()->facebook }}','_blank')">
                           <i class="fab fa-facebook"></i>
                        </button>
                        <button class="btn btn-icon btn-round btn-twitter" onclick="window.open('{{ auth()->user()->twitter }}','_blank')">
                            <i class="fab fa-twitter"></i>
                        </button>
                        <button class="btn btn-icon btn-round btn-google" onclick="window.open('{{ auth()->user()->gmail }}','_blank')">
                            <i class="fab fa-google-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
@endsection
