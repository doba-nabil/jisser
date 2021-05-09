@extends('dashboard.layout.master')
@section('title', 'كل التصنيفات الفرعية')
@section('dashboard-main')
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <ul class="list-inline text-center">
                    <li class="list-inline-item"><a type="button" class="btn btn-primary" data-toggle="modal" data-target="#createSubcategory" style="color: white">اضافة تقسيم جديد</a></li>
                </ul>
            </div>
            <div class="col-12">
                @foreach ($categories as $category)
                    <div class="card">
                        <div class="card-header">
                            {{ $category->name_ar ?? '' }}
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard">
                                <div class="row">
                                    @foreach ($category->subcategories as $subcategory)
                                        <div class="col-md-4">
                                            <div class="categorySubs">
                                                <h3>{{ $subcategory->name_ar ?? '' }}</h3>
                                                <ul class="list-inline text-center">
                                                    @foreach ($subcategory->segments as $segment)
                                                        <li class="list-inline-item">
                                                            <form action="{{ route('segments.destroy', $segment->id ?? '') }}" method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="confirm"><i class="fa fa-trash"></i></button>
                                                            </form>
                                                            <a href="{{ route('segments.edit', $segment->id ?? '') }}">{{ $segment->name_ar ?? '' }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- create modal -->
    <div class="modal fade" id="createSubcategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">اضافة تصنيف جديد</h5>
                </div>
                <form action="{{ route('segments.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="subcategory_id">التصنيف الأب</label>
                                    <select name="subcategory_id" id="subcategory_id" class="form-control select">
                                        @foreach ($subcategories as $subcategory)
                                            <option value="{{ $subcategory->id ?? '' }}">{{ $subcategory->name_ar ?? '' }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name_ar">الاسم بالعربية</label>
                                    <input type="text" id="name_ar" name="name_ar" required class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="name_en">الاسم بالانجليزية</label>
                                    <input type="text" id="name_en" name="name_en" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group" style="margin-top: 25px;">
                                    <input type="file" id="input-file-now" class="dropify" name="picture"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">اضافة</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
