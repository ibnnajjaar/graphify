<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@0,100;0,200;0,300;0,400;0,500;1,100;1,200;1,300;1,400;1,500&family=Outfit:wght@100;200;300;400;500;600&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css'])
</head>
<body class="min-h-screen">
<div class="min-h-screen bg-gradient-to-r from-pink-500 via-red-500 to-yellow-500 flex items-center justify-center">

    <div class="w-4/5 h-[300px] bg-white rounded-2xl flex flex-col justify-between drop-shadow-xl">
        <h1 class="text-5xl p-10 font-normal font-semibold text-slate-700">{{ $post->title }}</h1>
        <div
            class="text-2xl font-bold text-slate-500 flex space-x-4 items-center mb-[30px] px-10 bg-gradient-to-r from-red-500 via-orange-500 to-red-500">
            <div class="px-2 py-3 flex items-center justify-center">
                <img class="h-[30px]" src="{{ asset('images/logo_new_white.svg') }}" alt="">
            </div>
            <div class=" flex font-normal space-x-4 text-white">
                <div>{{ $post->author?->name }}</div>
                <div>|</div>
                @php
                    $url = url('/');
                    $url = str($url)->replace("http://", '')->replace("https://", '')->upper()->toString();
                @endphp
                <div>{{ $url }}</div>
            </div>
        </div>

    </div>
</div>
</body>
</html>

