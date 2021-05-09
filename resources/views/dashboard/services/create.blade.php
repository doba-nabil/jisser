@extends('dashboard.layout.master')
@section('title', 'اضافة خدمة جديدة')
@section('dashboard-head')
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/file-upload-with-preview@4.0.2/dist/file-upload-with-preview.min.css">
@endsection
@section('dashboard-main')
    <form action="{{ route('services.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-content">
                        <div class="card-header">بيانات الخدمة</div>
                        <div class="card-body card-dashboard">
                            <div class="form-group">
                                <label for="title_ar">العنوان بالعربية</label>
                                <input type="text" class="form-control" id="title_ar" name="title_ar"
                                       value="{{ old('title_ar') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="title_en">العنوان بالانجليزية</label>
                                <input type="text" class="form-control" id="title_en" name="title_en"
                                       value="{{ old('title_en') }}">
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="category_id">التصنيف الرئيسي</label>
                                        <select name="category_id" id="category_id" class="form-control select">
                                            <option value="">اختر التصنيف الرئيسي</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id ?: '' }}">{{ $category->name_ar }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="subcategory_id">التصنيف الفرعي</label>
                                        <select name="subcategory_id" id="subcategory_id" class="form-control select">

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="segment_id">التقسيم</label>
                                        <select name="segment_id" id="segment_id" class="form-control select">

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="video">فيديو الاعلان</label>
                                <input type="file" class="form-control" name="video" id="video">
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
                                <input type="file" id="input-file-now" class="dropify" name="picture"/>
                            </div>
                            <div class="form-group">
                                <select name="seller_id" id="seller_id" class="form-control select">
                                    @foreach ($sellers as $seller)
                                        <option value="{{ $seller->id ?: '' }}">{{ $seller->first_name_ar . ' ' . $seller->last_name_ar}} ({{ $seller->user->name_ar ?: '' }})</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="isActive" id="isActive" class="form-control select">
                                    <option value="1">مفعل</option>
                                    <option value="0">غير مفعل</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="isService" id="isService" class="form-control select">
                                    <option value="1">تقديم خدمة</option>
                                    <option value="0">طلب خدمة</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="price" placeholder="السعر المقدر (اذا كان طلب خدمة)">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-block">اضافة</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">الوسوم</div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="form-group">
                                <label for="tags_ar">الوسوم بالعربية</label>
                                <input type="text" class="form-control" id="tags_ar" name="tags_ar"
                                       value="{{ old('tags_ar') }}" placeholder="افصل بين الوسم والاخر بالعلامة -">
                            </div>
                            <div class="form-group">
                                <label for="tags_en">الوسوم بالانجليزية</label>
                                <input type="text" class="form-control" id="tags_en" name="tags_en"
                                       value="{{ old('tags_en') }}" placeholder="افصل بين الوسم والاخر بالعلامة -">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="form-group">
                                <label for="text_ar">وصف الخدمة بالعربية</label>
                                <textarea name="text_ar" id="text_ar" cols="30" rows="6" class="form-control summernote"
                                          required>{{ old('text_ar') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="text_en">وصف الخدمة بالانجليزية</label>
                                <textarea name="text_en" id="text_en" cols="30" rows="6"
                                          class="form-control summernote">{{ old('text_en') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="custom-file-container" data-upload-id="myUniqueUploadId">
                                <label><a href="javascript:void(0)" class="custom-file-container__image-clear"
                                          title="Clear Image"></a></label>
                                <label class="custom-file-container__custom-file">
                                    <input type="file" class="custom-file-container__custom-file__custom-file-input"
                                           accept="*" multiple aria-label="Choose File" name="images[]">
                                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                                </label>
                                <div class="custom-file-container__image-preview"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('dashboard-footer')
    <script src="https://unpkg.com/file-upload-with-preview@4.0.2/dist/file-upload-with-preview.min.js"></script>
    <script>
      var upload = new FileUploadWithPreview('myUniqueUploadId', {
        showDeleteButtonOnImages: true,
        maxFileCount: 2,
        text: {
          chooseFile: '',
          browse: 'اضغط هنا لاختيار الصور',
          selectedCount: 'Custom Files Selected Copy',
        },

      })
    </script>
@endsection
