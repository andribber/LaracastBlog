<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto bg-gray-300 border-gray-500 p-6 rounded-xl">

            <h1 class="text-center font-bold text-xl">Register!</h1>

            <form method="POST" action="/admin/users/{{$user->id}}">

                @csrf
                @method('PATCH')
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">Name</label>
                        <input class="border border-gray-400 p-2 w-full"
                        type="text"
                        name="name"
                        id="name"
                        value="{{$user->name}}"
                        required>
                    @error('name')
                    <p class="text-red-500 text-xs mt-q">{{$message}}</p>
                    @enderror
                </div>


                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="username">Username</label>
                        <input class="border border-gray-400 p-2 w-full"
                        type="text"
                        name="username"
                        id="username"
                        value="{{$user->username}}"
                        required>
                    @error('username')
                    <p class="text-red-500 text-xs mt-q">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">Email</label>
                        <input class="border border-gray-400 p-2 w-full"
                        type="text"
                        name="email"
                        id="email"
                        value="{{$user->email}}"
                        required>
                    @error('email')
                    <p class="text-red-500 text-xs mt-q">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password">Password</label>
                        <input class="border border-gray-400 p-2 w-full"
                        type="password"
                        name="password"
                        id="password"
                        required>
                    @error('password')
                    <p class="text-red-500 text-xs mt-q">{{$message}}</p>
                    @enderror
                </div>
                <select name="is_admin" id="is_admin">
                        <option value="1">This user is admin</option>
                        <option value="0">This user is not admin</option>
                </select>
                <div class="mb-6">
                    <button type="submit" class="bg-gray-500 text-black rounded py-2 px-4 hover:bg-gray-700">
                        Edit User
                    </button>
                </div>
                @if ($errors->any())
                   <ul>@foreach($errors->all() as $error)
                            <li class="text-red-500 text-xs">{{$error}}</li>
                        @endforeach
                   </ul>
                @endif

            </form>
        </main>
    </section>
</x-layout>
