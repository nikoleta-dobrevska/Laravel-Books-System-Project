<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.users.index') }}">Go back</a>
            </div>
        </div>
        <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
            <form method="POST" action="{{ route('admin.users.update', $user->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="sm:col-span-6">
                    <th>
                        <tb>
                            <tr>
                                <td>
                                    {{ $user->name }}
                                    {{ $user->email }}
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="is_admin[0]" value="admin" {{ old('is_admin', $user->is_admin) ? 'checked' : '' }} onclick="uncheckAndCheck(event)"> Admin
                                            <input type="checkbox" name="is_admin[1]" value="user"  {{ old('is_admin', $user->is_admin==false) ? 'checked' : '' }} onclick="uncheckAndCheck(event)"> User
                                        </label>
                                    </div>
                                </td>
                            </tr>
                        </tb>
                    </th>
                </div>
                @error('name')
                <div class="text-sm text-red-400">{{ $message }}</div>
                @enderror
                <button type="submit">Update</button>
            </form>
        </div>
        <script>
            function uncheckAndCheck(event) {
                document.querySelectorAll( "input[type='checkbox'][name^='is_admin']" ).forEach( checkbox => {
                    checkbox.checked = false;
                });
                event.target.checked = true;
            }
        </script>
    </div>
</x-admin-layout>
