@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-8" >
            <strong>Users</strong>
        </div> 

    <div>
        <table class=" table table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>User Name</th>
                <th>Email-Id</th>
                <th>Moible</th>
            </tr>
                </thead>
            <tbody>
            @foreach($users as $user)    
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->firstname}} {{$user->lastname}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->phone}}</td>
                
            </tr>
                @endforeach
            </tbody>
        
            </table>
        </div>
      
</div>


@endsection