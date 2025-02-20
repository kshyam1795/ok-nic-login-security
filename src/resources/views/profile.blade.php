@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        <input type="text" name="name" value="{{ auth()->user()->name }}">
        <input type="email" name="email" value="{{ auth()->user()->email }}">
        <button type="submit">Update Profile</button>
    </form>
@endsection
