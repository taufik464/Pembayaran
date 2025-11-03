<?php

namespace App\Http\Controllers\admin\faq;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class faqController extends Controller
{
    public function index()
    {
        $faqs = \App\Models\faq::all();
        return view('admin.faq.index', compact('faqs'));
    }

    public function create()
    {
        return view('admin.faq.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        \App\Models\faq::create([
            'question' => $request->question,
            'answer' => $request->answer,
        ]);

        return redirect()->route('admin.faq')->with('success', 'FAQ berhasil ditambahkan.');
    }
    
    public function edit($id)
    {
        $faq = \App\Models\faq::findOrFail($id);
        return view('admin.faq.edit', compact('faq'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        $faq = \App\Models\faq::findOrFail($id);
        $faq->update([
            'question' => $request->question,
            'answer' => $request->answer,
        ]);

        return redirect()->route('admin.faq')->with('success', 'FAQ berhasil diperbarui.');
    }
    public function destroy($id)
    {
        $faq = \App\Models\faq::findOrFail($id);
        $faq->delete();

        return redirect()->route('admin.faq')->with('success', 'FAQ berhasil dihapus.');
    }
}
