@extends('dashboard.layout.master')
@section('title', 'تفاصيل البائع')
@section('dashboard-main')
    <div class="page-users-view sellerInfo">
        <div class="card">
            <div class="card-header">
                <div class="card-title">البيانات الأساسية</div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="users-view-image">
                        @isset($seller->picture)
                            <img src="{{ asset('pictures/sellers/' . $seller->picture ?: '') }}"
                                 class="users-avatar-shadow w-100 rounded mb-2 pr-2 ml-1" alt="avatar">
                        @else
                            <img src="{{ asset('dashboard/images/placeholder.jpg') }}"
                                 class="users-avatar-shadow w-100 rounded mb-2 pr-2 ml-1" alt="avatar">
                        @endisset
                    </div>
                    <div class="col-12 col-sm-9 col-md-6 col-lg-5">
                        <table>
                            <tbody>
                            <tr>
                                <td class="font-weight-bold">اسم المستخدم</td>
                                <td>{{ $seller->user->name_ar ?: 'غير محدد' }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">الاسم</td>
                                <td>{{ $seller->first_name_ar . ' ' . $seller->last_name_ar }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">البريد الالكتروني</td>
                                <td>{{ $seller->user->email ?: 'غير محدد' }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">الحالة</td>
                                <td>{{ $seller->isActive == 1 ? 'فعال' : 'غير فعال' }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-12 col-md-12 col-lg-5">
                        <table class="ml-0 ml-sm-0 ml-lg-0">
                            <tbody>
                            <tr>
                                <td class="font-weight-bold">رقم الهاتف</td>
                                <td>{{ $seller->user->phone ?: 'غير محدد' }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">الدولة</td>
                                <td>{{ $seller->user->country->name_ar ?: 'غير محدد' }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">المدينة</td>
                                <td>{{ $seller->user->city->name_ar ?: 'غير محدد' }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">عدد الخدمات</td>
                                <td>0</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title mb-2">نبذة عن البائع</div>
                    </div>
                    <div class="card-body">
                        <p>{{ $seller->text_ar ?: '' }}</p>
                        <p>{{ $seller->about_ar ?: '' }}</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="card-title mb-2">اللغات</div>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled languages">
                            @if (count($seller->languages) > 0)
                                @foreach ($seller->languages as $languages)
                                    <li>
                                        {{ $languages->name ?: '' }}
                                        <span>{{ $languages->level ?: '' }}</span>
                                    </li>
                                @endforeach
                            @else
                                <li>لا يوجد لغات لهاذا البائع</li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="card-title mb-2">المهارات</div>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled languages">
                            @if (count($seller->skills) > 0)
                                @foreach ($seller->skills as $skill)
                                    <li>
                                        {{ $skill->name ?: '' }}
                                        <span>{{ $skill->level ?: '' }}</span>
                                    </li>
                                @endforeach
                            @else
                                <li>لا يوجد مهارات لهاذا البائع</li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="card-title mb-2">الشهادات</div>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled languages">
                            @if (count($seller->certifications) > 0)
                                @foreach ($seller->certifications as $certification)
                                    <li>
                                        {{ $certification->type ?: '' }} /
                                        {{ $certification->from ?: '' }}
                                        <span>{{ $certification->year ?: '' }}</span>
                                    </li>
                                @endforeach
                            @else
                                <li>لا يوجد شهادات لهاذا البائع</li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title mb-2">التواصل الاجتماعي</div>
                    </div>
                    <div class="card-body">
                        <table>
                            <tbody>
                            <tr>
                                <td class="font-weight-bold">فيسبوك</td>
                                <td>{{ $seller->facebook ?: 'غير محدد' }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">توتير</td>
                                <td>{{ $seller->twitter ?: 'غير محدد' }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">انستاجرام</td>
                                <td>{{ $seller->instagram ?: 'غير محدد' }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">يوتيوب</td>
                                <td>{{ $seller->youtube ?: 'غير محدد' }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">لينكد ان</td>
                                <td>{{ $seller->linkedin ?: 'غير محدد' }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">ستاك اوفر فلو</td>
                                <td>{{ $seller->stackoverflow ?: 'غير محدد' }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">الموقع الشخصي</td>
                                <td>{{ $seller->website ?: 'غير محدد' }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="card-title mb-2">الوظائف</div>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled languages">
                            @if (count($seller->occupations) > 0)
                                @foreach ($seller->occupations as $occupation)
                                    <li>
                                        {{ $occupation->category->name_ar ?: '' }} /
                                        {{ $occupation->subcategory->name_ar ?: '' }}
                                        <span>{{ $occupation->from ?: '' }} - {{ $occupation->to ?: '' }}</span>
                                    </li>
                                @endforeach
                            @else
                                <li>لا يوجد وظائف لهاذا البائع</li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="card-title mb-2">التعليم</div>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled languages">
                            @if (count($seller->educations) > 0)
                                @foreach ($seller->educations as $education)
                                    <li>
                                        {{ $education->university_name ?: '' }} /
                                        {{ $education->major ?: '' }} ({{ $education->title ?: ''}})
                                        <span>{{ $education->country->name_ar ?: '' }}
                                            - {{ $education->year ?: '' }}</span>
                                    </li>
                                @endforeach
                            @else
                                <li>لا يوجد شهادات لهاذا البائع</li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
