@extends('dashboard.layout.master')
@section('title', 'نتائج البحث')
@section('dashboard-main')
    <div class="row" style="margin-bottom: 40px;">
        <div class="col-md-8 mx-auto">
            <form action="{{ route('search') }}">
                <input type="text" name="word" class="form-control" required value="{{ $word }}">
            </form>
        </div>
    </div>
    @if (count($users) > 0)
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">الأعضاء</div>
                    <div class="card-content">
                        <div class="card-body card-dashboard sellerInfo">
                            <ul class="list-unstyled languages">
                                @foreach ($users as $user)
                                    <li><a href="{{ route('users.edit', $user->id ?? '') }}">{{ $user->name_ar ?? '' }} - {{ $user->email ?? '' }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if (count($sellers) > 0)
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">البائعين</div>
                    <div class="card-content">
                        <div class="card-body card-dashboard sellerInfo">
                            <ul class="list-unstyled languages">
                                @foreach ($sellers as $seller)
                                    <li><a href="{{ route('sellers.show', $seller->id ?? '') }}">{{ $seller->first_name_ar . ' ' . $seller->last_name_ar }} - {{ $seller->user->email ?? '' }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if (count($services) > 0)
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">الخدمات</div>
                    <div class="card-content">
                        <div class="card-body card-dashboard sellerInfo">
                            <ul class="list-unstyled languages">
                                @foreach ($services as $service)
                                    <li><a href="{{ route('services.edit', $service->id ?? '') }}">{{ $service->title_ar ?? '' }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
