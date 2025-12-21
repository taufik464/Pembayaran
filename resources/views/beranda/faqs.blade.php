@extends('layouts.web')
@section('title', 'FAQs')
@section('content')
<section class="faq-section pt-12 pb-12">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-header text-center mb-10">
                    <h2 class="text-3xl font-bold text-center text-gray-800 mb-1">Frequently Asked Questions</h2>
                    <p>Find answers to the most commonly asked questions below.</p>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="faq-wrapper">
                <div id="accordion-collapse" data-accordion="collapse" class=" mx-6">
                    @foreach ($faqs as $faq)
                    @php $index = $loop->index + 1; @endphp
                    <div class="mb-2 border border-gray-200 rounded-lg bg-white">
                        <h2 id="accordion-heading-{{ $index }}">
                            <button type="button"
                                class="flex items-center justify-between w-full p-5 font-medium text-gray-800 border-b border-gray-200 rounded-t-lg focus:ring-4 focus:ring-gray-200 hover:bg-gray-100 gap-3"
                                data-accordion-target="#accordion-body-{{ $index }}"
                                aria-expanded="false"
                                aria-controls="accordion-body-{{ $index }}">
                                <span>{{ $faq->question }}</span>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M9 5 5 1 1 5" />
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-body-{{ $index }}" class="hidden"
                            aria-labelledby="accordion-heading-{{ $index }}">
                            <div class="p-5 text-gray-600">
                                {{ $faq->answer }}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="pagination
    justify-content-center mt-4">
                    {{ $faqs->links() }}
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

@endsection
@section('script')
@endsection