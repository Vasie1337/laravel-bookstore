<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Bookstore Statistics</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                        <div class="bg-blue-100 p-4 rounded-lg shadow">
                            <h4 class="font-bold">Total Users</h4>
                            <p class="text-2xl">{{ $userCount }}</p>
                        </div>
                        <div class="bg-green-100 p-4 rounded-lg shadow">
                            <h4 class="font-bold">Total Books</h4>
                            <p class="text-2xl">{{ $bookCount }}</p>
                        </div>
                        <div class="bg-yellow-100 p-4 rounded-lg shadow">
                            <h4 class="font-bold">Total Orders</h4>
                            <p class="text-2xl">{{ $orderCount ?? 0 }}</p>
                        </div>
                    </div>

                    <h3 class="text-lg font-semibold mb-4">Quick Actions</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <a href="{{ route('admin.users') }}" class="block p-4 bg-indigo-100 rounded-lg shadow hover:bg-indigo-200 transition">
                            <h4 class="font-bold">Manage Users</h4>
                            <p>View, edit, and manage user accounts</p>
                        </a>
                        <a href="{{ route('books.create') }}" class="block p-4 bg-pink-100 rounded-lg shadow hover:bg-pink-200 transition">
                            <h4 class="font-bold">Add New Book</h4>
                            <p>Add a new book to the catalog</p>
                        </a>
                        <a href="{{ route('admin.books') }}" class="block p-4 bg-purple-100 rounded-lg shadow hover:bg-purple-200 transition">
                            <h4 class="font-bold">Manage Books</h4>
                            <p>View, edit, and manage book catalog</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>