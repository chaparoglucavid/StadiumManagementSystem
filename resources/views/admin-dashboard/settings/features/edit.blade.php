@extends('admin-dashboard.layouts.admin-master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4>
                            {{ $feature->name }} məlumatları
                        </h4>
                        <a href="{{ route('admin.features.index') }}">
                            <button class="btn btn-sm btn-outline-danger">
                                <span>
                                    <i class="ti ti-arrow-autofit-left"></i>
                                </span>
                                Meydança özəllikləri
                            </button>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="app-form">
                        <form action="{{ route('admin.features.update', encrypt($feature->uid)) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-4">
                                    <div class="floating-form mb-3">
                                        <input type="text" name="name" value="{{ $feature->name }}" class="form-control"
                                               placeholder="none" required>
                                        <label class="form-label">Ad</label>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="floating-form mb-3">
                                        <input type="text" name="description" value="{{ $feature->description }}" class="form-control"
                                               placeholder="none" required>
                                        <label class="form-label">Qısa açıqlama</label>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="floating-form mb-3">
                                        <select class="form-select" id="city" name="status">
                                            <option selected disabled>Status seçin</option>
                                            <option value="active" {{ $feature->status === "active" ? 'selected' : '' }}>Aktiv</option>
                                            <option value="inactive" {{ $feature->status === "inactive" ? 'selected' : '' }}>Deaktiv</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="floating-form mb-3">
                                        <input type="file" name="icon" class="form-control">
                                        <img src="{{ asset('dashboard/images/icons/'.$feature->icon) }}" height="50" class="mt-3">
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <button class="btn btn-success">
                                        <span>
                                            <i class="ti ti-check"></i>
                                        </span>
                                        Daxil et
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
