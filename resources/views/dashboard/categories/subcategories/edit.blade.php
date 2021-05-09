@extends('dashboard.layout.master')
@section('title', 'تعديل تفاصيل التصنيف الفرعي')
@section('dashboard-main')
    <form action="{{ route('subcategories.update', $subcategory->id ?? '') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="form-group">
                                <label for="category_id">التصنيف الأب</label>
                                <select name="category_id" id="category_id" class="form-control select">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id ?? '' }}"
                                        @if ($category->id == $subcategory->category_id)
                                            selected
                                        @endif
                                        >{{ $category->name_ar }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name_ar">الاسم بالعربية</label>
                                <input type="text" class="form-control" id="name_ar" name="name_ar" value="{{ $subcategory->name_ar ?? '' }}" required>
                            </div>
                            <div class="form-group">
                                <label for="name_en">الاسم بالانجليزية</label>
                                <input type="text" class="form-control" id="name_en" name="name_en" value="{{ $subcategory->name_en ?? '' }}">
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
                                       @if (isset($subcategory->picture))
                                       data-default-file="{{ asset('pictures/subcategories/' . $subcategory->picture ?? '') }}"
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
