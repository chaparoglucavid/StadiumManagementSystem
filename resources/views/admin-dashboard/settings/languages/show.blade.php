@extends('admin-dashboard.layouts.admin-master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-header mb-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4>
                            {{ $langWithTranslations->name }} tərcümələri
                        </h4>
                        <a href="{{ route('admin.features.create') }}">
                            <button class="btn btn-sm btn-outline-primary">
                                <span>
                                    <i class="ti ti-plus"></i>
                                </span>
                                Yeni özəllik
                            </button>
                        </a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <form method="post" action="{{ route('admin.update-translation', encrypt($langWithTranslations->uid)) }}">
                    @csrf
                    @method('PUT')
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Söz</th>
                                        <th>Tərcümə</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($langWithTranslations->translations ?? [] as $itemKey => $translations)
                                        <tr>
                                            <td>{{ $itemKey+1 }}</td>
                                            <td>{{ $translations->key }}</td>
                                            <td>
                                                <input type="text" class="form-control" value="{{ $translations->value }}" name="value[{{ $translations->key }}][value]">
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="text-end mt-3">
                            <button type="submit" class="btn btn-primary">{{ t('update') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
