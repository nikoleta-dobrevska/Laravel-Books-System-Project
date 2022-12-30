<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.books.create') }}">Add new book</a>
            </div>
            @foreach($books as $book)
                <th>
                    <tb>
                        <tr>
                            <td>
                            {{ $book->title }}
                            {{ $book->isbn }}
                            {{ $book->pages}}
                            {{ $book->summary }}
                            <td>
                                <img src="{{ Storage::url($book->image) }}"/>
                            </td>
                            <td>
                                <a href="{{ route('admin.books.edit', $book->id) }}">Edit</a>
                                <form method="POST" action="{{ route('admin.books.destroy', $book->id) }}"
                                      onsubmit="return confirm('Are you sure you want to delete the book?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    </tb>
                </th>
            @endforeach
        </div>
    </div>
</x-admin-layout>
