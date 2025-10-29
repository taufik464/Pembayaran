@props(['editorId' => '', 'toolbarId' => 'toolbar-container', 'contentInputId' => 'hiddenContent', 'content' => ''])

{{-- 🔗 CSS & JS ASSETS --}}
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/atom-one-dark.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.css" />


<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
<script src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.js"></script>




{{-- 🧰 TOOLBAR --}}
<div class=" " id="{{ $toolbarId }}">
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
        <button class="ql-image"></button>
        <button class="ql-video"></button>
        <button class="ql-formula"></button>

    </span>

    <span class="ql-formats" role="group" aria-label="Image position">
        <button class="ql-position" value="inline" title="Inline" aria-label="Inline">
            <svg viewBox="0 0 18 18" width="18" height="18" focusable="false">
                <rect x="2" y="6" width="14" height="6" rx="1" ry="1" fill="none" stroke="currentColor" stroke-width="1.2" />
                <rect x="6" y="8" width="6" height="2" fill="currentColor" />
            </svg>
        </button>

        <button class="ql-position" value="left" title="Left" aria-label="Left">
            <svg viewBox="0 0 18 18" width="18" height="18" focusable="false">
                <rect x="2" y="3" width="8" height="2" rx="0.6" ry="0.6" fill="currentColor" />
                <rect x="2" y="6.5" width="8" height="2" rx="0.6" ry="0.6" fill="currentColor" />
                <rect x="2" y="10" width="8" height="2" rx="0.6" ry="0.6" fill="currentColor" />
                <rect x="12" y="5" width="4" height="6" rx="0.6" ry="0.6" fill="none" stroke="currentColor" stroke-width="1" />
            </svg>
        </button>

        <button class="ql-position" value="center" title="Center" aria-label="Center">
            <svg viewBox="0 0 18 18" width="18" height="18" focusable="false">
                <rect x="2" y="3" width="14" height="2" rx="0.6" ry="0.6" fill="currentColor" />
                <rect x="2" y="7" width="14" height="2" rx="0.6" ry="0.6" fill="currentColor" />
                <rect x="2" y="11" width="14" height="2" rx="0.6" ry="0.6" fill="currentColor" />
                <rect x="7" y="5" width="4" height="8" rx="0.6" ry="0.6" fill="none" stroke="currentColor" stroke-width="1" />
            </svg>
        </button>

        <button class="ql-position" value="right" title="Right" aria-label="Right">
            <svg viewBox="0 0 18 18" width="18" height="18" focusable="false">
                <rect x="8" y="3" width="8" height="2" rx="0.6" ry="0.6" fill="currentColor" />
                <rect x="8" y="6.5" width="8" height="2" rx="0.6" ry="0.6" fill="currentColor" />
                <rect x="8" y="10" width="8" height="2" rx="0.6" ry="0.6" fill="currentColor" />
                <rect x="2" y="5" width="4" height="6" rx="0.6" ry="0.6" fill="none" stroke="currentColor" stroke-width="1" />
            </svg>
        </button>

        <button class="ql-position" value="behind" title="Behind Text" aria-label="Behind Text">
            <svg viewBox="0 0 18 18" width="18" height="18" focusable="false">
                <rect x="3.5" y="4" width="10" height="7" rx="1" ry="1" fill="none" stroke="currentColor" stroke-width="1" />
                <rect x="5" y="7" width="8" height="6" rx="1" ry="1" fill="currentColor" opacity="0.18" />
                <path d="M4 13 L14 13" stroke="currentColor" stroke-width="1" />
            </svg>
        </button>

        <button class="ql-position" value="front" title="In Front" aria-label="In Front">
            <svg viewBox="0 0 18 18" width="18" height="18" focusable="false">
                <rect x="4" y="5" width="8" height="6" rx="1" ry="1" fill="currentColor" opacity="0.18" />
                <rect x="6.5" y="3" width="8" height="6" rx="1" ry="1" fill="none" stroke="currentColor" stroke-width="1" />
                <path d="M3.8 9 L14 9" stroke="currentColor" stroke-width="1" />
            </svg>
        </button>
    </span>
    <span class="ql-formats">
        <button class="ql-clean"></button>
    </span>
</div>

{{-- 📝 EDITOR AREA --}}
<div id="{{ $editorId }}" class="rendered-content quill-editor-output border rounded-md p-2 bg-white" style="min-height: 300px;">
    {!! $content !!}
</div>

<style>
    /* Pastikan option mewarisi warna agar teks selalu terlihat */
    .ql-position option {
        color: inherit;
    }

    .ql-editor img.align-left {
        display: block;
        margin: 0;
        margin-left: 0;
        margin-right: auto;
    }

    .ql-editor img.align-center {
        display: block;
        margin: 0 auto;
    }

    .ql-editor img.align-right {
        display: block;
        margin: 0;
        margin-left: auto;
        margin-right: 0;
    }

    .ql-two-column:before {
        content: "2C";
        font-weight: bold;
        font-size: 10px;
    }

    .ql-editor img.position-inline {
        display: inline-block;
        vertical-align: middle;
    }

    .ql-editor img.position-left {
        float: left;
        margin-right: 0.75rem;
        /* mr-3 */
        margin-bottom: 0.5rem;
        /* mb-2 */
    }

    .ql-editor img.position-right {
        float: right;
        margin-left: 0.75rem;
        margin-bottom: 0.5rem;
    }

    .ql-editor img.position-center {
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    .ql-editor img.position-behind {
        position: absolute;
        z-index: -10;
        opacity: 0.8;
    }

    .ql-editor img.position-front {
        position: relative;
        z-index: 10;
    }
</style>

{{-- ⚙️ SCRIPT INISIALISASI --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const Block = Quill.import('blots/block');
        const Parchment = Quill.import('parchment');
        const BlockEmbed = Quill.import('blots/block/embed');
        const Image = Quill.import('formats/image');





        // 🔹 Custom Image Format untuk mendukung class align
        class ImageFormat extends Image {
            static formats(domNode) {
                const alignClass = domNode.getAttribute('class');
                return alignClass ? {
                    class: alignClass
                } : {};
            }

            format(name, value) {
                if (name === 'class') {
                    if (value) {
                        this.domNode.setAttribute('class', value);
                    } else {
                        this.domNode.removeAttribute('class');
                    }
                } else {
                    super.format(name, value);
                }
            }
        }



        Quill.register(ImageFormat, true);
        const editorElement = document.getElementById('{{ $editorId }}');
        const contentInput = document.getElementById('{{ $contentInputId }}');

        if (editorElement && contentInput) {
            const quill = new Quill('#{{ $editorId }}', {
                modules: {
                    syntax: {
                        highlight: text => hljs.highlightAuto(text).value
                    },
                    toolbar: {
                        container: '#{{ $toolbarId }}',
                        handlers: {
                            align: function(value) {
                                const range = this.quill.getSelection();
                                if (range) {
                                    const [leaf] = this.quill.getLeaf(range.index);
                                    if (leaf && leaf.domNode && leaf.domNode.tagName === 'IMG') {
                                        leaf.domNode.classList.remove('align-left', 'align-center', 'align-right');
                                        if (value) {
                                            leaf.domNode.classList.add(`align-${value}`);
                                        }
                                    } else {
                                        this.quill.format('align', value);
                                    }
                                }
                            },

                            'position': function(value) {
                                const range = this.quill.getSelection();
                                if (range) {
                                    const [leaf] = this.quill.getLeaf(range.index);
                                    if (leaf && leaf.domNode && leaf.domNode.tagName === 'IMG') {
                                        // Hapus semua class posisi lama
                                        leaf.domNode.classList.remove(
                                            'position-inline',
                                            'position-left',
                                            'position-right',
                                            'position-center',
                                            'position-behind',
                                            'position-front'
                                        );
                                        if (value) {
                                            leaf.domNode.classList.add(`position-${value}`);
                                        }
                                    } else {
                                        console.warn('Pilih gambar untuk mengatur posisi.');
                                    }
                                }
                            },



                        }
                    },
                },
                formats: [
                    'align', 'bold', 'italic', 'underline', 'strike', 'color', 'background',
                    'script', 'header', 'blockquote', 'code-block', 'list', 'indent',
                    'direction', 'link', 'image', 'video', 'formula', 'position'
                ],
                placeholder: 'Tulis konten Anda di sini...',
                theme: 'snow',
            });

            hljs.highlightAll();

            const form = contentInput.closest('form');
            if (form) {
                form.onsubmit = function() {
                    contentInput.value = quill.root.innerHTML;
                };
            }
        }
    });

    class ImagePositionFormat extends Image {
        static formats(domNode) {
            const positionClass = Array.from(domNode.classList)
                .find(c => c.startsWith('position-'));
            return positionClass ? {
                class: positionClass
            } : {};
        }

        format(name, value) {
            if (name === 'class') {
                if (value) {
                    this.domNode.classList.add(value);
                } else {
                    this.domNode.className = '';
                }
            } else {
                super.format(name, value);
            }
        }
    }
    Quill.register(ImagePositionFormat, true);

    function insertTwoColumnLayout(quill) {
        const range = quill.getSelection(true);

        // 1. Menyisipkan struktur Blot kustom:
        quill.getModule('toolbar').container.classList.add('ql-disabled'); // Disable toolbar sebentar

        quill.updateContents(
            new Quill.import('delta.Delta')()
            .retain(range.index)
            .insert({
                'two-column-layout': 1
            }) // Sisipkan kontainer utama
            .insert({
                'column-left': 1
            }) // Sisipkan kolom kiri
            .insert('\n') // Tambahkan baris kosong di kiri agar bisa diketik
            .insert({
                'column-right': 1
            }) // Sisipkan kolom kanan
            .insert('\n') // Tambahkan baris kosong di kanan
            .insert('\n') // Baris kosong setelah layout untuk pemisah
            , Quill.sources.USER);

        quill.setSelection(range.index + 2, Quill.sources.SILENT); // Pindahkan kursor ke kolom kiri

        quill.getModule('toolbar').container.classList.remove('ql-disabled'); // Re-enable toolbar
    }
</script>