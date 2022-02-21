@extends('layouts.app', ['page' => __('Products'), 'pageSlug' => 'products'])

@section('content')
   
    
     <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
     <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Edit Products') }}</h5>
                </div>
                <form method="post" action="{{ route('product.edit') }}" enctype="multipart/form-data" autocomplete="off">
                    <div class="card-body">
                            @csrf
                            @method('put')

                            @include('alerts.success')

                            <input type="hidden" name="id" id="id" value="{{ $product->id }}">
                            <div class="form-group{{ $errors->has('image') ? ' has-danger' : '' }}">
                                <label>{{ _('Image Clique aqui') }}</label>
                                <input type="file" name="image" class="form-control-file" id="image" value="{{ $product->image }}" >
                                @include('alerts.feedback', ['field' => 'image'])
                            </div>

                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label>{{ _('Name') }}</label>
                                <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ $product->name }}" placeholder="{{ _('Name') }}" >
                                @include('alerts.feedback', ['field' => 'name'])
                            </div>

                            <div class="form-group{{ $errors->has('Price') ? ' has-danger' : '' }}">
                                <label>{{ _('Price') }}</label>
                                <input type="number" name="price" step="0.01" min="0.00" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" value="{{ $product->price }}" placeholder="{{ _('Price') }}">
                                @include('alerts.feedback', ['field' => 'price'])
                            </div>                          

                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                <label>{{ _('Descrição') }}</label>                                
                                <textarea name="description" id="description" class="form-control{{ $errors->has('description') ? 'is-invalid' : '' }}" cols="30" rows="10" placeholder="{{ _('description') }}">{{ $product->description }}</textarea>
                                @include('alerts.feedback', ['field' => 'description'])
                            </div>

                            <div class="form-group">
                                <label for="name">Tags</label>
                                
                                <select class="js-example-basic-multiple form-control" name="tags[]" id="tags" multiple="multiple">
                                 
                                @foreach($tags as $key => $tag)                                                                               
                                        <option @if ($tag->TagSelected) {{ 'selected' }} @endif value="{{ $tag->id }}">{{ $tag->name }}</option>
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
                                @if(!$product->image )
                                <img class="avatar" src="{{ asset('white') }}/img/default-avatar.png" alt="">
                                @else
                                <img class="avatar" src="/img/product/{{ $product->image }}" alt="">
                                @endif
                                <h5 class="title">{{ $product->name }}</h5>
                            </a>
                            <p class="description">
                                {{ $product->description }}
                            </p>
                        </div>
                    </p>
                   
                </div>
               
            </div>
        </div>
    </div>

@endsection
