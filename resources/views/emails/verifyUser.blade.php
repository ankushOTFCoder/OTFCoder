@extends('layouts.app')

@section('content')

	<h3>Hello {{$user['email']}} , Please click on the below link to verify your email account</h3>
	<br/>
	<a class="btn btn-primary" href="{{url('user/verify', $user->verifyUser->token)}}">Verify Email</a>


@endsection