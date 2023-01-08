<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar activePage="authors"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Edit Author"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('admin.authors.index') }}">Go back</a>
                    <div class="card my-4">
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7
                                            ps-2">
                                            NAME
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7
                                            ps-2">
                                            IMAGE
                                        </th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <form method="POST" action="{{ route('admin.authors.update', $author->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <tr>
                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <input type="text" id="name" name="name" value="{{$author->name}}" style="border-radius: 5px; border: 1px solid lightgray;" class="mb-0 text-m" />
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <img style="width:25%" src="{{ Storage::url($author->image) }}"/>
                                                    <input type="file" id="image" name="image" value="{{$author->image}}" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                                </div>
                                            </td>
                                            <td class="align-middle text-center">
                                                <button class="text-secondary text-m font-weight-bold" type="submit">Update</button>
                                            </td>
                                        </tr>
                                    </form>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    <x-plugins></x-plugins>
</x-layout>

