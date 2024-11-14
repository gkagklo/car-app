@props(['title' => ''])

<x-base-layout :$title>
    <x-layouts.header />
        @session('success')
        <div class="container my-large">
            <div class="success-message"> {{ $value }} </div>
        </div>
        @endsession
        @session('error')
        <div class="container my-large">
            <div class="err-message"> {{ $value }} </div>
        </div>
        @endsession
    {{$slot}}
</x-base-layout>
