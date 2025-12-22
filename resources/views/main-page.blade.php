@extends('layouts.app')

@section('title', 'Main Page')

@section('content')
    <div class="w-full h-full text-[#E5E7EB] flex flex-row pr-[5em]">
        <div class="w-[50%] flex justify-center items-center overflow-visible">
            <x-orbital-hero />
        </div>
        <div class="w-[50%] flex justify-start items-center">
            <div class="absolute -top-32 -left-0 w-105 h-105 rounded-full bg-gradient-to-br from-purple-600 via-purple-800 t[#050816] blur-2xl opacity-70"></div>

            <div class="absolute top-1/2 -right-40 w-90 h-90 rounded-full bg-gradient-to-tr from-purple-500 via-indigo-700 to-[#050816] blur-2xl opacity-60"></div>
            
            <x-lead-form />
        </div>
    </div>
@endsection