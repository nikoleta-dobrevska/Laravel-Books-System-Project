<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar activePage="books"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Create Book"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('admin.books.index') }}">Go back</a>
                    <div class="card my-4">
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <form method="POST" action="{{ route('admin.books.store') }}"
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
                                    <label for="image" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7
                                         ps-2">
                                        COVER
                                    </label>
                                    <div class="d-flex flex-column justify-content-center">
                                        <input type="file" id="image" name="image"
                                               class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5"/>
                                    </div>
                                    <label for="title" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7
                                         ps-2">
                                        TITLE
                                    </label>
                                    <div class="d-flex flex-column justify-content-center">
                                        <input type="text" id="title" name="title"
                                               style="border-radius: 5px; border: 1px solid lightgray; margin: 10px"
                                               class="mb-0 text-m"/>
                                    </div>
                                    <label for="isbn" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7
                                         ps-2">
                                        ISBN
                                    </label>
                                    <div class="d-flex flex-column justify-content-center">
                                        <input type="text" id="isbn" name="isbn"
                                               style="border-radius: 5px; border: 1px solid lightgray; margin: 10px"
                                               class="mb-0 text-m" />
                                    </div>
                                    <label for="pages" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7
                                         ps-2">
                                        PAGES
                                    </label>
                                    <div class="d-flex flex-column justify-content-center">
                                        <input type="number" id="pages" name="pages"
                                               style="border-radius: 5px; border: 1px solid lightgray; margin: 10px"
                                               class="mb-0 text-m"/>
                                    </div>
                                    <label for="publishing_date" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7
                                         ps-2">
                                        PUBLISHING DATE
                                    </label>
                                    <div class="d-flex flex-column justify-content-center">
                                        <input type="date" id="publishing_date" name="publishing_date"
                                               style="border-radius: 5px; border: 1px solid lightgray; margin: 10px"
                                               class="mb-0 text-m"/>
                                    </div>
                                    <label for="author" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7
                                         ps-2">
                                        AUTHOR
                                    </label>
                                    <div class="d-flex flex-column justify-content-center">
                                        <select style="border-radius: 5px; border: 1px solid lightgray; margin: 10px"
                                                id="author_id" name="author_id[]"
                                                class="form-multiselect block w-full mt-1"
                                                multiple="multiple">
                                            @foreach($author_id as $author)
                                                <option value="{{ $author->id }}">{{$author->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label for="genre" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7
                                         ps-2">
                                        GENRE
                                    </label>
                                    <div class="d-flex flex-column justify-content-center">
                                        <select style="border-radius: 5px; border: 1px solid lightgray; margin: 10px"
                                                id="genre_id" name="genre_id[]"
                                                class="form-multiselect block w-full mt-1"
                                                multiple="multiple">
                                            @foreach($genre_id as $genre)
                                                <option value="{{ $genre->id }}">{{$genre->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label for="summary" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7
                                         ps-2">
                                        SUMMARY
                                    </label>
                                    <div class="d-flex flex-column justify-content-center">
                                        <textarea style="border-radius: 5px; border: 1px solid lightgray; margin: 10px"
                                                  name="summary" id="summary" cols="4" rows="10"></textarea>
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
