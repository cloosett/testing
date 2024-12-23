<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <title>Admin</title>
</head>
<body class="bg-gray-100 h-screen flex items-center justify-center">
<div class="bg-white rounded px-8 pt-6 pb-8 mb-4 max-w-md mx-auto">
    <h1 class="text-3xl font-bold mb-4">Admin</h1>
    <form method="POST" action="{{ route('updateVotes') }}">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="votesigor">Igor</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="number" name="votesigor" id="votesigor">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="votessidjey">Sidjey</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="number" name="votessidjey" id="votessidjey">
        </div>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Update votes</button>
    </form>

    <!-- Очищення голосів -->
    <form method="POST" action="{{ route('clearVotes') }}" class="mt-4">
        @csrf
        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Clear votes</button>
    </form>
</div>
</body>
</html>
