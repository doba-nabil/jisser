@extends('dashboard.layout.master')
@section('title', 'تعديل تفاصيل المدينة')
@section('dashboard-main')
    <form action="{{ route('cities.update', $city->id ?? '') }}" method="post">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-content">
                <div class="card-body card-dashboard">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="country_id">الدولة التابعة لها المدينة</label>
                                <select name="country_id" id="country_id" class="form-control select">
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id ?? '' }}"
                                        @if ($country->id == $city->country_id)
                                            selected
                                        @endif
                                        >{{ $country->name_ar ?? '' }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name_ar">اسم المدينة بالعربية</label>
                                <input type="text" id="name_ar" name="name_ar" value="{{ $city->name_ar }}"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name_en">اسم المدينة بالانجليزية</label>
                                <input type="text" id="name_en" name="name_en" value="{{ $city->name_en }}" required
                                       class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">تحديث</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
