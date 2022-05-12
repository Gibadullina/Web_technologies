<?	
		$connect_error = 'Нет такой таблицы';
$con = mysqli_connect('localhost', 'root');
mysqli_select_db($con,'news') or die($connect_error);
 // Строка запроса на добавление записи в таблицу:
 $sql_add = "INSERT INTO tbl_comm SET Name_comm='" . $_POST['f']
."', Text_comm='".$_POST['text']."', Email_us='"
.$_POST['e']. "'";
 mysqli_query($con, $sql_add); // Выполнение запроса

?>