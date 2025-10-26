import './bootstrap';


import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import './pembayaran/tambahDaftar';


const quill = new Quill('#editor', {
    theme: 'snow' 
});

const content = quill.root.innerHTML;