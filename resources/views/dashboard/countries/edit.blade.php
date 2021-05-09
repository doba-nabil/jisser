@extends('dashboard.layout.master')
@section('title', 'تعديل تفاصيل الدولة')
@section('dashboard-main')
    <form action="{{ route('countries.update', $country->id ?? '') }}" method="post" enctype="multipart/form-data">
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
                                        <label for="name_ar">اسم الدولة بالعربية</label>
                                        <input type="text" id="name_ar" name="name_ar" value="{{ $country->name_ar }}" required
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name_en">اسم الدولة بالانجليزية</label>
                                        <input type="text" id="name_en" name="name_en" value="{{ $country->name_en }}" required
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="currency_ar">اسم العملة بالعربية</label>
                                        <input type="text" id="currency_ar" name="currency_ar"
                                               value="{{ $country->currency_ar }}" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="currency_en">اسم العملة بالانجليزية</label>
                                        <input type="text" id="currency_en" name="currency_en"
                                               value="{{ $country->currency_en }}" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name_code">كود العملة</label>
                                        <input type="text" id="name_code" name="name_code"
                                               value="{{ $country->name_code }}" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="code">المفتاح</label>
                                        <input type="number" id="code" name="code" value="{{ $country->code }}"
                                               class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="number">عدد أرقام رقم الهاتف (بدون المفتاح)</label>
                                        <input type="number" id="number" name="number" value="{{ $country->number }}"
                                               class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="start_number">الرقم الذي يبدأ به رقم الهاتف</label>
                                        <input type="number" id="start_number" name="start_number"
                                               value="{{ $country->start_number }}" class="form-control" required>
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
                                       @if (isset($country->picture))
                                       data-default-file="{{ asset('pictures/countries/' . $country->picture ?? '') }}"
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
