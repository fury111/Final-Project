@extends('layouts.master')

@section('title', $category ?? false ? $category->name . ' Products' : 'Shop All Products')

@section('content')
    <livewire:category-filter :category-id="$category->id ?? null" />
@endsection

@push('scripts')
    @livewireScripts
@endpush