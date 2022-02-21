@extends('layouts.app', ['page' => __('User Profile'), 'pageSlug' => 'users'])

@section('content')

<div class="content">
   <div class="row">
     <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Users</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('profile.create') }}" class="btn btn-sm btn-primary">Add user</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if($users)
                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Creation Date</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>
                                            <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                        </td>
                                        <td>{{ date('d/m/Y H:i:s', strtotime($user->created_at))}}</td>
                                        <td class="text-right">
                                        @if (auth()->user()->id == $user->id)
                                        <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" id="dropdown">
                                                    <a class="dropdown-item" href="/edit/profile/{{ $user->id }}">Edit</a>
                                                </div>
                                        </div>
                                        @endif
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
 