@extends('dashboard.layout.master')
@section('title', 'تفاصيل التعليق')
@section('dashboard-main')
    <form action="{{ route('comment.update', $comment->id ?? '') }}" method="post">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-content">
                <div class="card-body card-dashboard">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="service">البائع</label>
                                <input type="text" class="form-control" id="service" name="service" value="{{ $comment->seller->first_name_ar . ' ' . $comment->seller->last_name_ar ?? '' }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name_ar">المعلق</label>
                                <input type="text" class="form-control" id="name_ar" name="name_ar" value="{{ $comment->user->name_ar ?? '' }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="isActive">الحالة</label>
                                <select name="isActive" id="isActive" class="form-control select">
                                    <option value="1" @if ($comment->isActive == 1) selected @endif>مفعل</option>
                                    <option value="0" @if ($comment->isActive == 0) selected @endif>غير مفعل</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="isActive">التعليق</label>
                        <textarea name="text" id="text" cols="30" rows="4" required class="form-control">{{ $comment->text }}</textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">تحديث</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
