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
                                        <select class="form-select" id="status" name="status">
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
                                        Yadda saxla
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header code-header">
                        <h5>Outline Tabs</h5>
                        <a data-bs-toggle="collapse" href="#tab2" aria-expanded="false" aria-controls="tab2">
                            <i class="ti ti-code source" data-source="t2"></i>
                        </a>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs tab-outline-primary" id="Outline" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="connect-tab" data-bs-toggle="tab"
                                        data-bs-target="#connect-tab-pane" type="button" role="tab" aria-controls="connect-tab-pane"
                                        aria-selected="true">Connect</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="discover-tab" data-bs-toggle="tab"
                                        data-bs-target="#discover-tab-pane" type="button" role="tab" aria-controls="discover-tab-pane"
                                        aria-selected="false">Discover</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="order-tab" data-bs-toggle="tab" data-bs-target="#order-tab-pane"
                                        type="button" role="tab" aria-controls="order-tab-pane" aria-selected="false">Orders</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="OutlineContent">
                            <div class="tab-pane fade show active" id="connect-tab-pane" role="tabpanel"
                                 aria-labelledby="connect-tab" tabindex="0">
                                <h6 class="mb-1">This is the content of tab one.</h6>
                                <p>This field is a rich HTML field with a content editor like others used in Sitefinity. It
                                    accepts images, video, tables, text, etc. Street art polaroid microdosing la croix taxidermy.
                                    Jean shorts kinfolk distillery lumbersexual pinterest XOXO semiotics.</p>
                            </div>
                            <div class="tab-pane fade" id="discover-tab-pane" role="tabpanel" aria-labelledby="discover-tab"
                                 tabindex="0">
                                <h6 class="mb-1">This is the content of tab two.</h6>
                                <p>This field is a rich HTML field with a content editor like others used in Sitefinity. It
                                    accepts images, video, tables, text, etc. Street art polaroid microdosing la croix taxidermy.
                                    Jean shorts kinfolk distillery lumbersexual pinterest XOXO semiotics.</p>
                            </div>
                            <div class="tab-pane fade" id="order-tab-pane" role="tabpanel" aria-labelledby="order-tab"
                                 tabindex="0">
                                <h6 class="mb-1">This is the content of tab three.</h6>
                                <p>This field is a rich HTML field with a content editor like others used in Sitefinity. It
                                    accepts images, video, tables, text, etc. Street art polaroid microdosing la croix taxidermy.
                                    Jean shorts kinfolk distillery lumbersexual pinterest XOXO semiotics.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
