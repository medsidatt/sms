<?php

namespace App\Models;

use Carbon\Carbon;
use Carbon\CarbonInterval;

class TimeTableServices
{
    public function generateTime()
    {
        $startTime = Carbon::parse('07:00');
        $endTime = Carbon::parse('19:00');
        $interval = CarbonInterval::hour();
        $timeSlots = [];
        $current = $startTime->copy();

        while ($current->lessThan($endTime)) {
            array_push($timeSlots, [
                'start' => $current->format('H:i'),
                'end' => $current->copy()->add($interval)->format('H:i')
            ]);
            $current->add($interval);
        }

        return $timeSlots;
    }
}
