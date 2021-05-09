@extends('dashboard.layout.master')
@section('title', 'باقات الخدمة ' . $service->title_ar ?? '')
@section('dashboard-main')
    <section>
        <div class="row">
            <div class="col-12">
                <ul class="list-inline text-center">
                    @if (count($service->packages) !== 3)
                        <li class="list-inline-item">
                            <form action="{{ route('packages.create') }}">
                                <input type="hidden" name="service_id" value="{{ $service->id ?? '' }}">
                                <button class="btn btn-primary">اضافة باقة جديدة</button>
                            </form>
                        </li>
                    @endif
                    <li><a type="button" data-toggle="modal" data-target="#createFAQ" class="btn btn-primary"
                           style="color: #FFFFFF">اضافة سؤال وجواب</a></li>
                </ul>
            </div>
        </div>
        <div class="row" style="margin-top: 40px;">
            <div class="col-md-10 mx-auto">
                <div class="row">
                    @if (count($service->packages) > 0)
                        @foreach ($service->packages as $package)
                            <div class="col-md-4 mx-auto">
                                <div class="package">
                                    <h1>{{ $package->title_ar }}</h1>
                                    <p>{!! htmlspecialchars_decode(\App\Http\Controllers\Dashboard\DashboardController::formatText($package->text_ar)) !!}</p>
                                    <ul class="list-inline metaList">
                                        <li class="list-inline-item">{{ $package->price }}$</li>
                                        <li class="list-inline-item">{{ $package->days }} أيام</li>
                                    </ul>
                                    <ul class="list-inline text-center" style="margin-top: 20px;">
                                        <li class="list-inline-item"><a
                                                    href="{{ route('packages.edit', $package->id) }}"
                                                    class="btn btn-success">تعديل</a></li>
                                        <li>
                                            <form action="{{ route('packages.destroy', $package->id ?? '') }}"
                                                  method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger confirm">حذف</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="alert alert-danger">لا يوجد باقات لهذه الخدمة</p>
                    @endif
                </div>
            </div>
        </div>
        @if (count($service->faqs) > 0)
            <div class="row" style="margin-top: 50px;">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-header">الأسئلة الشائعة</div>
                            <div class="card-body card-dashboard">
                                <div class="accordion" id="accordionExample">
                                    @foreach ($service->faqs as $faq)
                                        <div class="card" style="margin-bottom: 0">
                                            <div class="card-header" id="faq_{{ $faq->id ?? '' }}">
                                                <h2 class="mb-0">
                                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#faq_{{ $faq->id ?? '' }}" aria-expanded="true" aria-controls="faq_{{ $faq->id ?? '' }}">
                                                        {{ $faq->question_ar }}
                                                    </button>
                                                </h2>
                                            </div>

                                            <div id="faq_{{ $faq->id ?? '' }}" class="collapse" aria-labelledby="faq_{{ $faq->id ?? '' }}" data-parent="#accordionExample">
                                                <div class="card-body">{{ $faq->answer_ar }}</div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </section>
    <!-- Modal -->
    <div class="modal fade" id="createFAQ" tabindex="-1" aria-labelledby="createFAQ" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">اضافة سؤال وجواب</h5>
                </div>
                <form action="{{ route('faq.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="service_id" value="{{ $service->id ?? '' }}">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="question_ar">السؤال بالعربية</label>
                            <input type="text" id="question_ar" name="question_ar" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="question_en">السؤال بالانجليزية</label>
                            <input type="text" id="question_en" name="question_en" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="answer_ar">الاجابة بالعربية</label>
                            <textarea name="answer_ar" id="answer_ar" cols="30" rows="4" class="form-control"
                                      required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="answer_en">الاجابة بالانجليزية</label>
                            <textarea name="answer_en" id="answer_en" cols="30" rows="4"
                                      class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">اضافة</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
