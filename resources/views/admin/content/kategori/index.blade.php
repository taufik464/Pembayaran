<x-app-layout>
    @include('admin.content.kategori.modal_tambah_kategori')

    <x-page-header
        title="Kategori Artikel"
        :breadcrumb="[
        ['label' => 'Artikel', 'url' => route('admin-artikel')],
    ]" />
    <div class="bg-white rounded-lg text-gray-900 dark:bg-gray-800 dark:text-gray-100">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-4 ">
            <div class="flex items-center justify-end">
                <x-search-form action="{{ route('kategori-artikel') }}" />
                <button data-modal-target="tambahKategoriModal" data-modal-toggle="tambahKategoriModal" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-lg hover:bg-green-700 focus:ring-4 focus:ring-green-300 dark:bg-green-500 dark:hover:bg-green-600 focus:outline-none dark:focus:ring-green-800">
                    Tambah Data
                </button>

            </div>

            <table class="w-full mt-2 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mb-8">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Kategori
                        </th>

                        <th scope="col" class="px-6 py-3">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kategoris as $kategori)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th class="px-6 py-3 font-xs text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $loop->iteration }}
                        </th>
                        <td class="px-6 py-3">
                            {{ $kategori->nama }}
                        </td>

                        <td class="px-2 py-2 relative" x-data="{ open: false }">
                            <button @click="open = !open" class="text-gray-600 hover:text-black focus:outline-none text-2xl">
                                &#8942; <!-- Tiga titik vertikal -->
                            </button>

                            <div x-show="open" @click.away="open = false" class="absolute right-0 z-10 mt-2 w-36 bg-white border rounded shadow-md">
                                <button data-modal-target="editKategoriModal-{{ $kategori->id }}" data-modal-toggle="editKategoriModal-{{ $kategori->id }}" class="w-full text-left block px-4 py-2 text-sm text-blue-600 hover:bg-gray-100">Edit</button>

                                <form action="{{ route('kategori-artikel.destroy', $kategori->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @include('admin.content.kategori.modal_edit_kategori', ['kategori' => $kategori])
                    @empty
                    <tr>
                        <td colspan="3" class="px-6 py-4 text-center text-red-600">
                            Data kategori belum ada!
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>


        </div>
    </div>

</x-app-layout>