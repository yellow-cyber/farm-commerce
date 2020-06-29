@extends('layouts.app')

@section('content')
@can('is-admin', User::class)
<div>
    <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200 font-roboto">
        <div x-bind:class="sidebarOpen ? 'block' : 'hidden'" x-on:click="sidebarOpen = false" class="fixed z-20 inset-0 bg-black opacity-50 transition-opacity lg:hidden"></div>
       
        <x-admin-side-bar></x-admin-side-bar>
       
        <div class="flex-1 flex flex-col overflow-hidden">
           <x-admin-navbar></x-admin-navbar>
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                <div class="container mx-auto px-6 py-8">
                    <div class="mt-8">
                    </div>
                    <router-view></router-view>

                   
                </div>
            </main>
        </div>
    </div>
</div>  
@endcan
  



@endsection
