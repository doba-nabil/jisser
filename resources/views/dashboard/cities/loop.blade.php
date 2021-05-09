<table class="table">
    <thead>
    <tr>
        <th>اسم المدينة</th>
        <th>الدولة</th>
        <th>عدد الأعضاء</th>
        <th>خيارات</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($cities as $city)
        <tr>
            <td>{{ $city->name_ar ?? '' }}</td>
            <td>
                @isset($city->country->picture)
                    <img src="{{ asset('pictures/countries/' . $city->country->picture ?? '') }}" alt="{{ $city->country->name_ar ?? '' }}" class="imgInTable">
                @else
                    <img src="{{ asset('dashboard/images/placeholder.jpg') }}" alt="{{ $city->country->name_ar ?? '' }}" class="imgInTable">
                @endisset
                    {{ $city->country->name_ar ?? '' }}
            </td>
            <td>{{ count($city->users) }}</td>
            <td>
                <ul class="list-inline text-center">
                    <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="تعديل">
                        <a href="{{ route('cities.edit', $city->id ?? '') }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                    </li>
                    <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="حذف">
                        <form action="{{ route('cities.destroy', $city->id ?? '') }}" method="post" id="delete_city">
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
