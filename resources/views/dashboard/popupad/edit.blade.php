@extends('dashboard.layout.master')
@section('title', 'تعديل الاعلان المنبثق')
@section('dashboard-main')
    <form action="{{ route('popupad.update', 1) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="form-group">
                                <label for="link">الرابط</label>
                                <input name="link" id="link" value="{{ $ad->link ?: '' }}" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="form-group">
                                <label for="active">حالة الاعلان المنبثق</label>
                                <select name="active" id="active" class="form-control select">
                                    <option @if($ad->active == 1) selected @endif value="1">مفعل</option>
                                    <option @if($ad->active == 0) selected @endif value="0">غير مفعل</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="picture_ar">الصورة في اللغه العربية</label>
                                        <input type="file" id="input-file-now" class="dropify" name="picture_ar"
                                               @if (isset($ad->picture_ar))
                                               data-default-file="{{ asset('pictures/pop_ads/' . $ad->picture_ar ?: '') }}"
                                                @endif
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="picture_en">الصورة في اللغه الانجليزية</label>
                                        <input type="file" id="input-file-now1" class="dropify" name="picture_en"
                                               @if (isset($ad->picture_en))
                                               data-default-file="{{ asset('pictures/pop_ads/' . $ad->picture_en ?: '') }}"
                                                @endif
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-block">تحديث</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
