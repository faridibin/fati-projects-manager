@extends('layouts.auth')

@section('content')
<reset token="{{ $token }}" email="{{ $email }}"/>
@endsection
