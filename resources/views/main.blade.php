@extends('layouts.app')

@section('content')

    <nav-bar></nav-bar>
    
    <main>
        <transition name="fade">
            <router-view></router-view>
        </transition>
    </main>

@endsection