<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar activePage="genres"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Create Genre"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('admin.genres.index') }}">Go back</a>
                    <div class="card my-4">
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <form method="POST" action="{{ route('admin.genres.store') }}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7
                                         ps-2">
                                        Name
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <input type="text" id="name" name="name"
                                               style="border-radius: 5px; border: 1px solid lightgray; margin: 10px"
                                               class="mb-0 text-m"/>
                                    </div>
                                    <button class="text-secondary border-radius-10 text-m m-1 font-weight-bold"
                                            type="submit">Add
                                    </button>
                                </form>
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

