<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-3xl font-bold mb-6 text-center">Welcome to the Bookstore</h1>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                        <div class="bg-blue-100 p-4 rounded-lg text-center">
                            <h2 class="text-xl font-semibold mb-2">Explore Books</h2>
                            <p class="mb-4">Discover our wide selection of books in various genres.</p>
                            <a href="{{ route('books.index') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Browse Books
                            </a>
                        </div>
                        
                        <div class="bg-green-100 p-4 rounded-lg text-center">
                            <h2 class="text-xl font-semibold mb-2">Easy Shopping</h2>
                            <p class="mb-4">Create an account to enjoy a seamless shopping experience.</p>
                            @guest
                                <a href="{{ route('register') }}" class="inline-block bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                    Register Now
                                </a>
                            @else
                                <a href="{{ route('dashboard') }}" class="inline-block bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                    Dashboard
                                </a>
                            @endguest
                        </div>
                        
                        <div class="bg-purple-100 p-4 rounded-lg text-center">
                            <h2 class="text-xl font-semibold mb-2">Member Benefits</h2>
                            <p class="mb-4">Enjoy exclusive deals and promotions with a membership.</p>
                            <a href="{{ route('books.index') }}" class="inline-block bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">
                                View Offers
                            </a>
                        </div>
                    </div>
                    
                    <h2 class="text-2xl font-bold mb-4">Featured Books</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        @php
                            $featuredBooks = App\Models\Book::inRandomOrder()->take(4)->get();
                        @endphp
                        
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