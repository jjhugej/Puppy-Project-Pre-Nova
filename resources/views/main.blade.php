@extends('layouts.app')

@section('content')

    <nav-bar></nav-bar>
    
    <main>
        <transition name="fade">
            <loading-icon v-if="loading"></loading-icon>
            <router-view v-if="!loading"></router-view>
        </transition>
    </main>

@endsection