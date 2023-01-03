<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.books.index') }}">Go back</a>
            </div>
        </div>
        <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
            <form method="POST" action="{{route('admin.books.update', $book->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="sm:col-span-6">
                    <label for="title" class="block text-sm font-medium text-gray-700"> Title </label>
                    <div class="mt-1">
                        <input type="text" id="title" name="title" value="{{$book->title}}"
                               class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5"/>
                    </div>
                    @error('title')
                    <div class="text-sm text-red-400">{{ $message }}</div>
                    @enderror
                    <label for="isbn" class="block text-sm font-medium text-gray-700"> ISBN </label>
                    <div class="mt-1">
                        <input type="text" id="isbn" name="isbn" value="{{$book->isbn}}"
                               class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5"/>
                    </div>
                    @error('isbn')
                    <div class="text-sm text-red-400">{{ $message }}</div>
                    @enderror
                    <label for="pages" class="block text-sm font-medium text-gray-700"> Pages </label>
                    <div class="mt-1">
                        <input type="number" id="pages" name="pages" min="0" max="10000" value="{{$book->pages}}"
                               class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5"/>
                    </div>
                    @error('pages')
                    <div class="text-sm text-red-400">{{ $message }}</div>
                    @enderror
                    <label for="publishing_date" class="block text-sm font-medium text-gray-700"> Publishing Date
                    </label>
                    <div class="mt-1">
                        <input type="date" id="publishing_date" name="publishing_date"
                               value="{{ $book->publishing_date->format('Y-m-d')}}"
                               class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5"/>
                    </div>
                    @error('publishing_date')
                    <div class="text-sm text-red-400">{{ $message }}</div>
                    @enderror
                    <div>
                        <label for="genre" class="block text-sm font-medium text-gray-700"> Genre </label>
                        <select id="genre_id" name="genre_id[]" multiple="multiple">
                            @foreach($genre_id as $genre)
                                <option
                                    value="{{$genre->id}}" @selected($book->genres->contains($genre))>{{$genre->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('genre_id')
                    <div class="text-sm text-red-400">{{ $message }}</div>
                    @enderror
                    <div>
                        <label for="author" class="block text-sm font-medium text-gray-700"> Author </label>
                        <select id="author_id" name="author_id[]" multiple="multiple">
                            @foreach($author_id as $author)
                                <option
                                    value="{{$author->id}}" @selected($book->authors->contains($author))>{{$author->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('author_id')
                    <div class="text-sm text-red-400">{{ $message }}</div>
                    @enderror
                    <label for="image" class="block text-sm font-medium text-gray-700"> Front cover </label>
                    <div class="mt-1">
                        <img src="{{ Storage::url($book->image) }}"/>
                        <input type="file" id="image" name="image"
                               class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5"/>
                    </div>
                    @error('image')
                    <div class="text-sm text-red-400">{{ $message }}</div>
                    @enderror
                    <div>
                        <label for="summary" class="block text-sm font-medium text-gray-700"> Summary </label>
                        <textarea name="summary" rows="4">{{ old('summary', $book->summary) }}</textarea>
                    </div>
                    @error('summary')
                    <div class="text-sm text-red-400">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit">Update</button>
            </form>
        </div>
    </div>
</x-admin-layout>


