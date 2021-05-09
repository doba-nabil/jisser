@extends('dashboard.layout.master')
@section('title', 'كل الرسائل')
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
                                        <th>تاريخ الارسال</th>
                                        <th style="width: 20%">خيارات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($contacts as $contact)
                                        <tr>
                                            <td>
                                                {{ $contact->name ?? 'غير محدد' }}
                                                @if ($contact->seen == 0)
                                                    <span class="badge badge-info badge-sm" style="font-size: 10px; padding: 3px 6px;">جديد</span>
                                                @endif
                                            </td>
                                            <td>{{ $contact->email ?? '' }}</td>
                                            <td>{{ $contact->phone ?? '' }}</td>
                                            <td>{{ $contact->created_at->toDateString() }}</td>
                                            <td>
                                                <ul class="list-inline text-center">
                                                    <li class="list-inline-item" data-toggle="tooltip"
                                                        data-placement="top" title="مشاهدة">
                                                        <a href="{{ route('contacts.show', $contact->id ?? '') }}"
                                                           class="btn btn-info btn-sm"><i
                                                                    class="fa fa-eye"></i></a>
                                                    </li>
                                                    <li class="list-inline-item" data-toggle="tooltip"
                                                        data-placement="top" title="حذف">
                                                        <form action="{{ route('contacts.destroy', $contact->id ?? '') }}"
                                                              method="post" id="delete_contact">
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
                {{ $contacts }}
            </div>
        </div>
    </section>
@endsection
