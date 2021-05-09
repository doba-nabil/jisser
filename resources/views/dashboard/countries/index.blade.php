@extends('dashboard.layout.master')
@section('title', 'كل الدول')
@section('dashboard-main')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">اضافة دولة جديدة</div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <form action="{{ route('countries.store') }}" method="post" id="create_country" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name_ar">اسم الدولة بالعربية</label>
                                        <input type="text" id="name_ar" name="name_ar" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name_en">اسم الدولة بالانجليزية</label>
                                        <input type="text" id="name_en" name="name_en" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="currency_ar">اسم العملة بالعربية</label>
                                        <input type="text" id="currency_ar" name="currency_ar" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="currency_en">اسم العملة بالانجليزية</label>
                                        <input type="text" id="currency_en" name="currency_en" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name_code">كود العملة</label>
                                        <input type="text" id="name_code" name="name_code" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="code">مفتاح الدولة</label>
                                        <input type="number"id="code" name="code" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="number">عدد أرقام رقم الهاتف (بدون المفتاح)</label>
                                <input type="number" id="number" name="number" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="start_number">الرقم الذي يبدأ به رقم الهاتف</label>
                                <input type="number" id="start_number" name="start_number" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <input type="file" id="input-file-now" class="dropify" name="picture"/>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success">اضافة الدولة</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
{{--            <section id="basic-datatable">--}}
            <section>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">كل الدول المضافة</div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <div id="loop">
                                            @include('dashboard.countries.loop')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
