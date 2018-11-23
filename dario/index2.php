<style>
.cell {
background-color:#cccccc;
border-style: groove;
}
.gcell {
background-color:#00cc00;
border-style: groove;
}
</style>
<form action="index2.php" method="POST" >
<select id="sel" name="selects" class="reg" onchange="this.form.submit()" class="frez"  >
   <option>-seleccione- </option>
   <option value="0">DJistra</option>
   <option value="1">BFS</option>
   <option value="2">DFS</option>
   <option value="3">DFSwL</option>
   <option value="4">IDFS</option>
   <option value="5">Best First</option>
   <option value="6">A*</option>
   <option value="7">Local</option>
   <option value="8">Local w mem</option>
</select>
</form>

<?php
$start="9,6";
$finish="9,2";
$bann=false;
$done=false;
$blacklist=array("3,1","4,1","6,1","7,1","1,4","2,4","2,5","3,3","3,4","3,5","4,3","4,4","4,5","6,3","6,4","6,5","7,3","7,4","7,5","8,5","9,5","9,4","9,3","10,3","11,3","11,5","11,6","12,3","12,5","13,3","13,5");
/*$start="CCF";
$finish="BRU";*/

error_reporting(E_ALL ^ E_NOTICE);
$selected=!htmlentities(addslashes($_POST['selects'])) ?  $selected : htmlentities(addslashes($_POST['selects']));


$contG=0;
$x=1;
$y=0;
echo"<table>";
while ($y<7){
echo"<tr><td class='cell'>".$y."</td>";
while ($x<15 && $banner==0){
echo  "<td class='cell'>".$x."</td>";
	$x++;

}
	while ($x<15 && $banner==1){
		$strang = $x.",".$y;
		if ($selected < 5){
		if (array_search($strang,$blacklist)!=NULL){
			echo  "<td class='bcell'></td>";
		}
		else{
			echo  "<td class='cell'>1</td>";
		
		if($x<15){
			//right
			$m=$x+1;
			$string = $m.",".$y;
			if (array_search($string,$blacklist)==NULL){
			$grafo[$contG]= array($strang,$string,1);
			$contG++;}
		}
		if($y>1){
			//up
			$m=$y-1;
			$string = $x.",".$m;
			if (array_search($string,$blacklist)==NULL){
			$grafo[$contG]= array($strang,$string,1);
			$contG++;}
		}
		if($x>1){
			//left
			$m=$x-1;
			$string = $m.",".$y;
			if (array_search($string,$blacklist)==NULL){
			$grafo[$contG]= array($strang,$string,1);
			$contG++;}
		}
		
		
		if($y<7){
			//down
			$m=$y+1;
			$string = $x.",".$m;
			if (array_search($string,$blacklist)==NULL){
			$grafo[$contG]= array($strang,$string,1);
			$contG++;}
		}
}

}
else{
	if ($grafo[$strang]== NUll){
		$grafo[$strang]=array();
	array_push($grafo[$strang],array($x,$y));
	}
		
		if (array_search($strang,$blacklist)!=NULL){
			echo  "<td class='bcell'></td>";
		}
		else{
			echo  "<td class='cell'>1</td>";
		
		
		if($x>1){

			$m=$x-1;
			$string = $m.",".$y;
			//echo $strang.' el '.$string."<br>";
			if (array_search($string,$blacklist)==NULL)
			array_push($grafo[$strang],array($string));
		}
		if($x<15){
			$m=$x+1;
			$string = $m.",".$y;
			//echo $strang.' de '.$string."<br>";
			if (array_search($string,$blacklist)==NULL)
			array_push($grafo[$strang],array($string));
		}
		if($y>1){
			$m=$y-1;
			$string = $x.",".$m;
			//echo $strang.' mi '.$string."<br>";
			if (array_search($string,$blacklist)==NULL)
			array_push($grafo[$strang],array($string));
		}
		if($y<7){
			$m=$y+1;
			$string = $x.",".$m;
			//echo $strang.' '.$string."<br>";
			if (array_search($string,$blacklist)==NULL)
			array_push($grafo[$strang],array($string));
		}
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

//var_dump($grafo);
switch($selected){
//djistra
case 0 :
function dijikstra($grafos, $nod1,$nod2){
$vertices = array();
$conectados = array();
$arco = array();

foreach ($grafos as $V){
array_push($vertices, $V[0], $V[1]);
$conectados[$V[0]][] =  array('ultimo' => $V[1], 'cost' => $V[2]);

}

$vertices = array_unique($vertices);
foreach($vertices as $Vx){
	$dist[$Vx] = INF;
	$ant[$Vx] = NULL;
}

$dist[$nod1]=0;
$g=$vertices;
while (count($g)>0){
$min=INF;
foreach($g as $Vx){
 if($dist[$Vx] < $min){
$min = $dist[$Vx];
$u = $Vx;
}
}
echo "g:{".implode(" - ",$g)."}\n";
$g = array_diff($g, array($u));
if ($dist[$u] == INF or $u == $nod2){
echo "End ";
break;
}
if (isset($conectados[$u])){
foreach($conectados[$u] as $arr){

 $sum = $dist[$u] + $arr["cost"];
   if($sum < $dist[$arr["ultimo"]]){
   $dist[$arr["ultimo"]] = $sum;
   $ant[$arr["ultimo"]]= $u;
   }
  }
 }
}
$last= $dist[$u];
$u = $nod2;
while (isset ($ant[$u])){
array_unshift($arco, $u);
$u = $ant[$u];


}
array_unshift($arco,$u);
echo "<br>Peso: ".$last;
return $arco;
}


$camino = dijikstra($grafo,$start,$finish);
echo "<br>path:{".implode(" - ",$camino)."}\n";
break;
//Busqueda por amplitud
case 1:
$visited = array();

function BFS($root,$array,$endNode) {

   foreach ($array as $key => $val) {
	  
       if ($val[0] === $root) {
		   
		  $Open[array_search($val,$array)]= array($val[0],$val[1]);
		  //var_dump ($Open);
       }
   }
 function sear($open,$closed,$endNode,$root,$all){
	 global $bann;
	 
	 if($bann != true){
   foreach($open as $key=> $val){
	   if ($val[1] != $endNode && !array_search($val,$closed)) {
		  array_push($closed,array($val[0],$val[1]));
		  unset($open[array_search($val,$open)]);
       }  
	   else{
		   
		   array_push($closed,array($val[0],$val[1]));
		   unset($open[array_search($val,$open)]);
		   $bann = true;
		   return regresar($root,$val[1],$closed,$visited,false);
		   
		   
	   }
   }
   foreach($closed as $key=> $val){
	   foreach ($all as $key1=> $val1) {
		   
      	  if ($val[1] === $val1[0] && $open[array_search($val1,$all)] == NULL && !array_search(array($val1[0],$val1[1]),$closed) ) {
		  $open[array_search($val1,$all)]= array($val1[0],$val1[1]);
		
		  }
	   
	   
		}
		
   }
   
   sear($open,$closed,$endNode,$root,$all);
	   
	   
 }
 }
 
 function regresar($Target,$current,$Haystack,$visited,$done){
	 global $done;
	 foreach($Haystack as $key=>$val){
		
		if ($done == false){
		 if ($val[1] == $current ){
			 
		     echo "<br>".$val[0]." - ".$val[1];
		
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
			 $done = true;
			 return $done;
			}
			else{
				regresar($Target,$current,$Haystack,$visited,$done);
			    
				  
		 }}
		}
	 }
 }
sear($Open,$closed=array(),$endNode,$root,$array);
}
BFS($start,$grafo,$finish);
break;
//Busqueda por profundidad simple
case 2:
$visited = array();
function DFS($root,$array,$endNode) {
	
function getopen($root,$array){
	$Open=array();
   foreach ($array as $key => $val) {
	  
       if ($val[0] === $root) {
		  array_push($Open, array($val[0],$val[1]));
		  
       }
    }
	return $Open;
}
 function sear($open,$closed,$endNode,$root,$all){
	 global $done;
   foreach($open as $key=> $val){
	   if ($val[1] != $endNode) {
		   if (array_search($val,$closed)!=NULL){
		   return false;
		   }
		  array_push($closed,array($val[0],$val[1]));
		  unset($open[array_search($val,$open)]);
		  $Open=getopen($val[1],$all);
		  if (!$done){
		  sear($Open,$closed,$endNode,$root,$all);
       }  
	   }
	   else{
		   array_push($closed,array($val[0],$val[1]));
		   unset($open[array_search($val,$open)]);
		   return
			$done =regresar($root,$val[1],$closed,$visited);
		   
		   break;
	   }
   } 
	   
   }
 
 function regresar($Target,$current,$Haystack,$visited){
	 foreach($Haystack as $key=>$val){
		if ($done == false){
		 if ($val[1] == $current ){
			 
		     echo "<br>".$val[0]." - ".$val[1];
		
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
sear(getopen($root,$array),$closed=array(),$endNode,$root,$array);
}
DFS($start,$grafo,$finish);
break;
//Busqueda por profundidad Iterativa
case 4:
$visited = array();
function DFSI($root,$array,$endNode) {
	global $done;
function getopen($root,$array){
	$Open=array();
   foreach ($array as $key => $val) {
	  
       if ($val[0] === $root) {
		  array_push($Open, array($val[0],$val[1]));
		  
       }
    }
	return $Open;
}
 function sear($open,$closed,$endNode,$root,$all,$limit,$noOfArchs,$history){
	 global $done;
   foreach($open as $key=> $val){
	   if ($val[1] != $endNode) {
		   if (array_search($val,$closed)!=NULL){
		   return false;
		   }
		 
			if ($history[$val[1]]==NULL){
		  array_push($closed,array($val[0],$val[1]));
		  $history[$val[1]]=true;
		  /*echo "number :".$noOfArchs." <= ".$limit."<br>";
		  echo "arch:".$val[0]." - ".$val[1]."<br>";
		  var_dump($history);*/
		  unset($open[array_search($val,$open)]);
		  $Open=getopen($val[1],$all);
		  if (!$done && $noOfArchs <= $limit){
		  /*echo "number :".$noOfArchs." <= ".$limit."<br>";
		  echo "arch:".$val[0]." - ".$val[1]."<br>";*/
			  
		  sear($Open,$closed,$endNode,$root,$all,$limit,$noOfArchs+1,$history);
       }  
	   }}
	   else{
		   array_push($closed,array($val[0],$val[1]));
		   unset($open[array_search($val,$open)]);
		   return
			$done =regresar($root,$val[1],$closed,$visited);
		   
		   break;
	   }
   } 
	   
   }
 
 function regresar($Target,$current,$Haystack,$visited){
	 foreach($Haystack as $key=>$val){
		if ($done == false){
		 if ($val[1] == $current ){
			 
		     echo "<br>".$val[0]." - ".$val[1];
		
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
 $var[$root]=true;
 $lim =0;
 $increment = 1;
sear(getopen($root,$array),$closed=array(),$endNode,$root,$array,$lim,1,$var);
while($done == false){
	echo $lim." + ".$increment."<br>";
	$lim=$lim+$increment;
sear(getopen($root,$array),$closed=array(),$endNode,$root,$array,$lim,1,$var);
}
}
DFSI($start,$grafo,$finish);
break;
case 3:
$visited = array();
function DFSL($root,$array,$endNode) {
function getopen($root,$array){
	$Open=array();
   foreach ($array as $key => $val) {
	  
       if ($val[0] === $root) {
		  array_push($Open, array($val[0],$val[1]));
		  
       }
    }
	return $Open;
}
 function sear($open,$closed,$endNode,$root,$all,$limit,$noOfArchs,$history){
	 global $done;
   foreach($open as $key=> $val){
	   if ($val[1] != $endNode) {
		   if (array_search($val,$closed)!=NULL){
		   return false;
		   }
		 
			if ($history[$val[1]]==NULL){
		  array_push($closed,array($val[0],$val[1]));
		  $history[$val[1]]=true;
		  /*echo "number :".$noOfArchs." <= ".$limit."<br>";
		  echo "arch:".$val[0]." - ".$val[1]."<br>";
		  var_dump($history);*/
		  unset($open[array_search($val,$open)]);
		  $Open=getopen($val[1],$all);
		  if (!$done && $noOfArchs <= $limit){
		  /*echo "number :".$noOfArchs." <= ".$limit."<br>";
		  echo "arch:".$val[0]." - ".$val[1]."<br>";*/
			  
		  sear($Open,$closed,$endNode,$root,$all,$limit,$noOfArchs+1,$history);
       }  
	   }}
	   else{
		   array_push($closed,array($val[0],$val[1]));
		   unset($open[array_search($val,$open)]);
		   return
			$done =regresar($root,$val[1],$closed,$visited);
		   
		   break;
	   }
   } 
	   
   }
 
 function regresar($Target,$current,$Haystack,$visited){
	 foreach($Haystack as $key=>$val){
		if ($done == false){
		 if ($val[1] == $current ){
			 
		     echo "<br>".$val[0]." - ".$val[1];
		
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
 $var[$root]=true;
 $lim =16;

sear(getopen($root,$array),$closed=array(),$endNode,$root,$array,$lim,1,$var);
}
DFSL($start,$grafo,$finish);
break;
//Busqueda de primero el mejor
case 5:

echo A_star($start,$grafo,$finish,array(),array());
//var_dump ($grafo);
break;
//Busqueda A*
case 6:
echo A_star($start,$grafo,$finish,array(),array());
break;
//Busqueda Local
case 7:
mntn($finish,$start,$grafo);
break;
//Busqueda subir la colina (local con memoria)
case 8:
break;
}
function A_star($curr,$grafo,$end,$open,$closed){
	//var_dump($open);
	global $bann;
	$currentW=calcW($closed,$curr);
	if($curr != $end){
	if ($grafo[$curr]!= NULL) 
	foreach($grafo[$curr] as $key){
		if ($key[1]== NULL){
			
			$targetx=$grafo[$key[0]][0][0];
			$targety=$grafo[$key[0]][0][1];
			$currentf=f($currentW,$currentx,$currenty,$targetx,$targety,$grafo[$finish][0][0],$grafo[$finish][0][1]);
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
	if ($closed[$val]==NULL)
	if($key2[0][1]<$bestm || $bestm==NULL ){
			 $bestm=$key2[0][1];
			 $winner=$val;
			 $curr=$val0;}
	}}
	//var_dump($closed);
	//var_dump($open);
	$closed[$winner]=array($curr,$open[$curr][$winner][0][0]);
	unset($open[$curr][$winner]);
	echo $currentx." in X , ".$currenty. " in Y<br>";
	echo "winner is ".$winner." ".$bestm."<br>";
	
A_star($winner,$grafo,$end,$open,$closed);
	
	}elseif($bann == false){
		global $start;
		//var_dump($closed);
		backlog($start,$curr,$closed,array());
		
		$bann=true;
	}
}
function calcW($closed,$to){
	if ($closed[$to]!= NULL){
		return $closed[$to][1];
	}
	return 0;
}
function f($current,$x1,$y1,$x2,$y2,$xf,$yf){
	global $selected;
	switch ($selected){
	case 5:
	return g($current,$x1,$y1,$x2,$y2)*0+(h($x2,$y2,$xf,$yf));
	break;
	case 6:
	return g($current,$x1,$y1,$x2,$y2)+(h($x2,$y2,$xf,$yf));
	break;
	
	}
}
function g($current,$x1,$y1,$x2,$y2){
	$x=abs($x2-$x1);
	$y=abs($y2-$y1);
	return (sqrt(pow($x,2)+pow($y,2)))+$current;
}
function h($x1,$y1,$x2,$y2){
	$x=abs($x2-$x1);
	$y=abs($y2-$y1);
	return sqrt(pow($x,2)+pow($y,2));
	
}
function backlog($Target,$current,$Haystack,$visited){
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
				return backlog($Target,$current,$Haystack,$visited,$done);
			    
				  
		 }}
		}
	 }
 }
 function mntn($Target,$current,$graph){
	 //var_dump($graph);
	if ($graph[$current]!= NULL) {
	foreach($graph[$current] as $key){
		if ($key[1]== NULL){
			
			$targetx=$graph[$key[0]][0][0];
			$targety=$graph[$key[0]][0][1];
			//echo $targetx." ".$targety."<br>";
			$currentf=h($targetx,$targety,$graph[$Target][0][0],$graph[$Target][0][1]);
			
			$open[$current][$key[0]][0][0]=0;
			$open[$current][$key[0]][0][1]=$currentf;
		}
	else{
		$currentx = $key[0];
		$currenty = $key[1];
	}
	}
	//var_dump($open[$current]);
	foreach($open  as $val0 => $key1){
		foreach ($key1 as $val => $key2){
	if($key2[0][1]<$bestm || $bestm==NULL ){
			 $bestm=$key2[0][1];
			 $winner=$val;}
	}}
	/*echo $graph[$winner][0][0]." ".$graph[$winner][0][1]."<br>";
	*/
	$currm=h($graph[$current][0][0],$graph[$current][0][1],$graph[$Target][0][0],$graph[$Target][0][1]);
	if ($bestm < $currm){
	echo $winner." - ".$bestm."<br>";
	
	mntn($Target,$winner,$graph);}
	}
 
 }
 function newmap($graph,$path){
	 $x=1;
	 $y=0;
	 global $blacklist;
	 global $start;
	 echo"<table>";
		while ($y<7){
		echo"<tr><td class='cell'>".$y."</td>";
			while ($x<15 && $banner==0){
			echo  "<td class='cell'>".$x."</td>";
			$x++;
			}
			while ($x<15 && $banner==1){
				$string = $x.",".$y;
				
				if (array_search($string,$blacklist)!=NULL){
				echo  "<td class='bcell'></td>";
				$val=0;}
				else{
				if (array_search($string,$path) || $string==$start){
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
?>