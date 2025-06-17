@extends('admin-dashboard.layouts.admin-master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4>
                            {{ t('add new user') }}
                        </h4>
                        <a href="{{ route('admin.users.index') }}">
                            <button class="btn btn-sm btn-outline-danger">
                                <span>
                                    <i class="ti ti-arrow-autofit-left"></i>
                                </span>
                                {{ t('users') }}
                            </button>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="app-form">
                        <form action="{{ route('admin.users.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="floating-form mb-3">
                                        <input type="text" maxlength="50" required name="name" placeholder="{{ t('name') }}" class="form-control">
                                        <label class="form-label">{{ t('name') }}</label>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="floating-form mb-3">
                                        <input type="text" maxlength="50" required name="surname" placeholder="{{ t('surname') }}" class="form-control">
                                        <label class="form-label">{{ t('surname') }}</label>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="floating-form mb-3">
                                        <input type="text" maxlength="50" required name="fatherName" placeholder="{{ t('fatherName') }}" class="form-control">
                                        <label class="form-label">{{ t('fatherName') }}</label>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="floating-form mb-3">
                                        <input type="email" maxlength="50" required name="email" placeholder="{{ t('email') }}" class="form-control">
                                        <label class="form-label">{{ t('email') }}</label>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="floating-form mb-3">
                                        <input type="text" maxlength="50" required name="phone" placeholder="{{ t('phone') }}" class="form-control">
                                        <label class="form-label">{{ t('phone') }}</label>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="floating-form mb-3">
                                        <input type="date" name="birthday" placeholder="{{ t('birthday') }}" class="form-control">
                                        <label class="form-label">{{ t('birthday') }}</label>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="floating-form mb-3">
                                        <input type="password" name="password" placeholder="{{ t('password') }}" class="form-control">
                                        <label class="form-label">{{ t('password') }}</label>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="floating-form mb-3">
                                        <select class="form-select" id="type" name="type">
                                            <option selected disabled>{{ t('select user type') }}</option>
                                            <option value="admin">{{ t('admin') }}</option>
                                            <option value="vendor">{{ t('vendor') }}</option>
                                            <option value="user">{{ t('user') }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="floating-form mb-3">
                                        <select class="form-select" id="status" name="activityStatus">
                                            <option selected disabled>{{ t('select status') }}</option>
                                            <option value="active">{{ t('active') }}</option>
                                            <option value="inactive">{{ t('inactive') }}</option>
                                            <option value="blocked">{{ t('blocked') }}</option>
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
                                    {{ t('create') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
