<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.authors.create') }}">Add new author</a>
            </div>
            @foreach($authors as $author)
                <th>
                    <tb>
                        <tr>
                            <td>
                                {{ $author->name }}
                            <td>
                                <img src="{{ Storage::url($author->image) }}"/>
                            </td>
                            <td>
                                <a href="{{ route('admin.authors.edit', $author->id) }}">Edit</a>
                                <form method="POST" action="{{ route('admin.authors.destroy', $author->id) }}" onsubmit="return confirm('Are you sure you want to delete the author?');">
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
