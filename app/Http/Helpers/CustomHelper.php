<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\SerialNumberConditionStatuses;
use App\Models\ImportPermissionStatusSettings;
use App\Models\Protocols;
use App\Models\ProtocolStatusSettings;
use App\Models\RadioFrequencyQueriesStatusSettings;
use App\Models\SpecialPermissionStatusSettings;
use App\Models\User;

function checkIdsAvailable($id): bool
{
    try {
        $decryptedEquipmentId = decrypt($id);
        if ($decryptedEquipmentId) {
            return true;
        }
    } catch (Exception $e) {
        Log::channel('helper-log')->error('Xəta baş verdi', [
            'message' => $e->getMessage(),
            'file' => $e->getFile(),
            'line' => $e->getLine()
        ]);
        return false;
    }
    return false;
}

function getBrowserLogo($browser)
{
    $logos = [
        'Chrome'  => asset('dashboard/images/logos/chrome.png'),
        'Firefox' => asset('dashboard/images/logos/firefox.png'),
        'Edge'    => asset('dashboard/images/logos/edge.png'),
        'Opera'   => asset('dashboard/images/logos/opera.png'),
        'Safari'  => asset('dashboard/images/logos/safari.png'),
    ];
    return $logos[$browser] ?? '/images/logos/default.png';
}

function getUserInformations($uid)
{
    $user = User::with('main_companies')->find($uid);
    return $user->full_name ?? NULL;
}

function checkModulePermissions()
{
    $moduleSettings = [];

    if(Auth::user()->main_companies->executer_agency)
    {
        $company_module_settings = Auth::user()->main_companies->company_modules->each(function ($company_module) use (&$moduleSettings) {
            $module_uid = $company_module->pivot->modules_uid;
            if (!empty($module_uid)) {
                $module_view_settings = $company_module->pivot->view;
                $module_edit_settings = $company_module->pivot->edit;
                $moduleSettings[$module_uid] = [
                    'view' => $module_view_settings,
                    'edit' => $module_edit_settings
                ];
            }
        });
    }
}

function countUserEquipments()
{
    return Auth::user()->main_companies->equipments()->count();
}

function getEquipmentSurveyName($relationName)
{
    $surveyRelations = [
        'base_stations' => 'BAZA STANSİYALARI ANKETİ',
        'mobile_satellites' => 'SƏYYAR PEYK TERMİNALININ (SPT) ANKETİ',
        'radio_broadcasts' => 'RADİOYAYIM ÖTÜRÜCÜSÜ ANKETİ',
        'radio_relay_lines' => 'RADİORELE XƏTTİNİN (RRX) ANKETİ',
        'radio_stations' => 'RADİOSTANSİYANIN (RS) ANKETİ',
        'satellite_phones' => 'PEYK TELEFONUNUN (PT) ANKETİ',
        'ships' => 'GƏMİ RADİORABİTƏ AVADANLIQLARININ ANKETİ',
        'terrestrials' => 'YERÜSTÜ PEYK STANSİYASININ (YPS) ANKETİ',
        'tv_broadcasts' => 'TELEVİZİYA YAYIM ÖTÜRÜCÜSÜNÜN ANKETİ',
    ];

    return $surveyRelations[$relationName] ?? false;
}

function checkTutorialCompleted($tutorialName)
{
    $user = Auth::user();
    $userId = $user->uid;
    $cacheKey = "user_{$userId}_tutorial_{$tutorialName}_completed";
    if (Cache::has($cacheKey)) {
        return Cache::get($cacheKey);
    }

    $tutorialCompleted = $user->user_settings->$tutorialName;

    if(!$tutorialCompleted) Cache::put($cacheKey, $tutorialCompleted, now()->addDay());

    return $tutorialCompleted;
}

function generateDocumentNumber($model)
{
    // document number 00000001, 00000002 formatinda generasiya olunur
    $lastDocument = $model::latest('id')->first();
    $nextNumber = $lastDocument ? (int) substr($lastDocument->document_number, -8) + 1 : 1;
    return str_pad($nextNumber, 8, '0', STR_PAD_LEFT);
}

function checkSemiannual()
{
    $currentMonth = now()->month;
    if ($currentMonth <= 6) {
        return now()->year . '/1';
    }
    return now()->year . '/2';
}

function getReportSerialStatusName($uid)
{
    $status = SerialNumberConditionStatuses::findOrFail($uid);
    return $status->status_name ?? '';
}

function checkImportPermissionPreviousStatus($permission)
{
    $current_status_row = $permission->import_permission_statuses()->latest()->first();
    return $current_status_row ? $current_status_row->current_status : 'Baxılır';
}

function checkProtocolPreviousStatus($protocol)
{
    $current_status_row = $protocol->protocol_statuses()->latest()->first();
    return $current_status_row ? $current_status_row->current_status : 'Protokol formalaşdırıldı';
}

function checkImportProcessFinished($currentStatus)
{
    return ImportPermissionStatusSettings::where('main_companies_uid', Auth::user()->main_companies_uid)->where('to_status', $currentStatus)->first()->query_finished;
}

function checkImportPermissionStatusClass($currentStatus, $currentStatusIndex, $count)
{

    $class = "active";
    if ($currentStatusIndex != $count) {
        $class = "";
    }
    $status_row = ImportPermissionStatusSettings::where('main_companies_uid', Auth::user()->main_companies_uid)
        ->where('to_status', $currentStatus)
        ->first();
    if ($status_row && $status_row->operation_type == 0) {
        $class = "rejected";
    }
    return $class;
}


function checkSpecialPermissionPreviousStatus($permission)
{
    $current_status_row = $permission->special_permission_statuses()->latest()->first();
    return $current_status_row ? $current_status_row->current_status : 'Baxılır';
}

function checkSpecialProcessFinished($currentStatus)
{
    return SpecialPermissionStatusSettings::where('main_companies_uid', Auth::user()->main_companies_uid)->where('to_status', $currentStatus)->first()->query_finished;
}

function checkSpecialPermissionStatusClass($currentStatus, $currentStatusIndex, $count)
{

    $class = "active";
    if ($currentStatusIndex != $count) {
        $class = "";
    }
    $status_row = SpecialPermissionStatusSettings::where('main_companies_uid', Auth::user()->main_companies_uid)
        ->where('to_status', $currentStatus)
        ->first();
    if ($status_row && $status_row->operation_type == 0) {
        $class = "rejected";
    }
    return $class;
}


function checkRadioFrequencyQueriesPreviousStatus($frequency_query)
{
    $current_status_row = $frequency_query->radio_frequency_queries_statuses()->latest()->first();
    return $current_status_row ? $current_status_row->current_status : 'Baxılır';
}

function checkRadioFrequencyQueriesFinished($currentStatus)
{
    return RadioFrequencyQueriesStatusSettings::where('main_companies_uid', Auth::user()->main_companies_uid)->where('to_status', $currentStatus)->first()->query_finished;
}

function checkProtocolFinished($currentStatus)
{
    return ProtocolStatusSettings::where('main_companies_uid', Auth::user()->main_companies_uid)->where('to_status', $currentStatus)->first()->query_finished;
}

function checkRadioFrequencyQueriesStatusClass($currentStatus, $currentStatusIndex, $count)
{

    $class = "active";
    if ($currentStatusIndex != $count) {
        $class = "";
    }
    $status_row = RadioFrequencyQueriesStatusSettings::where('main_companies_uid', Auth::user()->main_companies_uid)
        ->where('to_status', $currentStatus)
        ->first();
    if ($status_row && $status_row->operation_type == 0) {
        $class = "rejected";
    }
    return $class;
}

function checkProtocolStatusClass($currentStatus, $currentStatusIndex, $count)
{

    $class = "active";
    if ($currentStatusIndex != $count) {
        $class = "";
    }
    $status_row = ProtocolStatusSettings::where('main_companies_uid', Auth::user()->main_companies_uid)
        ->where('to_status', $currentStatus)
        ->first();
    if ($status_row && $status_row->operation_type == 0) {
        $class = "rejected";
    }
    return $class;
}

