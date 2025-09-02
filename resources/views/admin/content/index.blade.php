<x-app-layout>

    <!-- Header -->
    <div class="bg-white p-5 rounded-lg shadow mb-5">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-green-800">Selamat Datang, Admin!</h1>
                <p class="text-gray-600">Kelola website Sekolah Unggulan dengan mudah</p>
            </div>
            <a href="login.html" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                <i class="fas fa-sign-out-alt"></i> Keluar
            </a>
        </div>
    </div>

    <!-- Kategori -->
    <div class="bg-white p-4 rounded-md shadow-md mb-6">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold mb-2">Kategori</h2>
            <div class="flex items-center">
                <x-search-form
                    action=" {{ route('admin-artikel') }}"
                    placeholder="Search branch name..."
                    name="branch" />
                <x-button-link class="ml-1" color="green" size="sm" href="{{ route('kategori-artikel') }}">
                    <svg class="w-6 h-6 text-text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M9.586 2.586A2 2 0 0 1 11 2h2a2 2 0 0 1 2 2v.089l.473.196.063-.063a2.002 2.002 0 0 1 2.828 0l1.414 1.414a2 2 0 0 1 0 2.827l-.063.064.196.473H20a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2h-.089l-.196.473.063.063a2.002 2.002 0 0 1 0 2.828l-1.414 1.414a2 2 0 0 1-2.828 0l-.063-.063-.473.196V20a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2v-.089l-.473-.196-.063.063a2.002 2.002 0 0 1-2.828 0l-1.414-1.414a2 2 0 0 1 0-2.827l.063-.064L4.089 15H4a2 2 0 0 1-2-2v-2a2 2 0 0 1 2-2h.09l.195-.473-.063-.063a2 2 0 0 1 0-2.828l1.414-1.414a2 2 0 0 1 2.827 0l.064.063L9 4.089V4a2 2 0 0 1 .586-1.414ZM8 12a4 4 0 1 1 8 0 4 4 0 0 1-8 0Z" clip-rule="evenodd" />
                    </svg>

                </x-button-link>
            </div>
        </div>
        <div class="flex space-x-2">
            @foreach($kategoris as $category)
            <a href="{{ route('admin-artikel', ['branch' => $category->slug]) }}"
                class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                {{ $category->nama }}
            </a>
            @endforeach
        </div>
    </div>

    <!-- Content List -->
    <!-- Konten -->
    <div class="bg-white p-4 rounded-md shadow-md mb-6">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold mb-2">Konten</h2>
            <div class="flex items-center">
                <x-search-form
                    action=" {{ route('admin-artikel') }}"
                    placeholder="Search branch name..."
                    name="branch" />
                <x-button-link class="ml-1" color="green" size="sm" href="{{ route('admin-artikel.tambah') }}">
                    Tambah Konten

                </x-button-link>
            </div>
        </div>

       

        @foreach($konten as $content)
        <x-content-card
            :image="$content->image"
            :judul="$content->judul"
            :isi="$content->isi"
            :views="100"
            :tanggal="1" />
        @endforeach


    </div>


    </div>


</x-app-layout>