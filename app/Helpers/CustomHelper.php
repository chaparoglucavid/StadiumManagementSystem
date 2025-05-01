<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\User;

function checkIdsAvailable($id): bool
{
        $decryptedEquipmentId = decrypt($id);
        if ($decryptedEquipmentId) {
            return true;
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
