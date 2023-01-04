<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach($authors as $author)
                <th>
                    <tb>
                        <tr>
                            <td>
                            {{ $author->name }}
                            <td>
                                <img src="{{ Storage::url($author->image) }}"/>
                            </td>
                        </tr>
                    </tb>
                </th>
            @endforeach
        </div>
    </div>
</x-guest-layout>
