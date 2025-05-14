@extends('admin-dashboard.layouts.admin-master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4>
                            {{ $city->getTranslation('city_name', app()->getLocale()) }}
                        </h4>
                        <a href="{{ route('admin.cities.index') }}">
                            <button class="btn btn-sm btn-outline-danger">
                                <span>
                                    <i class="ti ti-arrow-autofit-left"></i>
                                </span>
                                {{ t('cities') }}
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

                        <form action="{{ route('admin.cities.update', encrypt($city->uid)) }}" method="POST">
                            @csrf
                            @method('PUT')
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
                                                    <input type="text" value="{{ $city->getTranslation('city_name', $lang_item->shortened) }}" name="city_name[{{ $lang_item->shortened }}]"
                                                           class="form-control" placeholder="none">
                                                    <label class="form-label">{{ t('name') }} ({{ $lang_item->name }})</label>
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
                                        <select class="form-select" id="status" name="status">
                                            <option selected disabled>{{ t('select status') }}</option>
                                            <option value="active" {{ $city->status === "active" ? 'selected' : '' }}>{{ t('active') }}</option>
                                            <option value="inactive" {{ $city->status === "inactive" ? 'selected' : '' }}>{{ t('inactive') }}</option>
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
                                    {{ t('update') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
