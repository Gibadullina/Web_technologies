<?php
include "db.php"; // подключение к базе данных
 
$countView = (int)$_POST['count_add'];  // количество записей, получаемых за один раз
$startIndex = (int)$_POST['count_show']; // с какой записи начать выборку
 
// запрос к бд
$sql = mysqli_query($db_connect,"
    SELECT * FROM `tbl_comm` ORDER BY  `Time_comm` DESC LIMIT $startIndex, $countView
") or die(mysqli_error());
$commData = array();
while($result = mysqli_fetch_array($sql)){
    $commData[] = $result;
}
 
if(empty($commData)){
    // если комментов нет
    echo json_encode(array(
        'result'    => 'finish'
    ));
}else{
    // если новости получили из базы, то сформируем html элементы
    // и отдадим их клиенту
    $html = "";
    foreach($commData as $oneComm){
   $c1 .='<img src="'.$oneComm['pic'].'" div="">';
        $html .= "
            <div class=comm1>
                ".$c1."			
			Написал(а): <b>{$oneComm['Name_comm']}</b>
			<p>{$oneComm['Time_comm']}</p>
             <p>{$oneComm['Text_comm']}</p>
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