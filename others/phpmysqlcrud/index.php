<?php;

include('crud.php');
$db = new Database();
$db->connect();
$db->select('table');
$res = $db->getResult();
print_r($res);


$db->update('table',array('column_name'=>'Changed!'),array('id',1));
$db->update('table',array('column_name'=>'Changed2!'),array('id',2));
$res = $db->getResult();
print_r($res);

$db->insert('table',array(3,"Test2","Test3"));
$res = $db->getResult();
print_r($res);

?>