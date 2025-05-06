@extends('admin-dashboard.layouts.admin-master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-header mb-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4>
                            Vendor paketləri
                        </h4>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="row">
                        @foreach($packages as $package)
                            <div class="col-sm-2 col-md-4">
                                <div class="card project-total-card">
                                    <div class="card-body">
                                        <div class="d-flex position-relative align-items-center justify-content-center">
                                            <h5 class="text-dark txt-ellipsis-1">{{ $package->package_name }}</h5>
                                        </div>
                                        <div>
                                            <div class="d-flex justify-content-center align-items-center">
                                                <img src="{{ asset('dashboard/images/logo/'.$package->logo) }}"
                                                     class="img-fluid" style="height: 250px">
                                            </div>
                                            <div class="progress-labels mg-t-40">
                                                <p>
                                                    {{ $package->package_description }}
                                                </p>
                                            </div>
                                            <div class="progress-labels">
                                                <p>
                                                    Paket qiyməti: {{ $package->amount }}₼
                                                </p>
                                            </div>
                                            <div class="progress-labels">
                                                <p>
                                                    Komissiya: {{ $package->commission }}%
                                                </p>
                                            </div>
                                            <div class="progress-labels">
                                                <p>
                                                    Aktivlik müddəti (gün ilə): {{ $package->duration }}
                                                </p>
                                            </div>
                                            <div class="progress-labels">
                                                <p>
                                                    Status:
                                                    <span class="badge text-light-{{ $package->status === 'active' ? 'success' : 'danger' }}">{{ $package->status === 'active' ? 'Aktiv' : 'Deaktiv' }}</span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="mt-4 d-flex justify-content-between align-items-center">
                                            <button class="btn btn-sm btn-outline-info w-100 edit-package-button"
                                                    data-package-id="{{ encrypt($package->uid) }}"
                                                    type="button">
                                                <span>
                                                    <i class="ti ti-pencil"></i>
                                                </span>
                                                Düzəliş et
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger w-100">
                                                <span>
                                                    <i class="ti ti-trash"></i>
                                                </span>
                                                Sil
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="col-sm-2 col-md-4">
                            <div class="card project-total-card new-package" data-bs-target="#newPackageModal"
                                 data-bs-toggle="modal"
                                 type="button">
                                <div class="card-body d-flex justify-content-center align-items-center"
                                     style="height: 200px;">
                                    <span style="font-size: 48px;">+</span>
                                    <strong class="ms-2">Yeni paket əlavə et</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div aria-hidden="true" class="modal fade" id="newPackageModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Yeni vendor paketi</h5>
                    <button aria-label="Close" class="btn-close m-0 fs-5" data-bs-dismiss="modal"
                            type="button"></button>
                </div>
                <form action="{{ route('admin.vendor-packages.store') }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="app-form">
                            

                                <div class="row">
                                    <div class="col-12">
                                        <div class="floating-form mb-3">
                                            <input type="text" name="package_name" class="form-control"
                                                   placeholder="none" required>
                                            <label class="form-label">Paket adını daxil edin</label>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="floating-form mb-3">
                                            <input type="text" name="package_description" class="form-control"
                                                   placeholder="none" required>
                                            <label class="form-label">Paket haqqında qısa məlumat</label>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="floating-form mb-3">
                                            <div class="input-group">
                                                <input aria-label="Qiyməti daxil edin" class="form-control"
                                                       placeholder="Qiyməti daxil edin" type="text" name="amount">
                                                <span class="input-group-text bg-light-secondary b-1-secondary"><i
                                                        class="ti ti-report-money"></i></span>
                                                <label class="form-label">Qiymət</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="floating-form mb-3">
                                            <div class="input-group">
                                                <input aria-label="Komissiyanı daxil edin" class="form-control"
                                                       placeholder="Faiz dərəcəsini daxil edin" type="text"
                                                       name="commission">
                                                <span class="input-group-text bg-light-secondary b-1-secondary"><i
                                                        class="ti ti-percentage"></i></span>
                                                <label class="form-label">Komissiya</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="floating-form mb-3">
                                            <div class="input-group">
                                                <input aria-label="Aktivlik müddətini daxil edin" class="form-control"
                                                       placeholder="Aktivlik müddətini daxil edin" type="text"
                                                       name="duration">
                                                <span class="input-group-text bg-light-secondary b-1-secondary"><i
                                                        class="ti ti-calendar"></i></span>
                                                <label class="form-label">Aktivlik müddəti</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="floating-form mb-3">
                                            <input type="file" name="logo" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="floating-form mb-3">
                                            <select class="form-select" id="status" name="status">
                                                <option selected disabled>Status seçin</option>
                                                <option value="active">Aktiv</option>
                                                <option value="inactive">Deaktiv</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-light-primary" type="button">Daxil et</button>
                    <button class="btn btn-light-secondary" data-bs-dismiss="modal"
                            type="button">Bağla
                    </button>
                </div>
            </form>

            </div>
        </div>
    </div>

    <div aria-hidden="true" class="modal fade" id="editPackageData" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPackageModalTitle"></h5>
                    <button aria-label="Close" class="btn-close m-0 fs-5" data-bs-dismiss="modal"
                            type="button"></button>
                </div>
                <form id="editPackageForm" method="POST" 
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="app-form">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="floating-form mb-3">
                                            <input type="text" name="package_name" class="form-control"
                                                   placeholder="none" required>
                                            <label class="form-label">Paket adı</label>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="floating-form mb-3">
                                            <input type="text" name="package_description" class="form-control"
                                                   placeholder="none" required>
                                            <label class="form-label">Paket haqqında qısa məlumat</label>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="floating-form mb-3">
                                            <div class="input-group">
                                                <input aria-label="Qiyməti daxil edin" class="form-control"
                                                       placeholder="Qiyməti daxil edin" type="text" name="amount">
                                                <span class="input-group-text bg-light-secondary b-1-secondary"><i
                                                        class="ti ti-report-money"></i></span>
                                                <label class="form-label">Qiymət</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="floating-form mb-3">
                                            <div class="input-group">
                                                <input aria-label="Komissiyanı daxil edin" class="form-control"
                                                       placeholder="Faiz dərəcəsini daxil edin" type="text"
                                                       name="commission">
                                                <span class="input-group-text bg-light-secondary b-1-secondary"><i
                                                        class="ti ti-percentage"></i></span>
                                                <label class="form-label">Komissiya</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="floating-form mb-3">
                                            <div class="input-group">
                                                <input aria-label="Aktivlik müddətini daxil edin" class="form-control"
                                                       placeholder="Aktivlik müddətini daxil edin" type="text"
                                                       name="duration">
                                                <span class="input-group-text bg-light-secondary b-1-secondary"><i
                                                        class="ti ti-calendar"></i></span>
                                                <label class="form-label">Aktivlik müddəti</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="floating-form mb-3">
                                            <input type="file" name="logo" class="form-control">
                                            <img id="currentLogo" src="" height="50" class="mt-3">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="floating-form mb-3">
                                            <select class="form-select" id="editStatus" name="status">
                                                <option selected disabled>Status seçin</option>
                                                <option value="active">Aktiv</option>
                                                <option value="inactive">Deaktiv</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-light-primary" type="submit">Yadda saxla</button>
                    <button class="btn btn-light-secondary" data-bs-dismiss="modal"
                            type="button">Bağla
                    </button>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection

@section('js-code')
<script>
    $(document).ready(function() {
        $('.edit-package-button').click(function() {
            var packageId = $(this).data('package-id');
            const editPackageForm = document.getElementById('editPackageForm');
            const updateUrl = '/admin/vendor-packages/' + packageId;

            $.ajax({
                url: '/admin/get-vendor-package-data/' + packageId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    const packageData = data.data; 
                    $('#editPackageForm').attr('action', '/admin/vendor-packages/' + packageId); 
                    $('#editPackageModalTitle').text(packageData.package_name + ' məlumatları');
                    $('#editPackageForm input[name="package_name"]').val(packageData.package_name);
                    $('#editPackageForm input[name="package_description"]').val(packageData.package_description);
                    $('#editPackageForm input[name="amount"]').val(packageData.amount);
                    $('#editPackageForm input[name="commission"]').val(packageData.commission);
                    $('#editPackageForm input[name="duration"]').val(packageData.duration);
                    $('#currentLogo').attr('src', '/dashboard/images/logo/' + packageData.logo);
                    $('#editStatus').val(packageData.status);
                    $('#editPackageData').modal('show');
                },
                error: function(xhr, status, error) {
                    console.error('Paket məlumatları seçilərkən xəta baş verdi:', error);
                }
            });
        });
    });
</script>
@endsection