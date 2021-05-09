@extends('dashboard.layout.master')
@section('title', 'تفاصيل الرسالة')
@section('dashboard-main')
    <div class="card">
        <div class="card-content">
            <div class="card-body card-dashboard">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name">الاسم بالكامل</label>
                            <input type="text" class="form-control" id="name" value="{{ $contact->name }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="email">البريد الاكتروني</label>
                            <input type="text" class="form-control" id="email" value="{{ $contact->email }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="phone">رقم الجوال</label>
                            <input type="text" class="form-control" id="phone" value="{{ $contact->phone }}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text">الرسالة</label>
                    <textarea name="text" id="text" rows="10" class="form-control">{{ $contact->text }}</textarea>
                </div>
            </div>
        </div>
    </div>
@endsection
