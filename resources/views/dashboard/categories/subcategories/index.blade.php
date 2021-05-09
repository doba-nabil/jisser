@extends('dashboard.layout.master')
@section('title', 'كل التصنيفات الفرعية')
@section('dashboard-main')
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <ul class="list-inline text-center">
                    <li class="list-inline-item"><a type="button" class="btn btn-primary" data-toggle="modal" data-target="#createSubcategory" style="color: white">اضافة تصنيف فرعي جديد</a></li>
                </ul>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="row">
                                @foreach ($categories as $category)
                                    <div class="col-md-4">
                                        <div class="categorySubs">
                                            <h3>{{ $category->name_ar ?? '' }}</h3>
                                            <ul class="list-inline text-center">
                                                @foreach ($category->subcategories as $subcategory)
                                                    <li class="list-inline-item">
                                                        <form action="{{ route('subcategories.destroy', $subcategory->id ?? '') }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="confirm"><i class="fa fa-trash"></i></button>
                                                        </form>
                                                        <a href="{{ route('subcategories.edit', $subcategory->id ?? '') }}">{{ $subcategory->name_ar ?? '' }}</a>
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
                <form action="{{ route('subcategories.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="category_id">التصنيف الأب</label>
                                    <select name="category_id" id="category_id" class="form-control select">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id ?? '' }}">{{ $category->name_ar ?? '' }}</option>
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
