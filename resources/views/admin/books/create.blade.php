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
            <form method="POST" action="{{ route('admin.books.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="sm:col-span-6">
                    <label for="title" class="block text-sm font-medium text-gray-700"> Title </label>
                    <div class="mt-1">
                        <input type="text" id="title" name="title"
                               class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5"/>
                    </div>
                    <label for="title" class="block text-sm font-medium text-gray-700"> ISBN </label>
                    <div class="mt-1">
                        <input type="text" id="isbn" name="isbn"
                               class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5"/>
                    </div>
                    <label for="title" class="block text-sm font-medium text-gray-700"> Pages </label>
                    <div class="mt-1">
                        <input type="number" id="pages" name="pages" min="0" max="10000"
                               class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5"/>
                    </div>
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700"> Genre </label>
                        <select id="genre_id" name="genre_id" class="form-multiselect block w-full mt-1" multiple="multiple">
                            @foreach($genre_id as $genre)
                                <option value="{{ $genre->id }}">{{$genre->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700"> Author </label>
                        <select id="author_id" name="author_id" class="form-multiselect block w-full mt-1" multiple="multiple">
                            @foreach($author_id as $author)
                                <option value="{{ $author->id }}">{{$author->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <label for="title" class="block text-sm font-medium text-gray-700"> Front cover </label>
                    <div class="mt-1">
                        <input type="file" id="image" name="image"
                               class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5"/>
                    </div>
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700"> Summary </label>
                        <textarea name="summary" id="summary" cols="4" rows="4"></textarea>
                    </div>
                </div>
                <button type="submit">Add</button>
            </form>
        </div>
    </div>
</x-admin-layout>
