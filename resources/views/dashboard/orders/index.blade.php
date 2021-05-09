@extends('dashboard.layout.master')
@section('title', 'طلبات الشراء')
@section('dashboard-main')
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <ul class="list-inline text-center">
                    <li class="list-inline-item"><a href="" class="btn btn-primary">الطلبات الجديدة</a></li>
                </ul>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table zero-configuration_1">
                                    <thead>
                                    <tr>
                                        <th>الخدمة</th>
                                        <th>مقدم الخدمة</th>
                                        <th>طالب الخدمة</th>
                                        <th>الكمية</th>
                                        <th>نسبة الموقع</th>
                                        <th>سعر الطلب الكلي</th>
                                        <th>خيارات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td><a href="{{ route('services.edit', $order->service->id ?? '') }}">{{ mb_strimwidth($order->service->title_ar ?? '', 0, 40, '...') }}</a>
                                                @if ($order->isSeen == 0)
                                                    <span class="badge badge-success badge-sm" style="font-size: 10px; padding: 3px 6px; background: #28C76F">جديد</span>
                                                @endif</td>
                                            <td><a href="{{ route('sellers.show', $order->seller->id ?? '') }}">{{ mb_strimwidth($order->seller->user->name_ar ?? '', 0, 40, '...') }}</a></td>
                                            <td><a href="{{ route('users.edit', $order->user->id ?? '') }}">{{ mb_strimwidth($order->user->name_ar ?? '', 0, 40, '...') }}</a></td>
                                            <td>{{ $order->qty ?? 'غير محدد' }}</td>
                                            <td>{{ $order->percent ?? 'غير محدد' }}</td>
                                            <td>{{ $order->totla_price ?? 'غير محدد' }}</td>
                                            <td>
                                                <ul class="list-inline text-center">
                                                    <li class="list-inline-item" data-toggle="tooltip"
                                                        data-placement="top" title="مشاهدة">
                                                        <a href="{{ route('orders.edit', $order->id ?? '') }}"
                                                           class="btn btn-info btn-sm"><i
                                                                    class="fa fa-eye"></i></a>
                                                    </li>
                                                    <li class="list-inline-item" data-toggle="tooltip"
                                                        data-placement="top" title="حذف">
                                                        <form action="{{ route('orders.destroy', $order->id ?? '') }}"
                                                              method="post" id="delete_order">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger btn-sm confirm"><i
                                                                        class="fa fa-trash"></i></button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 text-center">
                {{ $orders }}
            </div>
        </div>
    </section>
@endsection
