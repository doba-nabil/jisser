@extends('dashboard.layout.master')
@section('title', 'كل البائعين')
@section('dashboard-main')
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table zero-configuration_1">
                                    <thead>
                                    <tr>
                                        <th>الاسم</th>
                                        <th>البريد الالكتروني</th>
                                        <th>رقم الهاتف</th>
                                        <th>الجنسية</th>
                                        <th>تاريخ التسجيل</th>
                                        <th>عدد الخدمات</th>
                                        <th>الحالة</th>
                                        <th>خيارات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($sellers as $seller)
                                        <tr>
                                            <td>
                                                @isset($seller->picture)
                                                    <img src="{{ asset('pictures/sellers/' . $seller->picture ?? '') }}"
                                                         alt="{{ $seller->name_ar ?? '' }}" class="imgInTable">
                                                @else
                                                    <img src="{{ asset('dashboard/images/placeholder.jpg') }}"
                                                         alt="{{ $seller->name_ar ?? '' }}" class="imgInTable">
                                                @endisset
                                                {{ $seller->first_name_ar . ' ' . $seller->last_name_ar }}
                                            </td>
                                            <td>{{ $seller->user->email ?? '' }}</td>
                                            <td>{{ $seller->user->phone ?? '' }}</td>
                                            <td>{{ $seller->user->country->name_ar ?? 'غير محدد' }}</td>
                                            <td>{{ $seller->created_at->toDateString() ?? 'غير محدد' }}</td>
                                            <td>
                                                <a href="{{ route('sellers.edit', $seller->id ?? '') }}" data-toggle="tooltip" data-placement="top" title="اضغط للمشاهدة">{{ count($seller->services) ?? 0 }}</a>
                                            </td>
                                            <td>
                                                @if ($seller->isActive == 1)
                                                    <i class="fa fa-check" style="color: green" data-toggle="tooltip"
                                                       data-placement="top" title="فعال"></i>
                                                @else
                                                    <i class="fa fa-times" style="color: red" data-toggle="tooltip"
                                                       data-placement="top" title="غير فعال"></i>
                                                @endif
                                            </td>
                                            <td>
                                                <ul class="list-inline text-center">
                                                    <li class="list-inline-item" data-toggle="tooltip"
                                                        data-placement="top" title="التفاصيل">
                                                        <a href="{{ route('sellers.show', $seller->id ?? '') }}"
                                                           class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                                    </li>
                                                    <li class="list-inline-item" data-toggle="tooltip"
                                                        data-placement="top" title="التعليقات">
                                                        <a href="{{ route('comment.show', $seller->id ?? '') }}"
                                                           class="btn btn-success btn-sm"><i class="fa fa-comments"></i></a>
                                                    </li>
                                                    <li class="list-inline-item" data-toggle="tooltip"
                                                        data-placement="top" title="حذف">
                                                        <form action="{{ route('sellers.destroy', $seller->id ?? '') }}"
                                                              method="post" id="delete_seller">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger btn-sm confirm"><i class="fa fa-trash"></i></button>
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
                {{ $sellers }}
            </div>
        </div>
    </section>
@endsection
