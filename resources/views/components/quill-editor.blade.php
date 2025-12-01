@props([
'editorId' => 'editor',
'toolbarId' => 'toolbar-container',
'contentInputId' => 'hiddenContent',
'content' => '',
])

{{-- 🔗 CSS & JS ASSETS --}}
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/atom-one-dark.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.css" rel="stylesheet" />


<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
<script src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />

{{-- 🧰 TOOLBAR --}}
<div id="{{ $toolbarId }}" class="mb-2">
    <span class="ql-formats">
        <select class="ql-font">
            <option value="serif">Serif</option>
            <option value="monospace">Monospace</option>
        </select>
        <select class="ql-size"></select>
    </span>
    <span class="ql-formats">
        <button class="ql-bold"></button>
        <button class="ql-italic"></button>
        <button class="ql-underline"></button>
        <button class="ql-strike"></button>
    </span>
    <span class="ql-formats">
        <select class="ql-color"></select>
        <select class="ql-background"></select>
    </span>
    <span class="ql-formats">
        <button class="ql-script" value="sub"></button>
        <button class="ql-script" value="super"></button>
    </span>
    <span class="ql-formats">
        <button class="ql-header" value="1"></button>
        <button class="ql-header" value="2"></button>
        <button class="ql-blockquote"></button>
        <button class="ql-code-block"></button>
    </span>
    <span class="ql-formats">
        <button class="ql-list" value="ordered"></button>
        <button class="ql-list" value="bullet"></button>
        <button class="ql-indent" value="-1"></button>
        <button class="ql-indent" value="+1"></button>
    </span>
    <span class="ql-formats">
        <button class="ql-direction" value="rtl"></button>
        <select class="ql-align"></select>
    </span>
    <span class="ql-formats">
        <button class="ql-link"></button>
        {{--<button class="ql-image"></button>
        <button class="ql-video"></button>
        <button class="ql-formula"></button>--}}
    </span>

    {{-- 🔹 Tombol Posisi Gambar --}}
    {{-- <span class="ql-formats">
        <button class="ql-position" value="left" title="Image Left">L</button>
        <button class="ql-position" value="center" title="Image Center">C</button>
        <button class="ql-position" value="right" title="Image Right">R</button>
    </span> --}}


    {{-- 🔹 Tombol Layout Dua Kolom
    <span class="ql-formats">
        <button class="ql-two-column" title="Two Column Layout">
            <svg viewBox="0 0 18 18" width="18" height="18">
                <rect x="2" y="4" width="6" height="10" stroke="currentColor" fill="none" stroke-width="1" />
                <rect x="10" y="4" width="6" height="10" stroke="currentColor" fill="none" stroke-width="1" />
            </svg>
        </button>
    </span> --}}

    <span class="ql-formats">
        <button class="ql-clean"></button>
    </span>
</div>

{{-- 📝 AREA EDITOR --}}
<div id="{{ $editorId }}" class="ql-editor border rounded-md p-2 bg-white" style="min-height: 300px;">
    {!! $content !!}
</div>


<style>
    .ql-editor img.position-left {
        float: left;
        margin-right: 0.75rem;
        margin-bottom: 0.5rem;
    }

    .ql-editor img.position-right {
        float: right;
        margin-left: 0.75rem;
        margin-bottom: 0.5rem;
    }

    .ql-editor img.position-center {
        display: block;
        margin: 0 auto;
    }

    .ql-two-column-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px;
        margin: 12px 0;
        border: 1px dashed #ccc;
        padding: 10px;
        border-radius: 8px;
    }

    .ql-two-column-container>div {
        min-height: 100px;
        background: #fafafa;
        padding: 8px;
        border-radius: 6px;
    }
</style>

{{-- ⚙️ SCRIPT INISIALISASI --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const quill = new Quill("#{{ $editorId }}", {
            modules: {
                syntax: true,
                toolbar: {
                    container: "#{{ $toolbarId }}",
                    handlers: {
                        position: function(value) {
                            const range = this.quill.getSelection();
                            if (!range) return;
                            const [leaf] = this.quill.getLeaf(range.index);
                            if (leaf && leaf.domNode.tagName === "IMG") {
                                leaf.domNode.classList.remove("position-left", "position-right", "position-center");
                                if (value) leaf.domNode.classList.add(`position-${value}`);
                            }
                        },
                        "two-column": function() {
                            insertTwoColumnLayout(this.quill);
                        }
                    },
                },
            },
            theme: "snow",
            placeholder: "Tulis konten Anda di sini...",
        });

        function insertTwoColumnLayout(quill) {
            const range = quill.getSelection(true);
            const container = document.createElement("div");
            container.classList.add("ql-two-column-container");

            const leftCol = document.createElement("div");
            leftCol.textContent = "Kolom Kiri...";

            const rightCol = document.createElement("div");
            rightCol.textContent = "Kolom Kanan...";

            container.appendChild(leftCol);
            container.appendChild(rightCol);

            quill.root.insertBefore(container, quill.root.childNodes[range.index] || null);
        }

        // Simpan konten ke input hidden saat submit form
        const form = document.getElementById("{{ $contentInputId }}").closest("form");
        if (form) {
            form.addEventListener("submit", function() {
                document.getElementById("{{ $contentInputId }}").value = quill.root.innerHTML;
            });
        }
    });
</script>