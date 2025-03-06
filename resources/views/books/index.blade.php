<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Our Books') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @forelse($books as $book)
                            <div class="border rounded-lg overflow-hidden shadow-md">
                                <div class="h-48 bg-gray-200 flex items-center justify-center">
                                    @if($book->image)
                                        <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}" class="object-cover h-full w-full">
                                    @else
                                        <div class="text-gray-400 text-xl">No Image</div>
                                    @endif
                                </div>
                                <div class="p-4">
                                    <h3 class="text-lg font-bold mb-2">{{ $book->title }}</h3>
                                    <p class="text-sm text-gray-600 mb-2">By {{ $book->author }}</p>
                                    <p class="text-lg font-semibold text-green-600 mb-2">${{ number_format($book->price, 2) }}</p>
                                    <p class="text-sm mb-4">
                                        @if($book->stock > 0)
                                            <span class="text-green-600">In Stock ({{ $book->stock }})</span>
                                        @else
                                            <span class="text-red-600">Out of Stock</span>
                                        @endif
                                    </p>
                                    <a href="{{ route('books.show', $book) }}" class="block text-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        View Details
                                    </a>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-3 text-center py-8">
                                <p class="text-lg text-gray-600">No books available at the moment.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 