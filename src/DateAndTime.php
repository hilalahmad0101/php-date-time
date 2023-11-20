<?php

namespace Hilalahmad\DateAndTime;

use DateInterval;
use DatePeriod;
use DateTime; 

class DateAndTime
{
    /**
     * Format a date using a specified format.
     *
     * @param string $format
     * @param string|int|null $timestamp
     * @return string
     */
    public static function formatDate($format = 'Y-m-d H:i:s', $timestamp = null)
    {
        $timestamp = $timestamp ?? time();
        return date($format, $timestamp);
    }

    /**
     * Calculate the difference between two dates.
     *
     * @param string $date1
     * @param string $date2
     * @param string $intervalType
     * @return int|false
     */
    public static function dateDifference($date1, $date2, $intervalType = 'days')
    {
        $datetime1 = new DateTime($date1);
        $datetime2 = new DateTime($date2);
        $interval = $datetime1->diff($datetime2);

        switch ($intervalType) {
            case 'years':
                return $interval->y;
            case 'months':
                return $interval->m;
            case 'days':
                return $interval->days;
            case 'hours':
                return $interval->h;
            case 'minutes':
                return $interval->i;
            case 'seconds':
                return $interval->s;
            default:
                return false;
        }
    }

    /**
     * Parse a date string and return a DateTime object.
     *
     * @param string $dateString
     * @return DateTime|false
     */
    public static function parseDate($dateString)
    {
        return DateTime::createFromFormat('Y-m-d H:i:s', $dateString);
    }

    /**
     * Get the current timestamp.
     *
     * @return int
     */
    public static function getCurrentTimestamp()
    {
        return time();
    }

    /**
     * Add a specified number of years to a given date.
     *
     * @param string $date
     * @param int $years
     * @return string|false
     */
    public static function addYears($date, $years)
    {
        $dateTime = new DateTime($date);
        $dateTime->modify("+$years years");
        return $dateTime->format('Y-m-d H:i:s');
    }

    /**
     * Subtract a specified number of months from a given date.
     *
     * @param string $date
     * @param int $months
     * @return string|false
     */
    public static function subtractMonths($date, $months)
    {
        $dateTime = new DateTime($date);
        $dateTime->modify("-$months months");
        return $dateTime->format('Y-m-d H:i:s');
    }

    /**
     * Get the day of the week for a given date.
     *
     * @param string $date
     * @return string|false
     */
    public static function getDayOfWeek($date)
    {
        $dateTime = new DateTime($date);
        return $dateTime->format('l'); // Returns the full day name (e.g., Sunday, Monday)
    }

    /**
     * Check if a given date is in the past.
     *
     * @param string $date
     * @return bool
     */
    public static function isInPast($date)
    {
        $dateTime = new DateTime($date);
        $now = new DateTime();
        return $dateTime < $now;
    }

    /**
     * Check if a given date is in the future.
     *
     * @param string $date
     * @return bool
     */
    public static function isInFuture($date)
    {
        $dateTime = new DateTime($date);
        $now = new DateTime();
        return $dateTime > $now;
    }

    /**
     * Get the age based on the birthdate.
     *
     * @param string $birthdate
     * @return int|false
     */
    public static function calculateAge($birthdate)
    {
        $today = new DateTime();
        $birthday = new DateTime($birthdate);
        $age = $today->diff($birthday)->y;

        return $age;
    }

    /**
     * Check if two date ranges overlap.
     *
     * @param string $start1
     * @param string $end1
     * @param string $start2
     * @param string $end2
     * @return bool
     */
    public static function doDateRangesOverlap($start1, $end1, $start2, $end2)
    {
        $range1 = new DatePeriod(new DateTime($start1), new DateInterval('P1D'), new DateTime($end1));
        $range2 = new DatePeriod(new DateTime($start2), new DateInterval('P1D'), new DateTime($end2));

        foreach ($range1 as $date1) {
            foreach ($range2 as $date2) {
                if ($date1 == $date2) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * Convert a timestamp to a human-readable relative time.
     *
     * @param int $timestamp
     * @return string
     */
    public static function relativeTime($timestamp)
    {
        $now = new DateTime();
        $date = DateTime::createFromFormat('U', $timestamp);
        $interval = $now->diff($date);

        if ($interval->y !== 0) {
            return $interval->y . ' ' . ($interval->y === 1 ? 'year' : 'years');
        }
        if ($interval->m !== 0) {
            return $interval->m . ' ' . ($interval->m === 1 ? 'month' : 'months');
        }
        if ($interval->d !== 0) {
            return $interval->d . ' ' . ($interval->d === 1 ? 'day' : 'days');
        }
        if ($interval->h !== 0) {
            return $interval->h . ' ' . ($interval->h === 1 ? 'hour' : 'hours');
        }
        if ($interval->i !== 0) {
            return $interval->i . ' ' . ($interval->i === 1 ? 'minute' : 'minutes');
        }
        if ($interval->s !== 0) {
            return $interval->s . ' ' . ($interval->s === 1 ? 'second' : 'seconds');
        }

        return 'just now';
    }

    /**
     * Get the number of days between two dates.
     *
     * @param string $date1
     * @param string $date2
     * @return int|false
     */
    public static function getDaysDifference($date1, $date2)
    {
        $datetime1 = new DateTime($date1);
        $datetime2 = new DateTime($date2);
        $interval = $datetime1->diff($datetime2);

        return $interval->days;
    }

    /**
     * Determine if a year is a leap year.
     *
     * @param int $year
     * @return bool
     */
    public static function isLeapYear($year)
    {
        return ($year % 4 === 0 && $year % 100 !== 0) || ($year % 400 === 0);
    }

    /**
     * Get the first and last day of a given month.
     *
     * @param int $year
     * @param int $month
     * @return array
     */
    public static function getMonthRange($year, $month)
    {
        $firstDay = new DateTime("$year-$month-01");
        $lastDay = new DateTime("$year-$month-" . $firstDay->format('t'));

        return [
            'first_day' => $firstDay->format('Y-m-d'),
            'last_day' => $lastDay->format('Y-m-d'),
        ];
    }

    /**
     * Get the current week number of the year.
     *
     * @return int
     */
    public static function getCurrentWeekNumber()
    {
        return (int)date('W');
    }

    /**
     * Check if a given year and month form the current month.
     *
     * @param int $year
     * @param int $month
     * @return bool
     */
    public static function isCurrentMonth($year, $month)
    {
        $currentYear = (int)date('Y');
        $currentMonth = (int)date('m');

        return ($year === $currentYear) && ($month === $currentMonth);
    }

    /**
     * Check if a given date is a weekend (Saturday or Sunday).
     *
     * @param string $date
     * @return bool
     */
    public static function isWeekend($date)
    {
        $dayOfWeek = (int)(new DateTime($date))->format('N');
        return ($dayOfWeek === 6 || $dayOfWeek === 7); // 6 is Saturday, 7 is Sunday
    }

    /**
     * Get the quarter of the year for a given date.
     *
     * @param string $date
     * @return int
     */
    public static function getQuarter($date)
    {
        $month = (int)(new DateTime($date))->format('n');
        return ceil($month / 3);
    }

    /**
     * Check if a given year is a future year.
     *
     * @param int $year
     * @return bool
     */
    public static function isFutureYear($year)
    {
        $currentYear = (int)date('Y');
        return ($year > $currentYear);
    }

    /**
     * Check if a given date is today.
     *
     * @param string $date
     * @return bool
     */
    public static function isToday($date)
    {
        return (new DateTime($date))->format('Y-m-d') === date('Y-m-d');
    }

    /**
     * Get the next N weekdays from a given date.
     *
     * @param string $date
     * @param int $count
     * @return array
     */
    public static function getNextWeekdays($date, $count)
    {
        $result = [];
        $currentDate = new DateTime($date);

        while (count($result) < $count) {
            if ($currentDate->format('N') <= 5) {
                $result[] = $currentDate->format('Y-m-d');
            }
            $currentDate->modify('+1 day');
        }

        return $result;
    }

    /**
     * Get the last day of the current month.
     *
     * @return string
     */
    public static function getLastDayOfCurrentMonth()
    {
        return date('Y-m-t');
    }

    /**
     * Check if a given date is in the morning (before noon).
     *
     * @param string $date
     * @return bool
     */
    public static function isInMorning($date)
    {
        return (new DateTime($date))->format('H') < 12;
    }

    /**
     * Get the next N months from a given date.
     *
     * @param string $date
     * @param int $count
     * @return array
     */
    public static function getNextMonths($date, $count)
    {
        $result = [];
        $currentDate = new DateTime($date);

        while (count($result) < $count) {
            $currentDate->modify('+1 month');
            $result[] = $currentDate->format('Y-m-d');
        }

        return $result;
    }
}
