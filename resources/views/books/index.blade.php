<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach($books as $book)
                <th>
                    <tb>
                        <tr>
                            <td>
                            {{ $book->title }}
                            {{ $book->isbn }}
                            {{ $book->pages}}
                            {{ $book->publishing_date->format('d-m-Y')}}
                            {{ $book->summary }}
                            @foreach($book->genres as $genre)
                                <td>{{ $genre->name }}</td>
                            @endforeach
                            @foreach($book->authors as $author)
                                <td>{{ $author->name }}</td>
                            @endforeach
                            <td>
                                <img src="{{ Storage::url($book->image) }}"/>
                            </td>
                        </tr>
                    </tb>
                </th>
            @endforeach
        </div>
    </div>
</x-guest-layout>
