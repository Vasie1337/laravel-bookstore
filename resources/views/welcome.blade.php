<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-3xl font-bold mb-6 text-center">Welcome to the Bookstore</h1>
                
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        @forelse($featuredBooks as $book)
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
                                    <a href="{{ route('books.show', $book) }}" class="block text-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        View Details
                                    </a>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-4 text-center py-8">
                                <p class="text-lg text-gray-600">No books available at the moment.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 