@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                
                    
                    <div class="col-md-8" align="left">
                    
                        
    <a class="btn btn-primary" href="{{route('user.edit')}}/{{auth()->user()->id}}">Update Profile</a>


        <a class="btn btn-success" href="{{route('users.admin')}}">Users List</a>
                    </div>
                </div>
            
            </div>
        </div>
    </div>
</div>
@endsection
