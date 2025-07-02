<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

if (!function_exists('isProduction')) {
    function isProduction()
    {
        return !(env('APP_ENV') == 'local' || env('APP_ENV') == 'staging');
    }
}

if (!function_exists('apiSuccess')) {
    function apiSuccess($data = null, $msg = null)
    {
        return response()->json([
            "status" => "success",
            "data" => $data,
            "message" => $msg
        ]);
    }
}

if (!function_exists('sendMail')) {
    function sendMail($rec = null, $content = null, $subject = null)
    {
        $mail = Http::withOptions([
            'verify' => false,
        ])->withBasicAuth('api', env('APP_API_TOKEN_MAIL'))->attach([
            [
                'from', 'Payroll YPT Group <admin@ppdb.telkomschools.sch.id>'
            ],
            [
                'to', $rec,
            ],
            [
                'subject', $subject
            ],
            [
                'text', $content
            ]
        ])->post('https://api.mailgun.net/v3/ppdb.telkomschools.sch.id/messages');

        return $mail;
    }
}

if (!function_exists('sendWA')) {
    function sendWA($rec = null, $content = null)
    {
        $send = Http::withOptions([
            'verify' => false,
        ])->post('https://chat-api.ypt.or.id/send-message/key=' . env('APP_API_TOKEN_WA'), [
            'number' => $rec,
            'message' => $content
        ]);

        return $send;
    }
}

if (!function_exists('getWaktu')) {
    function getWaktu()
    {
        $waktu = 'Selamat ';
        $hour = date('H.i');
        if ($hour >= 5 && $hour <= 11) {
            $waktu .= 'Pagi';
        } else if ($hour > 11 && $hour <= 15) {
            $waktu .= 'Siang';
        } else if ($hour > 15 && $hour <= 18) {
            $waktu .= 'Sore';
        } else {
            $waktu .= 'Malam';
        }
        return $waktu;
    }
}

if (!function_exists('apiFailed')) {
    function apiFailed($msg = null, $data = null, $code = null, $debug = null)
    {
        $res = [
            "status" => "failed",
            "data" => $data,
            "message" => $msg
        ];
        if (config('app.debug')) {
            $res['debug'] = $debug;
        }
        if ($code) {
            return response()->json($res, $code);
        }
        return response()->json($res);
    }
}

if (!function_exists('authUser')) {
    function authUser($key = null)
    {
        $auth = \Illuminate\Support\Facades\Auth::user();
        if ($key) {
            if ($auth === null) {
                return false;
            }
            return $auth->$key;
        }
        return $auth;
    }
}

if (!function_exists('timeStamp')) {
    function timeStamp($format = 'Y-m-d H:i:s', $modify = null)
    {
        $date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
        if ($modify) {
            $date->modify($modify);
        }
        return $date->format($format);
    }
}
if (!function_exists('nameDay')) {
    function nameDay($day)
    {
        $list = ['Sabtu', 'Minggu', 'Senin', 'Selesa', 'Rabu', 'Kamis', 'Jum\'at'];

        return $list[$day];
    }
}
if (!function_exists('val_exist')) {
    function val_exist($val, $key)
    {

        return (isset($val[$key]) ? $val[$key] : '');
    }
}

if (!function_exists('formatTime')) {
    function formatTime($date, $format = 'Y-m-d H:i:s')
    {
        Carbon::setLocale('id');
        $date = Carbon::parse($date);
        return $date->translatedFormat($format);
    }
}

if (!function_exists('diffTime')) {
    function diffTime($date1, $date2)
    {
        $from_time = strtotime($date1);
        $to_time = strtotime($date2);
        $minutes = round(abs($to_time - $from_time) / 60, 2);
        return $minutes;
    }
}

if (!function_exists('urlFile')) {
    function urlFile($path)
    {
        $rgx = preg_match('/^http/i', $path);
        return $rgx ? $path : url($path);
    }
}

if (!function_exists('dayId')) {
    function dayId($date = null)
    {
        $date = $date ?? timeStamp();
        $day = strtolower(formatTime($date, 'l'));
        return ARR_DAY[$day];
    }
}

if (!function_exists('normalizePhone')) {
    function normalizePhone($phone)
    {
        return '+62' . preg_replace('/^[+062]{1,3}|\D/m', "", $phone);
    }
}

if (!function_exists('angkaId')) {
    function angkaId($value, $decimal = 0)
    {
        $value = floatval($value);
        $hasil = number_format($value, $decimal, ',', '.');
        return $hasil;
    }
}

if (!function_exists('rupiah')) {
    function rupiah($value, $type = null)
    {
        if ($value === null) return 'Rp0,00';
        $value = preg_replace('/\B(?=(\d{3})+(?!\d))/', '.', $value);
        if ($type === 'angka') return $value;
        return 'Rp' . $value . ',00';
    }
}

if (!function_exists('isStatus')) {
    function isStatusData($val)
    {
        if ($val) {
            return [
                'class_btn' => "btn-danger",
                'img_btn' => asset('image/icon/close.svg'),
                'txt_btn' => 'Nonaktif'
            ];
        } else {
            return [
                'class_btn' => "btn-success",
                'img_btn' => asset('image/icon/simpan.svg'),
                'txt_btn' => 'Aktif'
            ];
        }
    }
}

if (!function_exists('arraySearch')) {
    function arraySearch($array, $search_list, $single = true)
    {
        $result = [];
        foreach ($array as $key => $value) {
            $exist = [];
            foreach ($search_list as $k => $v) {
                if (!isset($value[$k]) || $value[$k] != $v) {
                    continue 2;
                } else {
                    $exist[] = false;
                }
            }
            if (!in_array(false, $exist)) {
                $result[] = $value;
                if ($single) {
                    return $value;
                }
            }
        }
        return $result;
    }
}

if (!function_exists('yearOption')) {
    function yearOption()
    {
        $start = 2023;
        $end = timeStamp('Y', '+1 year');
        $arr_year = [];
        for ($i = $start; $i <= $end; $i++) {
            $arr_year[] = $i;
        }
        return $arr_year;
    }
}

if (!function_exists('roundUp')) {
    function roundUp($val, $digit = 0)
    {
        if (!$val) return $val;

        $helper = ($val % 1000) > 0 ? 500 : 0;
        $round = $digit * (-1);
        return abs(round(($val + $helper), $round));
    }
}

if (!function_exists('setSeo')) {
    function setMetaTag($pageData = null)
    {
        $defaultData = [
            'PAGE_TITLE' => strip_tags(html_entity_decode($pageData['title'] ?? env('APP_NAME'))),
            'PAGE_DESCRIPTION' => strip_tags(html_entity_decode($pageData['description'] ?? env('APP_DESCRIPTION'))),
            'PAGE_URL' => $pageData['url'] ?? env('APP_URL'),
            'IMAGE_URL' => $pageData['image_url'] ?? asset(env('APP_IMAGE_ASSET_PATH')),
            'AUTHOR_NAME' => $pageData['author_name'] ?? env('APP_AUTHOR'),
            'BRAND_NAME' => $pageData['brand_name'] ?? env('APP_BRAND'),
            'LOGO_URL' => $pageData['logo_url'] ?? asset(env('APP_LOGO_ASSET_PATH')),
            'PAGE_KEYWORDS' => $pageData['keyword'] ?? env('APP_KEYWORDS')
        ];

        return view()->file(resource_path('views/seo.blade.php'), $defaultData)->render();
    }
}


if (!function_exists('setKeyword')) {
    function setKeyword($input = '')
    {
        if (!$input) return '';

        preg_match_all('/\b[\w\d]+\b/', $input, $keywords);
        return implode(', ', $keywords[0]);
    }
}

if (!function_exists('toSlug')) {
    function toSlug($title) {
        return \Illuminate\Support\Str::slug($title);
    }
}

if (!function_exists('enkripString')) {
    function enkripString($value) {
        return base64_encode($value);
    }
}

if (!function_exists('dekripString')) {
    function dekripString($value) {
        return base64_decode($value);
    }
}
