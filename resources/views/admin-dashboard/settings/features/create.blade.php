@extends('admin-dashboard.layouts.admin-master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4>
                            Yeni meydança özəlliyi
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
                        <form action="{{ route('admin.features.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-4">
                                    <div class="floating-form mb-3">
                                        <input type="text" name="name" class="form-control"
                                               placeholder="none" required>
                                        <label class="form-label">Ad</label>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="floating-form mb-3">
                                        <input type="text" name="description" class="form-control"
                                               placeholder="none" required>
                                        <label class="form-label">Qısa açıqlama</label>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="floating-form mb-3">
                                        <select class="form-select" id="city" name="status">
                                            <option selected disabled>Status seçin</option>
                                            <option value="active">Aktiv</option>
                                            <option value="inactive">Deaktiv</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="floating-form mb-3">
                                        <input type="file" name="icon" class="form-control">
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
