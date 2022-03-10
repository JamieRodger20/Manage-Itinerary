<?php
echo "<h3>Edit Itinerary</h3>";
$setstring='';
$itinerary_id='';
if (isset($_POST['submit']))
{
foreach($_POST as $name=>$value)
{
if($name<>'submit' AND $name<>'id' )
{$setstring=$setstring.",".$name."='".html_entity_decode($value)."'";}
if($name=='id' and $value<>'') {$itinerary_id=$value;$setstring=$name."='".html_entity_decode($value)."'".$setstring;}
}
if ( $_POST['submit']=='Update'){
update_table($db,'itinerary',$setstring,'id='.$itinerary_id);
}
if ( $_POST['submit']=='Create'){
add_to_table($db,'itinerary',ltrim($setstring, ','));
$insertedid=$db->lastInsertId();
 header('Location: /index.php?page='.$insertedid);
}
}
else
{
if (isset($_GET['itinerary'])){$itinerary_id=$_GET['itinerary'];}
echo"<form action='' method='POST'>\n";
echo"<input type='hidden' name='id' value='".$itinerary_id."'/>\n";
generate_addedit_form($db,'itinerary',$itinerary_id);
echo"<input class='submit button' type='submit' name='submit' value='Update'/>\n";
echo"<input class='submit button' type='submit' name='submit' value='Create'/>\n";
echo " </form>\n";
}


?> 
