<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600&display=swap"
        rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen">
<div class="min-h-screen bg-gray-900 flex items-center justify-center">

    <div class="w-4/5 h-[300px] bg-white rounded-2xl flex flex-col justify-between drop-shadow-xl">
        <h1 class="text-5xl p-10 font-normal font-semibold text-slate-700">{{ $model->title }}</h1>
        <div
            class="text-3xl font-bold text-white flex space-x-4 items-center mb-[30px] px-10 py-2 bg-gray-900">
                <div>{{ str($model->author_name)->upper()->toString() }}</div>
        </div>

    </div>
</div>
</body>
</html>

