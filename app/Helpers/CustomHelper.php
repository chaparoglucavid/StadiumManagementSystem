<?php
use App\Models\Translations;

function t(string $key, string $locale = null): string
{
    return Translations::getValue($key);
}

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
