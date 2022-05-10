<?php
include "db.php"; // подключение к базе данных
 
$countView = (int)$_POST['count_add'];  // количество записей, получаемых за один раз
$startIndex = (int)$_POST['count_show']; // с какой записи начать выборку
 
// запрос к бд
$sql = mysqli_query($db_connect,"
    SELECT * FROM `tbl_news` LIMIT $startIndex, $countView
") or die(mysqli_error());
$newsData = array();
while($result = mysqli_fetch_array($sql)){
    $newsData[] = $result;
}
 
if(empty($newsData)){
    // если новостей нет
    echo json_encode(array(
        'result'    => 'finish'
    ));
}else{
    // если новости получили из базы, то сформируем html элементы
    // и отдадим их клиенту
    $html = "";
    foreach($newsData as $oneNews){
   $c1 .='<img src="'.$oneNews['pic'].'" div="">';
        $html .= "
            <div class=news1>
                ".$c1."			
	            <b>{$oneNews['title']}</b>
				<p>{$oneNews['big_text']}</b>
            </div>
        ";
		$c1='';
    }
    echo json_encode(array(
        'result'    => 'success',
        'html'      => $html
    ));	
}
?>