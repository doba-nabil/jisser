@extends('dashboard.layout.master')
@section('title', 'التعليقات على البائع ' . $seller->first_name_ar)
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
                                        <th>المعلق</th>
                                        <th>البريد الالكتروني</th>
                                        <th>رقم الهاتف</th>
                                        <th>التقييم</th>
                                        <th>الحالة</th>
                                        <th>خيارات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($comments as $comment)
                                        <tr>
                                            <td>
                                                @isset($comment->user->picture)
                                                    <img src="{{ asset('pictures/users/' . $comment->user->picture ?? '') }}"
                                                         alt="{{ $comment->user->name_ar ?? '' }}" class="imgInTable">
                                                @else
                                                    <img src="{{ asset('dashboard/images/placeholder.jpg') }}"
                                                         alt="{{ $comment->user->name_ar ?? '' }}" class="imgInTable">
                                                @endisset
                                                    <a href="{{ route('users.edit', $comment->user->id ?? '') }}">{{ $comment->user->name_ar ?? 'غير محدد' }}</a>
                                            </td>
                                            <td>{{ $comment->user->email ?? 'غير محدد' }}</td>
                                            <td>{{ $comment->user->phone ?? 'غير محدد' }}</td>
                                            <td>{{ $comment->rate ?? 'غير محدد' }}</td>
                                            <td>
                                                @if ($comment->isActive == 1)
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
                                                        data-placement="top" title="تعديل">
                                                        <a href="{{ route('comment.edit', $comment->id ?? '') }}"
                                                           class="btn btn-info btn-sm"><i
                                                                    class="fa fa-edit"></i></a>
                                                    </li>
                                                    <li class="list-inline-item" data-toggle="tooltip"
                                                        data-placement="top" title="حذف">
                                                        <form action="{{ route('comment.destroy', $comment->id ?? '') }}"
                                                              method="post" id="delete_comment_seller">
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
                {{ $comments }}
            </div>
        </div>
    </section>
@endsection
