<?php
$dateTime = $updated_at;
$now = new DateTime();
$interval = $now->diff($dateTime);
$daysAgo = $interval->days;

$time = '';
if ($daysAgo == 0) {
    $time = "Today";
} elseif ($daysAgo == 1) {
    $time = "1 day ago";
} else {
    $time = $daysAgo . " days ago";
}
?>
<div class="relative">
    <p class="absolute top-0 right-1 font-bold tracking-tight text-gray-800 dark:text-white">{{$time}}</p>
</div>
