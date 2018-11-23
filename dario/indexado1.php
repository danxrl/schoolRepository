<?php
echo"<style>
.cell {
background-color:#cccccc;
border-style: groove;
}
.bcell {
background-color:#ff0000;
border-style: groove;
}
.gcell {
background-color:#00ff00;
border-style: groove;
}
</style>";


error_reporting(0);
$bann=false;
$done=false;
$start="1,30";
$finish="60,15";
$grafo=array();
$x=1;
$y=0;
$banner=0;
echo"<table>";
while ($y<31){
echo"<tr><td class='cell'>".$y."</td>";
while ($x<61 && $banner==0){
echo  "<td class='cell'>".$x."</td>";
	$x++;

}
	while ($x<61 && $banner==1){
		if ($x == 15 && $y== 7 || $x == 45 && $y== 23){
			echo  "<td class='bcell'></td>";
		$val=0;}
		else{
			echo  "<td class='cell'>1</td>";
		$val=1;}
		$strang = $x.",".$y;
		if ($grafo[$strang]== NULL){
		$grafo[$strang]=array();
			array_push($grafo[$strang],array($x,$y,$val));
			}
		if($x>1){
			$m=$x-1;
			$string = $m.",".$y;
			array_push($grafo[$strang],array($string));
		}
		if($x<60){
			$m=$x+1;
			$string = $m.",".$y;
			array_push($grafo[$strang],array($string));
		}
		if($y>1){
			$m=$y-1;
			$string = $x.",".$m;
			array_push($grafo[$strang],array($string));
		}
		if($y>30){
			$m=$y+1;
			$string = $x.",".$m;
			array_push($grafo[$strang],array($string));
		}
			$x++;

}
	echo"</tr>";
	$x=1;
	$banner=1;
	$y++;
}
echo "</table>";
$grafo=weightgain("15,7",30,$grafo);
$grafo=weightgain("45,23",30,$grafo);
echo A_star($start,$grafo,$finish,array(),array());

function A_star($curr,$grafo,$end,$open,$closed){
	//var_dump($grafo);
	global $bann;
	echo $curr." ".$end."<br>";
	$currentW=calcW($closed,$curr);
	if($curr != $end){
	if ($grafo[$curr]!= NULL) 
	foreach($grafo[$curr] as $key){
		if ($key[1]== NULL){
			
			$targetx=$grafo[$key[0]][0][0];
			$targety=$grafo[$key[0]][0][1];
			
			$currentf=f($currentW,$currentx,$currenty,$targetx,$targety,$grafo[$end][0][0],$grafo[$end][0][1],$grafo[$key[0]][0][2]);
			if ($open[$curr]==NULL){
			$open[$curr]=array();}
			if($open[$curr][$key[0]]==NULL){
			$open[$curr][$key[0]]=array();}
			array_push($open[$curr][$key[0]],array(g($currentW,$currentx,$currenty,$targetx,$targety),$currentf));
			
		//var_dump ($key);
		}
	else{
		$currentx = $key[0];
		$currenty = $key[1];
	}
	}
	
	foreach($open  as $val0 => $key1){
		foreach ($key1 as $val => $key2){
	if ($closed[$val] == NULL)
	if($key2[0][1]<$bestm || $bestm==NULL ){
			 $bestm=$key2[0][1];
			 $winner=$val;
			 $curr=$val0;}
	}}
	//var_dump($closed);
	//var_dump($open);
	$closed[$winner]=array($curr,$open[$curr][$winner][0][0]);
	unset($open[$curr][$winner]);
	//echo $currentx." in X , ".$currenty. " in Y<br>";
	echo "winner is ".$winner." ".$bestm."<br>";
	
A_star($winner,$grafo,$end,$open,$closed);

	}elseif($bann == false){
		global $start;
		//var_dump($closed);
		regresar($start,$curr,$closed,array());
		
		$bann=true;
	}
}
function calcW($closed,$to){
	if ($closed[$to]!= NULL){
		return $closed[$to][1];
	}
	return 0;
}
function f($current,$x1,$y1,$x2,$y2,$xf,$yf,$w){
	return (g($current,$x1,$y1,$x2,$y2)*0)+(h($x2,$y2,$xf,$yf,$w));
}
function g($current,$x1,$y1,$x2,$y2){
	$x=abs($x2-$x1);
	$y=abs($y2-$y1);
	return (sqrt(pow($x,2)+pow($y,2)))+$current;
}
function h($x1,$y1,$x2,$y2,$w){
	$x=abs($x2-$x1);
	$y=abs($y2-$y1);
	//echo $x." - ".$y." weight ".$w."<br>";
	return sqrt(pow($x,2)+pow($y,2))*1.25+($w);
	
}

function weightgain($node,$weight,$grafo){
if ($weight<1 || $grafo[$node][0][2]>=$weight){
	
return $grafo;
}
else{
$expansion=9/10;
$x=$grafo[$node][0][0];
$y=$grafo[$node][0][1];
//echo $grafo[$node][0][2]."<".$weight."<br>";
$grafo[$node][0][2]= $weight;

		if($x>1){
			//echo $weight*$expansion."<br>";
			$m=$x-1;
			$string = $m.",".$y;
			$grafo=weightgain($string,$weight*$expansion,$grafo);

		}
		if($x<60){
			$m=$x+1;
			$string = $m.",".$y;
			$grafo=weightgain($string,$weight*$expansion,$grafo);
		}
		if($y>1){
			$m=$y-1;
			$string = $x.",".$m;
			$grafo=weightgain($string,$weight*$expansion,$grafo);
		}
		if($y<30){
			$m=$y+1;
			$string = $x.",".$m;
			$grafo=weightgain($string,$weight*$expansion,$grafo);
		}

return $grafo;
}
}
function regresar($Target,$current,$Haystack,$visited){
	global $done;
	 foreach($Haystack as $key=>$val){
		 //echo " ".$key." ".$current." <br>";
		 //var_dump($val);
		if ($done == false){
		 if ($key == $current ){
			 
		     echo "<br>".$key." - ".$val[0];
		
			 if ($visited==NULL)
			 $visited[0]=$current;
			 else
			 array_push($visited,$current);
			 
			 $current=$val[0];
			 
			 
			 if ($val[0]==$Target){
			 array_push($visited,$Target);
			 $visited=array_reverse($visited);
			 echo "<br>path:{".implode(" - ",$visited)."}\n";
			 global $grafo;
			
			 newmap($grafo,$visited);
			 return true;
			}
			else{
				return regresar($Target,$current,$Haystack,$visited,$done);
			    
				  
		 }}
		}
	 }
 }
 function newmap($graph,$path){
	 $x=1;
	 $y=0;
	 echo"<table>";
		while ($y<31){
		echo"<tr><td class='cell'>".$y."</td>";
			while ($x<61 && $banner==0){
			echo  "<td class='cell'>".$x."</td>";
			$x++;
			}
			while ($x<61 && $banner==1){
				$string = $x.",".$y;
				if ($x == 15 && $y== 7 || $x == 45 && $y== 23){
				echo  "<td class='bcell'></td>";
				$val=0;}
				else{
				if (array_search($string,$path)){
				//echo  "<td class='gcell'>".round($graph[$string][0][2])."</td>";
				echo  "<td class='gcell'></td>";
				}
				else{
				//echo  "<td class='cell'>".round($graph[$string][0][2])."</td>";
				echo  "<td class='cell'></td>";
				}
				}
				$x++;

				}
		echo"</tr>";
		$x=1;
		$banner=1;
		$y++;
		}	
	echo "</table>";
	//var_dump($path);
		
 }