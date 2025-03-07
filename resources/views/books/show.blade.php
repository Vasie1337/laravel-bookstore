<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $book->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex flex-col md:flex-row">
                        <div class="md:w-1/3 mb-6 md:mb-0 md:pr-6">
                            <div class="bg-gray-200 rounded-lg overflow-hidden h-64 flex items-center justify-center">
                                @if($book->image)
                                    <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}" class="object-cover h-full w-full">
                                @else
                                    <div class="text-gray-400 text-xl">No Image</div>
                                @endif
                            </div>
                            
                            <div class="mt-4 p-4 border rounded-lg">
                                <p class="text-2xl font-bold text-green-600 mb-2">${{ number_format($book->price, 2) }}</p>
                                <p class="text-sm mb-4">
                                    @if($book->stock > 0)
                                        <span class="text-green-600">In Stock ({{ $book->stock }} available)</span>
                                    @else
                                        <span class="text-red-600">Out of Stock</span>
                                    @endif
                                </p>
                                <p class="text-sm mb-2">ISBN: {{ $book->isbn }}</p>
                            </div>
                        </div>
                        
                        <div class="md:w-2/3">
                            <h1 class="text-2xl font-bold mb-2">{{ $book->title }}</h1>
                            <p class="text-lg text-gray-600 mb-4">By {{ $book->author }}</p>
                            
                            <div class="border-t pt-4 mb-8">
                                <h3 class="text-lg font-semibold mb-2">Description</h3>
                                <div class="prose max-w-none">
                                    {{ $book->description }}
                                </div>
                            </div>
                            
                            <div class="flex">
                                <a href="{{ route('books.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2">
                                    Back to Books
                                </a>
                                
                                @auth
                                    @if(auth()->user()->isAdmin())
                                        <a href="{{ route('books.edit', $book) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
                                            Edit Book
                                        </a>
                                        <form method="POST" action="{{ route('books.destroy', $book) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this book?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                                Delete Book
                                            </button>
                                        </form>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 