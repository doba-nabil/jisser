@extends('dashboard.layout.master')
@section('title', 'كل الصفحات')
@section('dashboard-main')
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <ul class="list-inline text-center">
                    <li class="list-inline-item"><a href="{{ route('pages.create') }}" class="btn btn-primary">اضافة صفحة جديدة</a></li>
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
                                        <th>عنوان الصفحة</th>
                                        <th>تاريخ الاضافة</th>
                                        <th style="width: 20%">خيارات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($pages as $page)
                                        <tr>
                                            <td>
                                                @isset($page->picture)
                                                    <img src="{{ asset('pictures/pages/' . $page->picture ?? '') }}"
                                                         alt="{{ $page->title_ar ?? '' }}" class="imgInTable">
                                                @else
                                                    <img src="{{ asset('dashboard/images/placeholder.jpg') }}"
                                                         alt="{{ $page->title_ar ?? '' }}" class="imgInTable">
                                                @endisset
                                                {{ $page->title_ar ?? '' }}
                                            </td>
                                            <td>{{ $page->created_at->toDateString() }}</td>
                                            <td>
                                                <ul class="list-inline text-center">
                                                    <li class="list-inline-item" data-toggle="tooltip"
                                                        data-placement="top" title="تعديل">
                                                        <a href="{{ route('pages.edit', $page->id ?? '') }}"
                                                           class="btn btn-info btn-sm"><i
                                                                    class="fa fa-edit"></i></a>
                                                    </li>
                                                    <li class="list-inline-item" data-toggle="tooltip"
                                                        data-placement="top" title="حذف">
                                                        <form action="{{ route('pages.destroy', $page->id ?? '') }}"
                                                              method="post" id="delete_page">
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
                {{ $pages }}
            </div>
        </div>
    </section>
@endsection
