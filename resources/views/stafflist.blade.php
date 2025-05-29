<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Staff List</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-900 text-white p-10">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Staff List</h1>
        {{-- Show Create User button only if admin --}}
        @if(isset($create_user_check) && $create_user_check == "admin")
            <button
                x-data
                @click="$dispatch('open-modal')"
                class="bg-pink-600 hover:bg-pink-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-pink-400"
            >
                Create User
            </button>
        @endif
    </div>

    @if(count($users) > 0)
        <table class="min-w-full bg-gray-800 rounded-lg overflow-hidden">
            <thead>
                <tr class="text-left text-gray-300">
                    <th class="py-2 px-4">Employee ID</th>
                    <th class="py-2 px-4">Name</th>
                    <th class="py-2 px-4">Email</th>
                    <th class="py-2 px-4">DOB</th>
                    <th class="py-2 px-4">DOJ</th>
                    <th class="py-2 px-4">Role</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr class="border-t border-gray-700 hover:bg-gray-700">
                        <td class="py-2 px-4">{{ $user->employee_id }}</td>
                        <td class="py-2 px-4">{{ $user->name }}</td>
                        <td class="py-2 px-4">{{ $user->email }}</td>
                        <td class="py-2 px-4">{{ $user->dob }}</td>
                        <td class="py-2 px-4">{{ $user->doj }}</td>
                        <td class="py-2 px-4">{{ $user->role }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No staff data found.</p>
    @endif

    <!-- Modal -->
    <div
        x-data="{ modalOpen: false }"
        @open-modal.window="modalOpen = true"
        x-show="modalOpen"
        style="display: none;"
        class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50"
    >
        <div
            @click.away="modalOpen = false"
            class="bg-gray-800 rounded-xl shadow-lg max-w-lg w-full p-8 relative"
            x-transition
        >
            <button
                @click="modalOpen = false"
                class="absolute top-3 right-3 text-gray-400 hover:text-white focus:outline-none"
                aria-label="Close modal"
            >
                &times;
            </button>

            <h2 class="text-2xl font-semibold mb-6 text-pink-400">Create New User</h2>

            <form action="{{ route('users.store') }}" method="POST" class="space-y-4" novalidate>
                @csrf

                <div>
                    <label for="employee_id" class="block mb-1 font-medium">Employee ID</label>
                    <input
                        type="text"
                        id="employee_id"
                        name="employee_id"
                        value="{{ old('employee_id') }}"
                        required
                        class="w-full rounded-md bg-gray-700 border border-gray-600 text-white px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500"
                    />
                    @error('employee_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="name" class="block mb-1 font-medium">Name</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        required
                        class="w-full rounded-md bg-gray-700 border border-gray-600 text-white px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500"
                    />
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block mb-1 font-medium">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        class="w-full rounded-md bg-gray-700 border border-gray-600 text-white px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500"
                    />
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="dob" class="block mb-1 font-medium">Date of Birth (DOB)</label>
                    <input
                        type="date"
                        id="dob"
                        name="dob"
                        value="{{ old('dob') }}"
                        required
                        class="w-full rounded-md bg-gray-700 border border-gray-600 text-white px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500"
                    />
                    @error('dob')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="doj" class="block mb-1 font-medium">Date of Joining (DOJ)</label>
                    <input
                        type="date"
                        id="doj"
                        name="doj"
                        value="{{ old('doj') }}"
                        required
                        class="w-full rounded-md bg-gray-700 border border-gray-600 text-white px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500"
                    />
                    @error('doj')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="role" class="block mb-1 font-medium">Role</label>
                    <select
                        id="role"
                        name="role"
                        required
                        class="w-full rounded-md bg-gray-700 border border-gray-600 text-white px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500"
                    >
                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="user" {{ old('role', 'user') == 'user' ? 'selected' : '' }}>User</option>
                    </select>
                    @error('role')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block mb-1 font-medium">Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        minlength="8"
                        required
                        class="w-full rounded-md bg-gray-700 border border-gray-600 text-white px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-500"
                    />
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="pt-4">
                    <button
                        type="submit"
                        class="w-full bg-pink-600 hover:bg-pink-700 text-white font-semibold py-2 rounded-lg transition-colors"
                    >
                        Create User
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
