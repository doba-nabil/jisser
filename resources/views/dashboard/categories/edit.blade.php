@extends('dashboard.layout.master')
@section('title', 'تعديل تفاصيل التصنيف')
@section('dashboard-main')
    <form action="{{ route('categories.update', $category->id ?? '') }}" method="post" enctype="multipart/form-data">
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
                                        <label for="name_ar">الاسم بالعربية</label>
                                        <input type="text" class="form-control" id="name_ar" name="name_ar" value="{{ $category->name_ar ?? '' }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name_en">الاسم بالانجليزية</label>
                                        <input type="text" class="form-control" id="name_en" name="name_en" value="{{ $category->name_en ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="text_ar">الوصف بالعربية</label>
                                        <input type="text" class="form-control" id="text_ar" name="text_ar" value="{{ $category->text_ar ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="text_en">الوصف بالانجليزية</label>
                                        <input type="text" class="form-control" id="text_en" name="text_en" value="{{ $category->text_en ?? '' }}">
                                    </div>
                                </div>
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
                                       @if (isset($category->picture))
                                       data-default-file="{{ asset('pictures/categories/' . $category->picture ?? '') }}"
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
