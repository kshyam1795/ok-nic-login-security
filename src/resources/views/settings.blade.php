@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('settings.update') }}">
        @csrf
        <input type="text" name="site_name" value="{{ config('app.name') }}">
        <button type="submit">Save Settings</button>
    </form>
@endsection
