{{--<table class="table zero-configuration">--}}
<table class="table">
    <thead>
    <tr>
        <th>اسم الدولة</th>
        <th>عدد المدن</th>
        <th>عدد الأعضاء</th>
        <th>خيارات</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($countries as $country)
        <tr>
            <td>
                @isset($country->picture)
                    <img src="{{ asset('pictures/countries/' . $country->picture ?? '') }}" alt="{{ $country->name_ar ?? '' }}" class="imgInTable">
                @else
                    <img src="{{ asset('dashboard/images/placeholder.jpg') }}" alt="{{ $country->name_ar ?? '' }}" class="imgInTable">
                @endisset
                    {{ $country->name_ar ?? '' }}
            </td>
            <td>{{ count($country->cities) }}</td>
            <td>{{ count($country->users) }}</td>
            <td>
                <ul class="list-inline text-center">
                    <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="تعديل">
                        <a href="{{ route('countries.edit', $country->id ?? '') }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                    </li>
                    <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="المدن">
                        <a href="{{ route('countries.show', $country->id ?? '') }}" class="btn btn-success btn-sm"><i class="fa fa-map-signs"></i></a>
                    </li>
                    <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="حذف">
                        <form action="{{ route('countries.destroy', $country->id ?? '') }}" method="post" id="delete_country">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm confirm"><i class="fa fa-trash"></i></button>
                        </form>
                    </li>
                </ul>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
