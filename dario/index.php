<style>
.cell {
background-color:#cccccc;
border-style: groove;
}
</style>
<form action="index.php" method="POST" >
<select id="sel" name="selects" class="reg" onchange="this.form.submit()" class="frez"  >
   <option>-seleccione- </option>
   <option value="0">Lat & Long</option>
   <option value="1">Conexiones</option>
   <option value="2">Distancia</option>
</select>
</form>

<?php
function vincentyGreatCircleDistance(
  $latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius)
{
  // convert from degrees to radians
  $latFrom = deg2rad($latitudeFrom);
  $lonFrom = deg2rad($longitudeFrom);
  $latTo = deg2rad($latitudeTo);
  $lonTo = deg2rad($longitudeTo);

  $lonDelta = $lonTo - $lonFrom;
  $a = pow(cos($latTo) * sin($lonDelta), 2) +
    pow(cos($latFrom) * sin($latTo) - sin($latFrom) * cos($latTo) * cos($lonDelta), 2);
  $b = sin($latFrom) * sin($latTo) + cos($latFrom) * cos($latTo) * cos($lonDelta);

  $angle = atan2(sqrt($a), $b);
  return $angle * $earthRadius;
}
error_reporting(E_ALL ^ E_NOTICE);
$selected=!htmlentities(addslashes($_POST['selects'])) ?  $selected : htmlentities(addslashes($_POST['selects']));
$jsonDecode=json_decode(file_get_contents("https://api.ryanair.com/aggregate/4/common?embedded=airports&market=es~es'"));
$result=array();


$jsonIterator = new RecursiveIteratorIterator(
    new RecursiveArrayIterator($jsonDecode),
    RecursiveIteratorIterator::SELF_FIRST);
switch ($selected){
case 0:
echo"<table> <tr><td class='cell'>Code</td><td class='cell'>Latitude</td><td class='cell'>Longitude</td></tr>";
foreach ($jsonDecode->airports as $keys) {
echo  "<tr><td class='cell'>".$keys->iataCode."</td>";
echo  "<td class='cell'>".$keys->coordinates->latitude."</td>";
echo  "<td class='cell'>".$keys->coordinates->longitude."</td></tr>";

}

break;
case 1:
$mons=0;
echo"<table> <tr><td class='cell'></td>";
foreach ($jsonDecode->airports as $keys) {
echo  "<td class='cell'>".$keys->iataCode."</td>";
$result[$mons]=$keys->iataCode;
$mons++;
}

echo "</tr>";
foreach ($jsonDecode->airports as $kys) {
echo  "<tr><td class='cell'>".$kys->iataCode."</td>";
$route=array();
$cnt=0;
foreach ($kys->routes as $key){
$sub=substr($key,8,3);
$pos=array_search($sub, $result);
if($pos!=NULL){
$route[$cnt]=$pos;
$cnt++;}
}
$mns=0;
 while($mns<$mons){
 if (array_search($mns, $route) != NULL){
 echo "<td class='cell'>1</td>";
 }
else{
echo "<td class='cell'>0</td>";
 }
 $mns++;
 }
unset($route);
}
echo "</table>";
break;


case 2:
$rasult=array();
$mons=0;
echo"<table> <tr><td class='cell'></td>";
foreach ($jsonDecode->airports as $keys) {
echo  "<td class='cell'>".$keys->iataCode."</td>";
$result[$mons][0]=$keys->coordinates->latitude;
$result[$mons][1]=$keys->coordinates->longitude;
$mons++;
$rasult[$mons]=$keys->iataCode;
}

echo "</tr>";

foreach ($jsonDecode->airports as $keys) {
echo  "<tr><td class='cell'>".$keys->iataCode."</td>";
$route=array();
$cnt=0;
foreach ($keys->routes as $key){
$sub=substr($key,8,3);
$pos=array_search($sub, $rasult);

if($pos!=NULL){
$route[$cnt]=$pos-1;
$cnt++;}
}
$msn=0;
while($msn < $mons){
if (array_search($msn, $route) != NULL){
$val= vincentyGreatCircleDistance($keys->coordinates->latitude,$keys->coordinates->longitude,$result[$msn][0],$result[$msn][1],6371);
$val=round($val*100)/100;
echo" <td class='cell'>".$val."Km</td>";

 }
else{
echo "<td class='cell'>\\\\\\\\\\\\\\</td>";
 }
$msn++;
}
unset($route);

}

break;
}


?>