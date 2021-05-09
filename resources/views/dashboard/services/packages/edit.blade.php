@extends('dashboard.layout.master')
@section('title', 'تعديل الباقة')
@section('dashboard-main')
    <form action="{{ route('packages.update', $package->id ?? '') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-content">
                <div class="card-body card-dashboard">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="order">الترتيب</label>
                                <input type="number" class="form-control" id="order" name="order"
                                       value="{{ $package->order ?? '' }}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="title_ar">العنوان بالعربية</label>
                                <input type="text" class="form-control" id="title_ar" name="title_ar"
                                       value="{{ $package->title_ar ?? '' }}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="title_en">العنوان بالانجليزية</label>
                                <input type="text" class="form-control" id="title_en" name="title_en"
                                       value="{{ $package->title_en ?? '' }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="price">السعر</label>
                                <input type="text" class="form-control" id="price" name="price"
                                       value="{{ $package->price ?? '' }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="days">عدد الأيام</label>
                                <input type="number" class="form-control" id="days" name="days"
                                       value="{{ $package->days ?? '' }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="text_ar">وصف الباقة بالعربية</label>
                        <textarea name="text_ar" id="text_ar" cols="30" rows="6" class="form-control summernote"
                                  required>{{ $package->text_ar ?? '' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="text_en">وصف الباقة بالعربية</label>
                        <textarea name="text_en" id="text_en" cols="30" rows="6"
                                  class="form-control summernote">{{ $package->text_en }}</textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">تحديث</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
