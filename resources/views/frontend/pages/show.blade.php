@extends('layouts.app')

@section('title', $page->title)
@section('description', Str::limit(strip_tags($page->content), 150))

@section('content')
<div class="mx-auto max-w-3xl">

    <h1 class="mb-6 text-3xl font-bold">
        {{ $page->title }}
    </h1>

    <article class="prose max-w-none">
        {!! $page->content !!}
    </article>

</div>
@endsection
