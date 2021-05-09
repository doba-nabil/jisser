@extends('dashboard.layout.master')
@section('title', 'تعديل تفاصيل الصفحة')
@section('dashboard-main')
    <form action="{{ route('pages.update', $page->id ?? '') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title_ar">العنوان بالعربية</label>
                                        <input type="text" id="title_ar" name="title_ar" value="{{ $page->title_ar ?? '' }}" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title_en">العنوان بالانجليزية</label>
                                        <input type="text" id="title_en" name="title_en" value="{{ $page->title_en ?? '' }}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="text_ar">النص بالعربية</label>
                                <textarea name="text_ar" id="text_ar" cols="30" rows="6" class="form-control summernote"
                                          required>{{ $page->text_ar ?? '' }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="text_en">النص بالعربية</label>
                                <textarea name="text_en" id="text_en" cols="30" rows="6"
                                          class="form-control summernote">{{ $page->text_en ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="form-group">
                                <input type="file" id="input-file-now" class="dropify" name="picture"
                                       @if (isset($page->picture))
                                       data-default-file="{{ asset('pictures/pages/' . $page->picture ?? '') }}"
                                        @endif
                                />
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-block">تحديث</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
