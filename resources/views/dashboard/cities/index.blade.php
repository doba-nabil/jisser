@extends('dashboard.layout.master')
@section('title', 'كل المدن')
@section('dashboard-main')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">اضافة مدينة جديدة</div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <form action="{{ route('cities.store') }}" method="post" id="create_city" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="country_id">الدولة التابعة لها المدينة</label>
                                <select name="country_id" id="country_id" class="select form-control">
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id ?? '' }}">{{ $country->name_ar ?? '' }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name_ar">اسم المدينة بالعربية</label>
                                <input type="text" id="name_ar" name="name_ar" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="name_en">اسم المدينة بالانجليزية</label>
                                <input type="text" id="name_en" name="name_en" required class="form-control">
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
                                            @include('dashboard.cities.loop')
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
