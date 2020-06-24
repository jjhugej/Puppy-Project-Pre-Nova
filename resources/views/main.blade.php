@extends('layouts.app')

@section('content')

    <nav-bar></nav-bar>
    <main>
        <loading-icon v-if="$root.loading"></loading-icon>
        <router-view v-if="!$root.loading"></router-view>
    </main>

@endsection