@extends('dashboard.layout.master')
@section('title', 'تعديل تفاصيل الخدمة')
@section('dashboard-head')
    <link rel="stylesheet" type="text/css"
          href="https://unpkg.com/file-upload-with-preview@4.0.2/dist/file-upload-with-preview.min.css">
@endsection
@section('dashboard-main')
    <form action="{{ route('services.update', $service->id ?: '') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-content">
                        <div class="card-header">بيانات الخدمة</div>
                        <div class="card-body card-dashboard">
                            <div class="form-group">
                                <label for="title_ar">العنوان بالعربية</label>
                                <input type="text" class="form-control" id="title_ar" name="title_ar"
                                       value="{{ $service->title_ar ?: '' }}" required>
                            </div>
                            <div class="form-group">
                                <label for="title_en">العنوان بالانجليزية</label>
                                <input type="text" class="form-control" id="title_en" name="title_en"
                                       value="{{ $service->title_en ?: '' }}">
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="category_id">التصنيف الرئيسي</label>
                                        <select name="category_id" id="category_id" class="form-control select">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id ?: '' }}"
                                                        @if ($category->id == $service->category_id)
                                                        selected
                                                        @endif
                                                >{{ $category->name_ar }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="subcategory_id">التصنيف الفرعي</label>
                                        <select name="subcategory_id" id="subcategory_id" class="form-control select">
                                            @foreach ($subcategories as $subcategory)
                                                <option value="{{ $subcategory->id ?: '' }}"
                                                        @if ($subcategory->id == $service->subcategory_id)
                                                        selected
                                                        @endif
                                                >{{ $subcategory->name_ar }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="segment_id">التقسيم</label>
                                        <select name="segment_id" id="segment_id" class="form-control select">
                                            @foreach ($segments as $segment)
                                                <option value="{{ $segment->id ?: '' }}"
                                                        @if ($segment->id == $service->segment_id)
                                                        selected
                                                        @endif
                                                >{{ $segment->name_ar }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="video">
                                    فيديو الاعلان
                                    @isset($service->video)
                                        (<a type="button" data-toggle="modal" data-target="#serviceVideo">مشاهدة الفيديو
                                            الحالي</a>
                                        -
                                        <a href="{{ route('deleteID', ['type' => 1, 'id' => $service->id]) }}">حذف
                                            الفيديو</a>)
                                    @endisset
                                </label>
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
                                <input type="file" id="input-file-now" class="dropify" name="picture"
                                       @if (isset($service->picture))
                                       data-default-file="{{ asset('pictures/services/' . $service->picture ?: '') }}"
                                        @endif
                                />
                            </div>
                            <div class="form-group">
                                <select name="isActive" id="isActive" class="form-control select">
                                    <option value="1" @if ($service->isActive == 1) selected @endif>مفعل</option>
                                    <option value="0" @if ($service->isActive == 0) selected @endif>غير مفعل</option>
                                </select>
                            </div>
                            @if ($service->isService == 0)
                                <div class="form-group">
                                    <input type="text" class="form-control" name="price" value="{{ $service->price ?: '' }}" placeholder="السعر المقدر (اذا كان طلب خدمة)">
                                </div>
                            @endif
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-block">تحديث</button>
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
                            @if (count($service->arabicTags) > 0)
                                <div class="form-group">
                                    <ul class="list-inline tagList">
                                        @foreach ($service->arabicTags as $arabicTags)
                                            <li class="list-inline-item">
                                                <a href="{{ route('deleteID', ['type' => 2, 'id' => $arabicTags->id]) }}"><i
                                                            class="fa fa-trash"></i></a>
                                                {{ $arabicTags->name ?: '' }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="tags_en">الوسوم بالانجليزية</label>
                                <input type="text" class="form-control" id="tags_en" name="tags_en"
                                       value="{{ old('tags_en') }}" placeholder="افصل بين الوسم والاخر بالعلامة -">
                            </div>
                            @if (count($service->englishTags) > 0)
                                <div class="form-group">
                                    <ul class="list-inline tagList">
                                        @foreach ($service->englishTags as $englishTags)
                                            <li class="list-inline-item">
                                                <a href="{{ route('deleteID', ['type' => 2, 'id' => $englishTags->id]) }}"><i
                                                            class="fa fa-trash"></i></a>
                                                {{ $englishTags->name ?: '' }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
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
                                          required>{{ $service->text_ar ?: '' }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="text_en">وصف الخدمة بالعربية</label>
                                <textarea name="text_en" id="text_en" cols="30" rows="6"
                                          class="form-control summernote">{{ $service->text_en ?: '' }}</textarea>
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
        @if (count($service->images))
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body card-dashboard">
                                <div class="row">
                                    @foreach ($service->images as $image)
                                        <div class="col-md-3">
                                            <div class="image-preview">
                                                <div class="layer"></div>
                                                <img src="{{ asset('pictures/services/' . $image->picture ?: '') }}"
                                                     alt="{{ $service->name ?: '' }}">
                                                <a href="{{ route('deleteID', ['type' => 0, 'id' => $image->id]) }}"
                                                   class="btn-remove-img"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </form>
    @isset($service->video)
        <div class="modal fade" id="serviceVideo" tabindex="-1" aria-labelledby="video" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <video controls style="width: 100%; height: 350px; object-fit: fill">
                            <source src="{{ asset('videos/services/' . $service->video ?: '') }}" type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>
        </div>
    @endisset
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
