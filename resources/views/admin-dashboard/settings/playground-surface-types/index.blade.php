@extends('admin-dashboard.layouts.admin-master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-header mb-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4>
                            Meydança örtük tipləri
                        </h4>
                        <a href="{{ route('admin.playground-surface-types.create') }}">
                            <button class="btn btn-sm btn-outline-primary">
                                <span>
                                    <i class="ti ti-plus"></i>
                                </span>
                                Yeni örtük tipi
                            </button>
                        </a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <!-- table -->
                    <div class="order-list-datatable table-responsive">
                        <table class="table table-bottom-border align-middle mb-0">
                            <thead>
                            <tr>
                                <th>№</th>
                                <th class="text-start" scope="col">İdman növü</th>
                                <th class="text-start" scope="col">Örtük tipi</th>
                                <th scope="col">Açıqlama</th>
                                <th scope="col">Tarix</th>
                                <th scope="col">Status</th>
                                <th scope="col">Əməliyyatlar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($surfaceTypes as $key => $surfaceType)
                                <tr>
                                    <td>#{{ $key+1 }}</td>
                                    <td>
                                        <span class="title-text mb-0">{{ $surfaceType->sport_types->name }}</span>
                                    </td>
                                    <td class="d-flex align-items-center gap-2">
                                        <span class="title-text mb-0">{{ $surfaceType->name }}</span>
                                    </td>
                                    <td><span class="title-text mb-0">{{ $surfaceType->description }}</span></td>
                                    <td><span
                                            class="title-text mb-0">{{ \Carbon\Carbon::parse($surfaceType->created_at)->format('d.m.Y') }}</span>
                                    </td>
                                    <td>
                                        <span
                                            class="badge text-light-{{ $surfaceType->status === "active" ? 'success' : 'danger' }}">{{ $surfaceType->status === "active" ? 'Aktiv' : 'Deaktiv' }}</span>
                                    </td>
                                    <td>
                                        <a class="btn btn-light-primary icon-btn w-30 h-30 b-r-22 me-2"
                                           href="{{ route('admin.playground-surface-types.edit', encrypt($surfaceType->uid)) }}"
                                           role="button" target="_blank"> <i class="ti ti-eye"></i></a>
                                        <a href="{{ route('admin.playground-surface-types.edit', encrypt($surfaceType->uid)) }}">
                                            <button class="btn btn-light-success icon-btn w-30 h-30 b-r-22 me-2"
                                                    data-bs-target="#staticBackdrop" data-bs-toggle="modal"
                                                    type="button">
                                                <i class="ti ti-edit"></i>
                                            </button>
                                        </a>
                                        <button class="btn btn-light-danger icon-btn w-30 h-30 b-r-22 delete-btn"
                                                type="button">
                                            <i class="ti ti-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- table -->
                </div>
            </div>
        </div>
    </div>
@endsection
