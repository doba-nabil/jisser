@extends('dashboard.layout.master')
@section('title', isset($request) ? 'كل الطلبات' : 'كل الخدمات')
@section('dashboard-head')
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/css/app-ecommerce-shop.css') }}">
@endsection
@section('dashboard-main')
    <section>
        <div class="row">
            <div class="col-12">
                <ul class="list-inline text-center">
                    <li class="list-inline-item"><a href="{{ route('services.create') }}" class="btn btn-primary">
                            {{ isset($request) ? 'اضافة طلب جديد' : 'اضافة خدمة جديدة' }}
                        </a></li>
                </ul>
            </div>
        </div>
        <div class="row" style="margin-top: 40px;">
            @foreach ($services as $service)
                <div class="col-xl-3 col-md-6 col-sm-12">
                    <div class="card" style="margin-bottom: 30px;">
                        <div class="card-content">
                            @include('dashboard.serviceItem')
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-12 text-center">
                {{ $services }}
            </div>
        </div>
    </section>
@endsection
