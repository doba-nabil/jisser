<div class="service">
    @isset($service->picture)
        <img src="{{ asset('pictures/services/' . $service->picture ?? '') }}" alt="{{ $service->title_ar ?? '' }}">
    @else
        <img src="{{ asset('dashboard/images/placeholder.jpg') }}" alt="{{ $service->title_ar ?? '' }}">
    @endisset
    <div class="serContent">
        <h3>{{ $service->title_ar ?? '' }}</h3>
        <h4><a href="{{ route('sellers.show', $service->seller->id ?? '') }}">{{ $service->seller->first_name_ar . ' ' . $service->seller->last_name_ar }}</a></h4>
        <hr>
        <ul class="list-inline text-center metaList">
            <li class="list-inline-item">{{ $service->segment->name_ar ?? '' }}</li>
            <li class="list-inline-item">{{ $service->user->country->name_ar }}</li>
            @if ($service->isService == 1)
                <li class="list-inline-item" style="color: #7367f0">{{ \App\Models\Service::price($service->id) }} {{ $service->user->country->currency_ar ?? 'ر.س' }}</li>
            @else
                <li class="list-inline-item" style="color: #7367f0">{{ $service->price ?? '' }} {{ $service->user->country->currency_ar ?? 'ر.س' }}</li>
            @endif
        </ul>
    </div>
    <ul class="list-unstyled editList">
        <li><a href="{{ route('services.edit', $service->id ?? '') }}"><i class="fa fa-edit"></i></a></li>
        @if ($service->isService == 1)
            <li>
                <form action="{{ route('packages.index') }}">
                    <input type="hidden" value="{{ $service->id }}" name="service_id">
                    <button><i class="fa fa-columns"></i></button>
                </form>
            </li>
        @else
            <li><a href="{{ route('services.show', $service->id ?? '') }}"><i class="fa fa-handshake-o"></i></a></li>
        @endif
        <li><a href="{{ route('comments.show', $service->id ?? '') }}"><i class="fa fa-comments"></i></a></li>
        <li>
            <form action="{{ route('services.destroy', $service->id ?? '' ) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="confirm"><i class="fa fa-trash"></i></button>
            </form>
        </li>
    </ul>
    <h6>
        @if ($service->isActive == 1)
            <i class="fa fa-check" style="color: green"></i>
        @else
            <i class="fa fa-times" style="color: red"></i>
        @endif
    </h6>
</div>
