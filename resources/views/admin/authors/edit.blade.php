<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.authors.index') }}">Go back</a>
            </div>
        </div>
        <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
            <form method="POST" action="{{ route('admin.authors.update', $author->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="sm:col-span-6">
                    <label for="title" class="block text-sm font-medium text-gray-700"> Name </label>
                    <div class="mt-1">
                        <img src="{{ Storage::url($author->image) }}"/>
                        <input type="text" id="name" name="name" value="{{$author->name}}" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                    <label for="title" class="block text-sm font-medium text-gray-700"> Image of author </label>
                    <div class="mt-1">
                        <input type="file" id="image" name="image" value="{{$author->image}}" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                </div>
                <button type="submit">Update</button>
            </form>
        </div>
    </div>
</x-admin-layout>

