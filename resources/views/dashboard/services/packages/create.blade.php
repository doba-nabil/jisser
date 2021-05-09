@extends('dashboard.layout.master')
@section('title', 'اضافة باقة جديدة ' . $service->name ?? '')
@section('dashboard-main')
    <form action="{{ route('packages.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="service_id" value="{{ $service->id ?? '' }}">
        <div class="card">
            <div class="card-content">
                <div class="card-body card-dashboard">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="order">الترتيب</label>
                                <input type="number" class="form-control" id="order" name="order"
                                       value="{{ old('order') }}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="title_ar">العنوان بالعربية</label>
                                <input type="text" class="form-control" id="title_ar" name="title_ar"
                                       value="{{ old('title_ar') }}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="title_en">العنوان بالانجليزية</label>
                                <input type="text" class="form-control" id="title_en" name="title_en"
                                       value="{{ old('title_en') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="price">السعر</label>
                                <input type="text" class="form-control" id="price" name="price"
                                       value="{{ old('price') }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="days">عدد الأيام</label>
                                <input type="number" class="form-control" id="days" name="days"
                                       value="{{ old('days') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="text_ar">وصف الباقة بالعربية</label>
                        <textarea name="text_ar" id="text_ar" cols="30" rows="6" class="form-control summernote"
                                  required>{{ old('text_ar') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="text_en">وصف الباقة بالعربية</label>
                        <textarea name="text_en" id="text_en" cols="30" rows="6"
                                  class="form-control summernote">{{ old('text_en') }}</textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">اضافة</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
