@extends('dashboard.layout.master')
@section('title', 'تفاصيل الطلب')
@section('dashboard-main')
    <div class="page-users-view sellerInfo" id="statistics-card">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-9 col-md-4 col-lg-6">
                                <table>
                                    <tbody>
                                    <tr>
                                        <td class="font-weight-bold">الخدمة</td>
                                        <td>{{ $order->service->title_ar ?? 'غير محدد' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">مقدم الخدمة</td>
                                        <td>{{ $order->seller->first_name_ar . ' ' . $order->last_name_ar }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">البريد الالكتروني</td>
                                        <td>{{ $order->seller->user->email ?? 'غير محدد' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">رقم الهاتف</td>
                                        <td>{{ $order->seller->user->phone ?? 'غير محدد' }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-12 col-sm-9 col-md-4 col-lg-6">
                                <table class="ml-0 ml-sm-0 ml-lg-0">
                                    <tbody>
                                    <tr>
                                        <td class="font-weight-bold">طالب الخدمة</td>
                                        <td>{{ $order->user->phone ?? 'غير محدد' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">البريد الالكتروني</td>
                                        <td>{{ $order->user->email ?? 'غير محدد' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">رقم الهاتف</td>
                                        <td>{{ $order->user->phone ?? 'غير محدد' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">الدولة</td>
                                        <td>{{ $order->user->country->name_ar ?? 'غير محدد' }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-content">
                        <div class="card-body">
                            <i class="fa fa-money text-primary" style="font-size: 40px; margin-bottom: 20px;"></i>
                            <ul class="list-unstyled priceList">
                                <li>{{ $order->package->title_ar ?? 'سعر الخدمة' }}</li>
                                <li>{{ $order->item_price ?? '' }}$</li>
                            </ul>
                            <ul class="list-unstyled priceList">
                                <li>الكمية</li>
                                <li>{{ $order->qty ?? '' }}</li>
                            </ul>
                            <ul class="list-unstyled priceList">
                                <li class="text-bold-700">سعر الخدمات</li>
                                <li class="text-bold-700">{{ $order->item_price*$order->qty ?? '' }}$</li>
                            </ul>
                            <ul class="list-unstyled priceList">
                                <li>نسبة الموقع</li>
                                <li>{{ $order->percent ?? '' }}$</li>
                            </ul>
                            <ul class="list-unstyled priceList">
                                <li class="text-bold-700">سعر الطلب الكلي</li>
                                <li class="text-bold-700">{{ $order->total_price ?? '' }}$</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
