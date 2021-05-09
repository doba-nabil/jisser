@extends('dashboard.layout.master')
@section('title', 'طلبات العروض على هذا الطلب')
@section('dashboard-main')
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        @if (count($service->offers) > 0)
                            <ul class="list-unstyled offers">
                                @foreach ($service->offers as $offer)
                                    <li data-toggle="modal" data-target="#offer_{{ $offer->id ?? '' }}" @if ($offer->isAccepted == 1)
                                        style="background: green; color: #FFFFFF"
                                    @endif>
                                        عرض مقدم
                                        من {{ $offer->seller->first_name_ar . ' ' . $offer->seller->last_name_ar }}
                                        بقيمة
                                        {{ $offer->price ?? '' }} {{ $service->user->country->currency_ar ?? '' }}
                                        @if ($offer->isNegotiable == 1)
                                            - قابل للتفاواض
                                        @else
                                            - غير قابل للتفاوض
                                        @endif
                                        <span class="pull-right">{{ $offer->created_at->toDateString() ?? '' }}</span>
                                    </li>
                                    <div class="modal fade" id="offer_{{ $offer->id ?? '' }}" tabindex="-1"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <p>{{ $offer->text ?? '' }}</p>
                                                    @isset($offer->file)
                                                        <a href="{{ asset('files/offers/' . $offer->file) }}"
                                                           class="btn btn-primary">تحميل الملف المرفق</a>
                                                    @endisset
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </ul>
                        @else
                            <p class="alert alert-danger">لا يوجد عروض على هذا الطلب</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="requester">
                            <div class="requesterImg">
                                <img src="{{ asset('pictures/services/' . $service->picture) }}" alt="">
                                <h1>{{ $service->title_ar ?? '' }}</h1>
                            </div>
                            <ul class="list-unstyled">
                                <li><span>صاحب الطلب:</span>{{ $service->user->name_ar ?? 'غير محدد' }}</li>
                                <li>
                                    <span>السعر المقدر:</span>{{ $service->price ?? 'غير محدد' }} {{ $service->user->country->currency_ar ?? 'ر.س' }}
                                </li>
                                <li><span>الدولة:</span>{{ $service->user->country->name_ar ?? 'غير محدد' }}</li>
                                <li><span>عدد الطلبات:</span>{{ count($service->offers) ?? '0' }}</li>
                                <li><span>تاريخ الاضافة:</span>{{ $service->created_at->toDateString() ?? 'غير محدد' }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
