@extends('dashboard.categories.subcategories.resources.views.dashboard.layout.master')
@section('title', 'اضافة عضو جديد')
@section('dashboard-main')
    <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-content">
                        <div class="card-header">بيانات العضوية</div>
                        <div class="card-body card-dashboard">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name_ar">الاسم بالعربية</label>
                                        <input type="text" class="form-control" id="name_ar" name="name_ar" value="{{ old('name_ar') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name_en">الاسم بالانجليزية</label>
                                        <input type="text" class="form-control" id="name_en" name="name_en" value="{{ old('name_en') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">البريد الالكتروني</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">كلمة المرور</label>
                                        <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="card-header">بيانات  التواصل</div>
                        <div class="card-body card-dashboard">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="phone">رقم الهاتف</label>
                                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="country_id">الدولة</label>
                                        <select name="country_id" id="country_id" class="form-control select">
                                            <option value="0">بدون دولة</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name_ar }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="city_id">المدينة</label>
                                        <select name="city_id" id="city_id" class="form-control select">
                                            <option value="0">بدون مدينة</option>
                                        </select>
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
                                <input type="file" id="input-file-now" class="dropify" name="picture"/>
                            </div>
                            <div class="form-group">
                                <select name="isActive" id="isActive" class="form-control select">
                                    <option value="1">مفعل</option>
                                    <option value="0">غير مفعل</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="isSeller" id="isSeller" class="form-control select">
                                    <option value="0">عضو عادي</option>
                                    <option value="1">بائع</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-block">اضافة</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
