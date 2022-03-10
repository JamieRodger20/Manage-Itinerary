<?php

class Itinery{
	
public function __construct(){}
	
	
}

function get_event_itinery($db,$eventid){
	$itineryquery="Select * , itinerary.id as iid from (itinerary left join participants on itinerary.id=participants.itinerary_ref) where event_id=:eventid order by date,time_start asc";  
	$itinery=$db->prepare($itineryquery); 
	$itinery->execute(array(':eventid'=>$eventid));
	$itinery->setFetchMode(PDO::FETCH_CLASS,'Itinery');
	$itinerary=$itinery->fetchAll() or die('<h1> Error - Itinery not found</h1>The Itinery you are looking for does not exist.');
	return $itinerary;
}


?>
