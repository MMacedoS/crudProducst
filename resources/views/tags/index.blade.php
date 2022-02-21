@extends('layouts.app', ['page' => __('Tag'), 'pageSlug' => 'tags'])

@section('content')

<div class="content">
   <div class="row">
     <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Tags</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('tag.create') }}" class="btn btn-sm btn-primary">Add tag</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if ($tags)
                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <tr>
                                    <th scope="col">Name</th>                                   
                                    <th scope="col">Creation Date</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                    @foreach($tags as $tag)
                                    <tr>
                                        <td>{{ $tag->name }}</td>                                        
                                        <td>{{ date('d/m/Y H:i:s', strtotime($tag->created_at))}}</td>
                                        <td class="text-right">
                                     
                                        <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" id="dropdown">
                                                    <a class="dropdown-item" href="/edit/tag/{{ $tag->id }}">Edit</a>

                                                    <form action="/tag/{{ $tag->id }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item bg-warning" style="border-radius:5px;" href="/tag/{{ $tag->id }}">Delete</button>                        
                                                    </form> 
                                                </div>

                                                
                                        </div>

                                      
                                        </td>
                                    </tr>
                                    @endforeach
                             </tbody>
                    </table>
                  </div>
                  @endif
                    
                </div>
                
            
            </div>
            
        
        </div>
    </div> 
        
</div>

@endsection
 