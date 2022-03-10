<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
echo "<h2>Manage Itinerary</h2>";
$eventid = filter_input(INPUT_POST, 'event', FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);
if ($eventid == '') {
    $eventid = 62;
}
$events = get_all_events($db, '2022');

echo "<form action=''method='post'>Select an Event <select name='event'><option>----</option>";

foreach ($events as $event) {
    echo "<option value='" . $event->eid . "'";
    if ($event->eid == $eventid) {
        echo "selected ";
    }
    echo ">" . $event->title . "(" . $event->eid . ")</option>";
}
echo "</select><input type=submit name=submit value=submit /></form>";
echo "<div class=' '><table border='1px'>";
$itinerary = get_event_itinery($db, $event->eid);
foreach ($itinerary as $itinerary_row) {

    echo "<tr><td>" . $itinerary_row->time_start . "</td><td>" . $itinerary_row->slot_title . "</td><td>" . $itinerary_row->subtitle . "</td><td><a href='edit_itinerary?itinerary=" . $itinerary_row->iid . "'>Edit</a></td></tr>\n ";
}
echo "</table></div>";
