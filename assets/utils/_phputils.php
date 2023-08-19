<?php
    function dateTimeFormater($inputDateTime, $outputFormat) {
        // Step 1: Parse the Date-Time String
        list($time, $date) = explode(" ", $inputDateTime);
        list($hours, $minutes) = explode(":", $time);
        list($month, $day, $year) = explode("/", $date);

        // Step 2: Convert to Unix Timestamp
        $unixTimestamp = strtotime("$year-$month-$day $hours:$minutes:00");

        // Step 3: Format to the desired output format
        $formattedDateTime = date($outputFormat, $unixTimestamp);

        return $formattedDateTime;
    }
?>