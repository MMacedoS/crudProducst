@extends('layouts.app', ['page' => __('Tags'), 'pageSlug' => 'tags'])

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
        #listaTag {
            list-style: none;
            display: flex;
            flex-wrap: wrap;
        }
        #listaTag span{
            margin:5px;
        }
    </style>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">@if (@$tag) {{ 'Edit Tag' }} @else {{ 'Create Tag' }} @endif</h5>
                </div>
                <form method="post" action="@if (@$tag) {{ route('tag.edit') }} @else {{ route('tag.add') }} @endif" enctype="multipart/form-data" autocomplete="off">
                    <div class="card-body">
                            @csrf
                            @method('put')

                            @include('alerts.success')                         

                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label>{{ _('Name') }}</label>
                                <input type="hidden" name="id" value="@if(@$tag) {{ $tag->id }} @else {{ '' }} @endif" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} " placeholder="{{ _('id') }}" >
                                <input type="text" name="name" value="@if(@$tag) {{ $tag->name }} @else {{ '' }} @endif" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ _('Name') }}" >
                                @include('alerts.feedback', ['field' => 'name'])
                            </div>                        
                          
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary">{{ _('Save') }}</button>
                    </div>
                </form>
            </div>

           
        </div>
        <div class="col-md-4">
            <div id="listaTag">
                @foreach($tags as $tag)
                    <span>{{ $tag->name }}</span>
                @endforeach
            </div>
        </div>
        
    </div>
@endsection
