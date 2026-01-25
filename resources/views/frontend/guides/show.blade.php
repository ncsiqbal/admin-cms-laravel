@extends('layouts.app')

@section('title', $guide->title)
@section('description', Str::limit(strip_tags($guide->content), 150))

@section('content')
<div class="mx-auto max-w-3xl">

    <a href="{{ route('guides.index') }}"
       class="mb-6 inline-block text-sm text-blue-600 hover:underline">
        ← Kembali ke Guides
    </a>

    <h1 class="mb-4 text-3xl font-bold">
        {{ $guide->title }}
    </h1>

    <article class="prose max-w-none">
        {!! $guide->content !!}
    </article>

</div>

<article class="prose prose-lg max-w-none">
    {!! nl2br(e($guide->content)) !!}
</article>

@endsection
