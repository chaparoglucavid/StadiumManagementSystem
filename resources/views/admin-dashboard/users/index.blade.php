@extends('admin-dashboard.layouts.admin-master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-header mb-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4>
                            İstifadəçilər
                        </h4>
                        <a href="{{ route('admin.users.create') }}">
                            <button class="btn btn-sm btn-outline-primary">
                                <span>
                                    <i class="ti ti-plus"></i>
                                </span>
                                Yeni istifadəçi
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
                                <th class="text-start" scope="col">İstifadəçi</th>
                                <th scope="col">Email</th>
                                <th scope="col">Telefon nömrəsi</th>
                                <th scope="col">Qeydiyyat tarixi</th>
                                <th scope="col">Status</th>
                                <th scope="col">Əməliyyatlar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $key => $user)
                                <tr>
                                    <td>#{{ $key+1 }}</td>
                                    <td class="d-flex align-items-center gap-2">
                                        <span class="title-text mb-0">{{ $user->surname.' '.$user->name.' '.$user->fatherName }}</span>
                                    </td>
                                    <td>
                                        {{ $user->email }}
                                    </td>
                                    <td>
                                        {{ $user->phone }}
                                    </td>
                                    <td>
                                        <span class="title-text mb-0">{{ \Carbon\Carbon::parse($user->created_at)->format('d.m.Y') }}</span>
                                    </td>
                                    <td>
                                        <span
                                            class="badge text-light-{{ $user->status === "active" ? 'success' : 'danger' }}">{{ $user->status === "active" ? 'Aktiv' : 'Deaktiv' }}</span>
                                    </td>
                                    <td>
                                        <a class="btn btn-light-primary icon-btn w-30 h-30 b-r-22 me-2"
                                           href="{{ route('admin.features.edit', encrypt($user->uid)) }}"
                                           role="button" target="_blank"> <i class="ti ti-eye"></i></a>
                                        <a href="{{ route('admin.features.edit', encrypt($user->uid)) }}">
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
