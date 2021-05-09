@extends('dashboard.layout.master')
@section('title', 'اعدادات الموقع')
@section('dashboard-main')
    <form action="{{ route('options') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">الاعدادات الأساسية</div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name_ar">اسم الموقع بالعربية</label>
                                        <input type="text" id="name_ar" name="name_ar" class="form-control"
                                               value="{{ $options->name_ar }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name_en">اسم الموقع بالانجليزية</label>
                                        <input type="text" id="name_en" name="name_en" class="form-control"
                                               value="{{ $options->name_en }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="text_ar">وصف الموقع بالعربية</label>
                                <textarea name="text_ar" id="text_ar" cols="30" rows="3"
                                          class="form-control">{{ $options->text_ar }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="text_en">وصف الموقع بالانجليزية</label>
                                <textarea name="text_en" id="text_en" cols="30" rows="3"
                                          class="form-control">{{ $options->text_en }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="rights">حقوق الموقع</label>
                                <input type="text" id="rights" name="rights" class="form-control"
                                       value="{{ $options->rights }}">
                            </div>
                            <div class="form-group">
                                <label for="percent">نسبة الموقع</label>
                                <input type="number" id="percent" name="percent" class="form-control"
                                       value="{{ $options->percent }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="form-group">
                                <label for="logo">لوجو الموقع</label>
                                <input type="file" id="input-file-now" class="dropify" name="logo"
                                       @if (isset($options->logo))
                                       data-default-file="{{ asset('pictures/options/' . $options->logo ?: '') }}"
                                        @endif
                                />
                            </div>
                            <div class="form-group">
                                <label for="i_icon">fav icon</label>
                                <input type="file" id="input-file-now1" class="dropify" name="i_icon"
                                       @if (isset($options->i_icon))
                                       data-default-file="{{ asset('pictures/options/' . $options->i_icon ?: '') }}"
                                        @endif
                                />
                            </div>
                            <div class="form-group">
                                <label for="video">
                                    فيديو الــ Intro
                                    <br>
                                    @isset($options->intro_video)
                                        <a type="button" class="btn btn-success text-white" data-toggle="modal" data-target="#serviceVideo">مشاهدة الفيديو</a>
                                    @endisset
                                </label>
                                <input type="file" class="form-control" name="video" id="video">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">اعدادات التواصل</div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">البريد الالكتروني</label>
                                        <input type="email" id="email" name="email" class="form-control" value="{{ $options->email }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">رقم الهاتف</label>
                                        <input type="text" id="phone" name="phone" class="form-control" value="{{ $options->phone }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address">العنوان</label>
                                <input type="text" id="address" name="address" class="form-control" value="{{ $options->address }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-block">تحديث</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @isset($options->intro_video)
        <div class="modal fade" id="serviceVideo" tabindex="-1" aria-labelledby="video" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <video controls style="width: 100%; height: 350px; object-fit: fill">
                            <source src="{{ asset('videos/options/' . $options->intro_video ?: '') }}">
                        </video>
                    </div>
                </div>
            </div>
        </div>
    @endisset
@endsection
