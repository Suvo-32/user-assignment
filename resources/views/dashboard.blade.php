<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome Dashboard - Cloudrevel Innovation</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body {
            background: linear-gradient(135deg, #1f1c2c, #928DAB);
        }

        .glass {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(14px);
        }
    </style>
</head>

<body class="text-white min-h-screen flex flex-col items-center justify-center p-6 font-sans relative">

    {{-- Toast Notification --}}
    @if (session('status'))
    <div
        x-data="{ show: true }"
        x-init="setTimeout(() => show = false, 3000)"
        x-show="show"
        x-transition
        class="fixed top-4 right-4 bg-green-600 text-white px-6 py-3 rounded-xl shadow-lg z-50">
        {{ session('status') }}
    </div>
    @endif

    <div class="glass max-w-3xl w-full rounded-3xl p-10 shadow-2xl border border-gray-600 mt-10">
        <h1 class="text-4xl font-extrabold text-center text-pink-300 drop-shadow-md mb-6 animate-pulse">
            Welcome, Cloudrevel Innovation!
        </h1>

        <p class="text-base sm:text-lg text-gray-200 leading-relaxed">
            <span class="text-purple-200 font-semibold">📝 Task Overview:</span><br><br>

            <span class="font-semibold text-blue-200">Role:</span> Backend Developer<br>
            <span class="font-semibold text-blue-200">Framework:</span> Laravel 11<br><br>

            <span class="text-yellow-200 font-semibold">👑 Admin Capabilities:</span>
        <ul class="list-disc list-inside ml-4">
            <li>Create, Read, Update, Delete Employee</li>
        </ul>

        <span class="text-pink-200 font-semibold mt-4 block">👤 User Capabilities:</span>
        <ul class="list-disc list-inside ml-4">
            <li>View employee list only</li>
        </ul><br>

        <span class="text-teal-200 font-semibold">📄 Employee Form Fields:</span>
        <ul class="list-disc list-inside ml-4">
            <li>Employee ID</li>
            <li>Name</li>
            <li>Email</li>
            <li>Date of Birth (DOB)</li>
            <li>Date of Joining (DOJ)</li>
        </ul><br>

        🕓 Please submit your task by <span class="text-yellow-300 font-bold">Tomorrow EOD</span>.<br><br>

        <div class="text-right text-sm text-gray-400 mt-6">
            — Thanks & Regards,<br>
            <span class="italic">Hiring Team, Cloudrevel Innovation</span>
        </div>
        </p>

        <div class="mt-8 text-center text-sm text-gray-300">
            Crafted with ☕ & 💖 by -> linkedIn
            <a href="https://www.linkedin.com/in/suvo-halder-36a7661b1/" target="_blank" class="text-pink-300 font-bold hover:underline">
                Suvo Halder
            </a>
        </div>


        {{-- Continue Button --}}
        <div class="mt-10 text-center">
            <a href="{{ route('users.index') }}" class="inline-block px-6 py-3 rounded-xl bg-gradient-to-r from-pink-500 to-purple-600 text-white font-semibold shadow-md hover:scale-105 transform transition duration-300">
                🚀 Continue to Staff List
            </a>
        </div>
    </div>

</body>

</html>