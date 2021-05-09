@extends('dashboard.layout.master')
@section('title', 'تعديل تفاصيل التقسيم')
@section('dashboard-main')
    <form action="{{ route('segments.update', $segment->id ?? '') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="form-group">
                                <label for="category_id">التصنيف الأب</label>
                                <input type="text" disabled class="form-control" id="category_id" name="category_id" value="{{ $segment->category->name_ar ?? '' }}" required>
                            </div>
                            <div class="form-group">
                                <label for="subcategory_id">التصنيف الفرعي</label>
                                <select name="subcategory_id" id="subcategory_id" class="form-control select">
                                    @foreach ($subcategories as $subcategory)
                                        <option value="{{ $subcategory->id ?? '' }}"
                                        @if ($subcategory->id == $segment->subcategory_id)
                                            selected
                                        @endif
                                        >{{ $subcategory->name_ar }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name_ar">الاسم بالعربية</label>
                                <input type="text" class="form-control" id="name_ar" name="name_ar" value="{{ $segment->name_ar ?? '' }}" required>
                            </div>
                            <div class="form-group">
                                <label for="name_en">الاسم بالانجليزية</label>
                                <input type="text" class="form-control" id="name_en" name="name_en" value="{{ $segment->name_en ?? '' }}">
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
                                <input type="file" id="input-file-now" class="dropify" name="picture"
                                       @if (isset($segment->picture))
                                       data-default-file="{{ asset('pictures/segments/' . $segment->picture ?? '') }}"
                                        @endif
                                />
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
