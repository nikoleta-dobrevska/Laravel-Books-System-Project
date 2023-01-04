<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach($users as $user)
                <th>
                    <tb>
                        <tr>
                            <td>
                                {{ $user->name }}
                                {{ $user->email }}
                                @if($user->is_admin==true)
                                    <span>Admin</span>
                                @else
                                    <span>User</span>
                                @endif
                            </td>
                            @if (auth()->user()->id == $user->id)
                                <div class="edit">
                                    <td>
                                        <a href="{{ route('admin.users.edit', $user->id) }}">Edit</a>
                                        <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}"
                                              onsubmit="return confirm('Are you sure you want to delete the user?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">Delete</button>
                                        </form>
                                    </td>
                                </div>
                            @else
                                <div class="edit" display="block">
                                    <td>
                                        <a href="{{ route('admin.users.edit', $user->id) }}">Edit</a>
                                        <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}"
                                              onsubmit="return confirm('Are you sure you want to delete the user?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">Delete</button>
                                        </form>
                                    </td>
                                </div>
                            @endif
                        </tr>
                    </tb>
                </th>
            @endforeach
        </div>
    </div>
</x-admin-layout>
