@props([
'name' => 'images', // nama input (array)
'label' => 'Upload Gambar', // label tampilan
'existing' => [], // data gambar lama (opsional)
])

<div class="mb-4">
    {{-- Label --}}
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
        {{ $label }} (boleh lebih dari 1)
    </label>

    {{-- Input Upload --}}
    <div class="relative flex items-center gap-3 border border-gray-300 rounded-lg bg-gray-50 px-3 py-2 cursor-pointer hover:bg-gray-100">
        <div class="flex items-center justify-center bg-gray-800 text-white px-3 py-2 rounded-md shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M12 12V4m0 8l-3-3m3 3l3-3" />
            </svg>
        </div>
        <span id="file-names-{{ $name }}" class="text-sm text-gray-700 truncate">
            Belum ada file dipilih
        </span>
        <input id="input-{{ $name }}" name="{{ $name }}[]" type="file" multiple accept="image/*"
            class="absolute inset-0 opacity-0 cursor-pointer">
    </div>

    {{-- Error Message --}}
    @error($name)
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
    @error($name . '.*')
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror

    {{-- Preview Gambar Baru --}}
    <div id="preview-{{ $name }}" class="mt-4 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4"></div>

    {{-- Gambar Lama --}}
    @if (!empty($existing))
    <div class="mt-4">
        <p class="text-sm font-medium text-gray-700 mb-2">Gambar Sebelumnya:</p>
        <div id="existing-{{ $name }}" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach ($existing as $img)
            <div class="relative group">
                <img src="{{ asset('storage/' . $img) }}" alt="Gambar Lama"
                    class="w-full h-40 object-cover rounded-lg shadow">
                <button type="button"
                    class="absolute top-1 right-1 bg-red-500 text-white rounded-full w-6 h-6 
                                   flex items-center justify-center text-xs opacity-80 hover:opacity-100 transition 
                                   remove-existing" data-path="{{ $img }}">
                    ✕
                </button>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    {{-- Hidden Input untuk gambar lama yang dihapus --}}
    <input type="hidden" name="deleted_images" id="deleted-{{ $name }}" value="">
</div>

@pushOnce('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // === PREVIEW GAMBAR BARU ===
        const inputFile = document.querySelectorAll('input[type="file"][id^="input-"]');

        inputFile.forEach(input => {
            const name = input.id.replace('input-', '');
            const previewContainer = document.getElementById(`preview-${name}`);
            const fileNamesDisplay = document.getElementById(`file-names-${name}`);
            let selectedFiles = [];

            input.addEventListener('change', function(event) {
                const files = Array.from(event.target.files);
                selectedFiles = [...selectedFiles, ...files];
                showFileNames();
                showPreview();
            });

            function showFileNames() {
                fileNamesDisplay.textContent = selectedFiles.length === 0 ?
                    "Belum ada file dipilih" :
                    selectedFiles.map(f => f.name).join(', ');
            }

            function showPreview() {
                previewContainer.innerHTML = '';
                selectedFiles.forEach((file, index) => {
                    if (!file.type.startsWith('image/')) return;
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const wrapper = document.createElement('div');
                        wrapper.className = 'relative group';

                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.className = 'w-full h-40 object-cover rounded-lg shadow';

                        const removeBtn = document.createElement('button');
                        removeBtn.innerHTML = '✕';
                        removeBtn.type = 'button';
                        removeBtn.className = `
                        absolute top-1 right-1 bg-red-500 text-white rounded-full w-6 h-6 
                        flex items-center justify-center text-xs opacity-80 hover:opacity-100 transition
                    `;
                        removeBtn.addEventListener('click', () => {
                            selectedFiles.splice(index, 1);
                            updateInputFiles();
                            showFileNames();
                            showPreview();
                        });

                        wrapper.appendChild(img);
                        wrapper.appendChild(removeBtn);
                        previewContainer.appendChild(wrapper);
                    };
                    reader.readAsDataURL(file);
                });
            }

            function updateInputFiles() {
                const dataTransfer = new DataTransfer();
                selectedFiles.forEach(file => dataTransfer.items.add(file));
                input.files = dataTransfer.files;
            }
        });

        // === HAPUS GAMBAR LAMA ===
        const deleteButtons = document.querySelectorAll('.remove-existing');
        const deletedInput = document.querySelector('input[name="deleted_images"]');
        const deletedList = [];

        deleteButtons.forEach(btn => {
            btn.addEventListener('click', function() {
                const path = this.dataset.path;
                const parent = this.closest('.group');

                // sembunyikan dari tampilan
                parent.remove();

                // tambahkan ke daftar hapus
                deletedList.push(path);
                deletedInput.value = JSON.stringify(deletedList);
            });
        });
    });
</script>
@endPushOnce