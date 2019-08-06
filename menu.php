<?php
echo '<head>';
echo '<link rel="stylesheet" type="text/css" href="css/superfish.css">';
echo '<script type="text/javascript" src="jquery-1.4.js"></script>';
echo '<script type="text/javascript" src="superfish.js"></script>';
echo '<script type="text/javascript" src="hoverIntent.js"></script>';
echo '<script type="text/javascript">
$(document).ready(function(){
	jQuery(\'ul.sf-menu\').superfish();
});
</script>';
echo '</head>';

include "cfg/konfigurasi.php";

function get_menu($data, $parent=0){
	static $i=1;
	$tab=str_repeat(" ",$i);
	
	if($data[$parent]){
		$html="$tab<ul class='sf-menu'>";
		$i++;
		foreach($data[$parent] as $v){
			$child=get_menu($data, $v->id);
			$html.="$tab<li>";
			$html.='<a href="'.$v->url.'">'.$v->nama_menu.'</a>';
			if($child){
				$i--;
				$html.=$child;
				$html.="$tab";
			}
			$html.='</li>';
		}
		$html.="$tab</ul>";
		return $html;
	}
	else{
		return false;
	}
}
$sql=mysql_query("SELECT * FROM menutoko ORDER BY od_menu");
while($r=mysql_fetch_object($sql)){
	$data[$r->id_menu][]=$r;
}
$menu=get_menu($data);
echo "$menu";
?>