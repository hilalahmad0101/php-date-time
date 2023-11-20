<h1 align="center">date-time PHP Package</h1>

<p align="center">
   <em>Creating a PHP package for date and time manipulation can be highly useful, especially when dealing with various date-related functionalities. Let's call this package "DateTime."</em>
</p>

<p align="center">
  <a href="https://github.com/hilalahmad0101/php-date-time/issues">
    <img src="https://img.shields.io/github/issues/hilalahmad0101/php-date-time" alt="GitHub issues">
  </a>
  <a href="https://github.com/hilalahmad0101/php-date-time/stargazers">
    <img src="https://img.shields.io/github/stars/hilalahmad0101/php-date-time" alt="GitHub stars">
  </a>
  <a href="https://packagist.org/packages/hilalahmad0101/php-date-time">
    <img src="https://img.shields.io/packagist/dt/hilalahmad0101/php-date-time" alt="Total Downloads">
  </a>
  <a href="https://github.com/hilalahmad0101/php-date-time/blob/main/LICENSE">
    <img src="https://img.shields.io/github/license/hilalahmad0101/php-date-time" alt="License">
  </a>
</p>
 
 ###### 20+ function you can use it in your project make your project with better data and time.

## Installation

You can install this package using Composer, a popular PHP package manager:

```bash
composer require hilalahmad/date-time
```
 
## Basic Usage

Here's an example of how to use the HttpClient package to send a GET request:

```bash
use Hilalahmad\DateAndTime\DateAndTime;
  

// Format the current date
$formattedDate = DateAndTime::formatDate('Y-m-d H:i:s', '2020234');
echo "Formatted Date: $formattedDate\n";

// Calculate the difference between two dates
$date1 = '2022-01-01 00:00:00';
$date2 = '2022-01-29 00:00:00';
$daysDifference = DateAndTime::dateDifference($date1, $date2, 'days');
echo "Days Difference: $daysDifference\n";

// Parse a date string
$dateString = '2022-12-31 23:59:59';
$parsedDate = DateAndTime::parseDate($dateString);
echo "Parsed Date: " . $parsedDate->format('Y-m-d H:i:s') . "\n";

// Get the current timestamp
$currentTimestamp = DateAndTime::getCurrentTimestamp();
echo "Current Timestamp: $currentTimestamp\n";

$futureDate = '2023-12-31 12:00:00';
$pastDate = '2020-01-01 00:00:00';

$futureCheck = DateAndTime::isInFuture($futureDate);
$pastCheck = DateAndTime::isInPast($pastDate);

echo "Is $futureDate in the future? " . ($futureCheck ? 'Yes' : 'No') . "\n";
echo "Is $pastDate in the past? " . ($pastCheck ? 'Yes' : 'No') . "\n";

$newDate = DateAndTime::addYears('2022-01-01 00:00:00', 5);
echo "Date after adding 5 years: $newDate\n";

$previousMonth = DateAndTime::subtractMonths('2022-08-15 12:00:00', 1);
echo "Date after subtracting 1 month: $previousMonth\n";

$dayOfWeek = DateAndTime::getDayOfWeek('2022-11-20 00:00:00');
echo "Day of the week: $dayOfWeek\n";


$age = DateAndTime::calculateAge('1990-05-15');
echo "Age: $age\n";

$overlap = DateAndTime::doDateRangesOverlap('2022-01-01', '2022-01-10', '2022-01-05', '2022-01-15');
echo "Do date ranges overlap? " . ($overlap ? 'Yes' : 'No') . "\n";

$timestamp = strtotime('2023-11-16 16:34:56');
$relativeTime = DateAndTime::relativeTime($timestamp);
echo "Relative Time: $relativeTime\n";

$weekNumber = DateAndTime::getCurrentWeekNumber();
echo "Current Week Number: $weekNumber\n";

$isCurrentMonth = DateAndTime::isCurrentMonth(2022, 11);
echo "Is November 2022 the current month? " . ($isCurrentMonth ? 'Yes' : 'No') . "\n";

$isWeekend = DateAndTime::isWeekend('2022-11-20');
echo "Is November 20, 2022, a weekend? " . ($isWeekend ? 'Yes' : 'No') . "\n";

$quarter = DateAndTime::getQuarter('2022-11-15');
echo "Quarter of November 15, 2022: $quarter\n";

$isFutureYear = DateAndTime::isFutureYear(2023);
echo "Is 2023 a future year? " . ($isFutureYear ? 'Yes' : 'No') . "\n";

$isToday = DateAndTime::isToday('2022-11-15');
echo "Is today November 15, 2022? " . ($isToday ? 'Yes' : 'No') . "\n";

$nextWeekdays = DateAndTime::getNextWeekdays('2022-11-15', 5);
echo "Next 5 weekdays from November 15, 2022: " . implode(', ', $nextWeekdays) . "\n";

$lastDayOfMonth = DateAndTime::getLastDayOfCurrentMonth();
echo "Last day of the current month: $lastDayOfMonth\n";

$isMorning = DateAndTime::isInMorning('2022-11-15 08:30:00');
echo "Is 8:30 AM on November 15, 2022, in the morning? " . ($isMorning ? 'Yes' : 'No') . "\n";

$nextMonths = DateAndTime::getNextMonths('2022-11-15', 3);
echo "Next 3 months from November 15, 2022: " . implode(', ', $nextMonths) . "\n";

$daysDifference = DateAndTime::getDaysDifference('2022-01-01', '2023-01-01');
echo "Days Difference: $daysDifference\n";

$leapYearCheck = DateAndTime::isLeapYear(2024);
echo "Is 2024 a leap year? " . ($leapYearCheck ? 'Yes' : 'No') . "\n";

$monthRange = DateAndTime::getMonthRange(2022, 8);
echo "August 2022 Range: {$monthRange['first_day']} to {$monthRange['last_day']}\n";
``` 
## Contribution

If you'd like to contribute to this package or report issues, please check the  <a href="https://github.com/fullstack124/php-date-time/issues"> Github repo</a> for more details.
 
## License
This package is open-source and is licensed under the MIT License. 
 
