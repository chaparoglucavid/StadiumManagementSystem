@extends('admin-dashboard.layouts.admin-master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4>
                            {{ $type->name }} məlumatları
                        </h4>
                        <a href="{{ route('admin.sport-types.index') }}">
                            <button class="btn btn-sm btn-outline-danger">
                                <span>
                                    <i class="ti ti-arrow-autofit-left"></i>
                                </span>
                                İdman növləri
                            </button>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="app-form">
                        <form action="{{ route('admin.sport-types.update', encrypt($type->uid)) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-4">
                                    <div class="floating-form mb-3">
                                        <input type="text" name="name" value="{{ $type->name }}" class="form-control"
                                               placeholder="none" required>
                                        <label class="form-label">Ad</label>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="floating-form mb-3">
                                        <input type="text" name="description" value="{{ $type->description }}" class="form-control"
                                               placeholder="none" required>
                                        <label class="form-label">Qısa açıqlama</label>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="floating-form mb-3">
                                        <select class="form-select" id="status" name="status">
                                            <option selected disabled>Status seçin</option>
                                            <option value="active" {{ $type->status === "active" ? 'selected' : '' }}>Aktiv</option>
                                            <option value="inactive" {{ $type->status === "inactive" ? 'selected' : '' }}>Deaktiv</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <button class="btn btn-success">
                                        <span>
                                            <i class="ti ti-check"></i>
                                        </span>
                                        Yadda saxla
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
