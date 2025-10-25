const Block = Quill.import('blots/block');

// 2. Definisikan Custom Blot
class TwoColumnLayout extends Block {
  // Tentukan nama tag HTML yang digunakan (misalnya, div)
  static blotName = 'two-column';
  static tagName = 'div';
  
  // Tentukan kelas CSS yang akan diterapkan
  static className = 'ql-two-column'; 
  
  // Daftarkan format agar konten anak bisa masuk
  optimize(context) {
    super.optimize(context);
    // Ini penting agar elemen di dalamnya bisa diedit
  }
}

// 3. Daftarkan Blot ke Quill
Quill.register(TwoColumnLayout);