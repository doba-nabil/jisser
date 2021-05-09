@extends('dashboard.layout.master')
@section('title', 'كل التصنيفات')
@section('dashboard-main')
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <ul class="list-inline text-center">
                    <li class="list-inline-item"><a type="button" class="btn btn-primary" data-toggle="modal" data-target="#createCategory" style="color: white">اضافة تصنيف جديد</a></li>
                </ul>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="row">
                                @foreach ($categories as $category)
                                    <div class="col-md-3">
                                        <div class="category">
                                            @isset($category->picture)
                                                <img src="{{ asset('pictures/categories/' . $category->picture) }}" alt="{{ $category->name_ar }}">
                                            @else
                                                <img src="{{ asset('dashboard/images/placeholder.jpg') }}" alt="{{ $category->name_ar }}">
                                            @endisset
                                            <h3>{{ $category->name_ar }}</h3>
                                            <ul class="list-unstyled">
                                                <li><a href="{{ route('categories.edit', $category->id ?? '') }}"><i class="fa fa-edit"></i></a></li>
                                                <li>
                                                    <form action="{{ route('categories.destroy', $category->id ?? '') }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="confirm"><i class="fa fa-trash"></i></button>
                                                    </form>
                                                </li>
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
    <div class="modal fade" id="createCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">اضافة تصنيف جديد</h5>
                </div>
                <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="name_ar">الاسم بالعربية</label>
                                    <input type="text" id="name_ar" name="name_ar" required class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="name_en">الاسم بالانجليزية</label>
                                    <input type="text" id="name_en" name="name_en" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="text_ar">الوصف بالعربية</label>
                                    <input type="text" id="text_ar" name="text_ar" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="text_en">الوصف بالانجليزية</label>
                                    <input type="text" id="text_en" name="text_en" class="form-control">
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
