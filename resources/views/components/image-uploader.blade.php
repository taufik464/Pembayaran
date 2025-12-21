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
    <div class="flex gap-3">
        {{-- Upload dari Komputer --}}
        <div class="relative flex items-center gap-3 border border-gray-300 rounded-lg bg-gray-50 px-3 py-2 cursor-pointer hover:bg-gray-100 flex-1">
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

        {{-- Upload dari Google Drive --}}
        {{-- <button type="button" id="google-drive-btn-{{ $name }}"
        class="flex items-center gap-2 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
            <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" />
            <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" />
            <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" />
            <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" />
        </svg>
        Google Drive
        </button>--}}
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
{{-- Google Picker API --}}
<script src="https://apis.google.com/js/api.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // === GOOGLE DRIVE INTEGRATION ===
        const googleDriveButtons = document.querySelectorAll('[id^="google-drive-btn-"]');

        googleDriveButtons.forEach(btn => {
            const name = btn.id.replace('google-drive-btn-', '');
            const previewContainer = document.getElementById(`preview-${name}`);
            const fileNamesDisplay = document.getElementById(`file-names-${name}`);
            let selectedFiles = [];

            // Load Google API
            gapi.load('auth2', function() {
                gapi.auth2.init({
                    client_id: '{{ config("google.client_id") }}'
                });
            });

            gapi.load('picker', function() {
                // Google Picker is loaded
            });

            btn.addEventListener('click', function() {
                if (!gapi.auth2.getAuthInstance().isSignedIn.get()) {
                    gapi.auth2.getAuthInstance().signIn().then(function() {
                        createPicker(name);
                    });
                } else {
                    createPicker(name);
                }
            });

            function createPicker(name) {
                const view = new google.picker.View(google.picker.ViewId.DOCS);
                view.setMimeTypes("image/png,image/jpeg,image/jpg,image/gif,image/webp");

                const picker = new google.picker.PickerBuilder()
                    .addView(view)
                    .setOAuthToken(gapi.auth2.getAuthInstance().currentUser.get().getAuthResponse().access_token)
                    .setDeveloperKey('YOUR_GOOGLE_API_KEY_HERE') // Replace with your actual API key
                    .setCallback(function(data) {
                        if (data.action === google.picker.Action.PICKED) {
                            data.docs.forEach(function(doc) {
                                downloadFromDrive(doc, name);
                            });
                        }
                    })
                    .build();
                picker.setVisible(true);
            }

            function downloadFromDrive(doc, name) {
                const accessToken = gapi.auth2.getAuthInstance().currentUser.get().getAuthResponse().access_token;
                const xhr = new XMLHttpRequest();
                xhr.open('GET', `https://www.googleapis.com/drive/v3/files/${doc.id}?alt=media`);
                xhr.setRequestHeader('Authorization', `Bearer ${accessToken}`);
                xhr.responseType = 'blob';

                xhr.onload = function() {
                    if (xhr.status === 200) {
                        const blob = xhr.response;
                        const file = new File([blob], doc.name, {
                            type: blob.type
                        });
                        selectedFiles.push(file);
                        showFileNames();
                        showPreview();
                        updateInputFiles();
                    }
                };
                xhr.send();
            }

            function showFileNames() {
                const localFiles = Array.from(document.getElementById(`input-${name}`).files);
                const allFiles = [...localFiles, ...selectedFiles];
                fileNamesDisplay.textContent = allFiles.length === 0 ?
                    "Belum ada file dipilih" :
                    allFiles.map(f => f.name).join(', ');
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
                const localFiles = Array.from(document.getElementById(`input-${name}`).files);
                const allFiles = [...localFiles, ...selectedFiles];
                const dataTransfer = new DataTransfer();
                allFiles.forEach(file => dataTransfer.items.add(file));
                document.getElementById(`input-${name}`).files = dataTransfer.files;
            }
        });

        // === PREVIEW GAMBAR BARU DARI LOCAL ===
        const inputFile = document.querySelectorAll('input[type="file"][id^="input-"]');

        inputFile.forEach(input => {
            const name = input.id.replace('input-', '');
            const previewContainer = document.getElementById(`preview-${name}`);
            const fileNamesDisplay = document.getElementById(`file-names-${name}`);
            let localSelectedFiles = [];

            input.addEventListener('change', function(event) {
                const files = Array.from(event.target.files);
                localSelectedFiles = [...localSelectedFiles, ...files];
                updateCombinedPreview(name);
            });

            function updateCombinedPreview(name) {
                const googleDriveFiles = selectedFiles || [];
                const allFiles = [...localSelectedFiles, ...googleDriveFiles];

                fileNamesDisplay.textContent = allFiles.length === 0 ?
                    "Belum ada file dipilih" :
                    allFiles.map(f => f.name).join(', ');

                previewContainer.innerHTML = '';
                allFiles.forEach((file, index) => {
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
                            if (index < localSelectedFiles.length) {
                                localSelectedFiles.splice(index, 1);
                            } else {
                                const googleIndex = index - localSelectedFiles.length;
                                selectedFiles.splice(googleIndex, 1);
                            }
                            updateCombinedPreview(name);
                        });

                        wrapper.appendChild(img);
                        wrapper.appendChild(removeBtn);
                        previewContainer.appendChild(wrapper);
                    };
                    reader.readAsDataURL(file);
                });
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