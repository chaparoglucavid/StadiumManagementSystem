@extends('admin-dashboard.layouts.admin-master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4>
                            Yeni rayon
                        </h4>
                        <a href="{{ route('admin.cities.index') }}">
                            <button class="btn btn-sm btn-outline-danger">
                                <span>
                                    <i class="ti ti-arrow-autofit-left"></i>
                                </span>
                                Rayonlar
                            </button>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="app-form">

                        <!-- Language Tabs -->
                        <ul class="nav nav-tabs app-tabs-primary" id="Basic" role="tablist">
                            @foreach($system_languages as $lang)
                                <li class="nav-item" role="presentation">
                                    <button
                                        class="nav-link {{ $lang->shortened === app()->getLocale() ? 'active' : '' }}"
                                        id="{{ $lang->shortened }}-tab" data-bs-toggle="tab"
                                        data-bs-target="#{{ $lang->shortened }}-pane" type="button" role="tab"
                                        aria-controls="{{ $lang->shortened }}-pane"
                                        aria-selected="true">{{ $lang->name }}</button>
                                </li>
                            @endforeach
                        </ul>

                        <form action="{{ route('admin.regions.store') }}" method="POST">
                            @csrf
                            <!-- Tab Content -->
                            <div class="tab-content mt-4" id="BasicContent">
                                @foreach($system_languages as $lang_item)
                                    <div
                                        class="tab-pane fade show {{ $lang_item->shortened === app()->getLocale() ? 'active' : '' }}"
                                        id="{{ $lang_item->shortened }}-pane" role="tabpanel"
                                        aria-labelledby="{{ $lang_item->shortened }}-tab" tabindex="0">
                                        <!-- Language-specific fields (name and description) -->
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="floating-form mb-3">
                                                    <input type="text" name="region_name[{{ $lang_item->shortened }}]"
                                                           class="form-control" placeholder="none">
                                                    <label class="form-label">Ad ({{ $lang_item->name }})</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Global fields (status, icon, etc.) -->
                            <div class="row">
                                <div class="col-6">
                                    <div class="floating-form mb-3">
                                        <select class="form-select" id="cities_uid" name="cities_uid">
                                            <option selected disabled>Şəhər seçin</option>
                                            @foreach($cities as $city)
                                                <option
                                                    value="{{ $city->uid }}">{{ $city->getTranslation('city_name', app()->getLocale()) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="floating-form mb-3">
                                        <select class="form-select" id="status" name="status">
                                            <option selected disabled>Status seçin</option>
                                            <option value="active">Aktiv</option>
                                            <option value="inactive">Deaktiv</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="mt-3">
                                <button class="btn btn-success">
                                    <span>
                                        <i class="ti ti-check"></i>
                                    </span>
                                    Daxil et
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
