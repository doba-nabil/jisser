@extends('dashboard.layout.master')
@section('title', 'كل الأعضاء')
@section('dashboard-main')
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <ul class="list-inline text-center">
                    <li class="list-inline-item"><a href="{{ route('users.create') }}" class="btn btn-primary">اضافة عضو جديد</a></li>
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
                                        <th>الاسم</th>
                                        <th>البريد الالكتروني</th>
                                        <th>رقم الهاتف</th>
                                        <th>الجنسية</th>
                                        <th>الحالة</th>
                                        <th>بائع</th>
                                        <th>خيارات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>
                                                @isset($user->picture)
                                                    <img src="{{ asset('pictures/users/' . $user->picture ?? '') }}"
                                                         alt="{{ $user->name_ar ?? '' }}" class="imgInTable">
                                                @else
                                                    <img src="{{ asset('dashboard/images/placeholder.jpg') }}"
                                                         alt="{{ $user->name_ar ?? '' }}" class="imgInTable">
                                                @endisset
                                                {{ $user->name_ar ?? '' }}
                                            </td>
                                            <td>{{ $user->email ?? '' }}</td>
                                            <td>{{ $user->phone ?? '' }}</td>
                                            <td>{{ $user->country->name_ar ?? 'غير محدد' }}</td>
                                            <td>
                                                @if ($user->isActive == 1)
                                                    <i class="fa fa-check" style="color: green" data-toggle="tooltip"
                                                       data-placement="top" title="فعال"></i>
                                                @else
                                                    <i class="fa fa-times" style="color: red" data-toggle="tooltip"
                                                       data-placement="top" title="غير فعال"></i>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($user->isSeller == 1)
                                                    <i class="fa fa-check" style="color: green" data-toggle="tooltip"
                                                       data-placement="top" title="بائع"></i>
                                                @else
                                                    <i class="fa fa-times" style="color: red" data-toggle="tooltip"
                                                       data-placement="top" title="عضو عادي"></i>
                                                @endif
                                            </td>
                                            <td>
                                                <ul class="list-inline text-center">
                                                    <li class="list-inline-item" data-toggle="tooltip"
                                                        data-placement="top" title="تعديل">
                                                        <a href="{{ route('users.edit', $user->id ?? '') }}"
                                                           class="btn btn-info btn-sm"><i
                                                                    class="fa fa-edit"></i></a>
                                                    </li>
                                                    <li class="list-inline-item" data-toggle="tooltip"
                                                        data-placement="top" title="حذف">
                                                        <form action="{{ route('users.destroy', $user->id ?? '') }}"
                                                              method="post" id="delete_user">
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
                {{ $users }}
            </div>
        </div>
    </section>
@endsection
