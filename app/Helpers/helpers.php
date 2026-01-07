<?php

use Carbon\Carbon;

if (! function_exists('formatTanggal')) {
    function formatTanggal($datetime, $format = 'D - d M Y')
    {
        if (! $datetime) {
            return '-';
        }

        return Carbon::parse($datetime)->translatedFormat($format);
    }
}
