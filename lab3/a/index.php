<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Новости</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"  type="text/javascript"></script>
    <script>
        $(document).ready(function(){
         
            $('#show_more').click(function(){
        var btn_more = $(this);
        var count_show = parseInt($(this).attr('count_show'));
        var count_add  = $(this).attr('count_add');
        btn_more.val('Подождите...');
                 
        $.ajax({
                    url: "ajax.php", // куда отправляем
                    type: "post", // метод передачи
                    dataType: "json", // тип передачи данных
                    data: { // что отправляем
                        "count_show":   count_show,
                        "count_add":    count_add
                    },
                    // после получения ответа сервера
                    success: function(data){
            if(data.result == "success"){
                $('#content').append(data.html);
                    btn_more.val('Показать еще');
                    btn_more.attr('count_show', (count_show+5));
            }else{
                btn_more.val('Больше нечего показывать');
            }
                    }
                });
            });
             
        });     
    </script>
     
</head>
<body>
    <i><h1 id="titli"> Hovostи</h1></i>
    <div id="content">
        <?php
            // выведем в самом начале 5 статей
            include "db.php";
             
            $sql = mysqli_query($db_connect,"
                SELECT * FROM tbl_news LIMIT 5
            ") or die(mysqli_error());
            $newsData = array();
            while($result = mysqli_fetch_array($sql)){
                $newsData[] = $result;
            }           
            foreach($newsData as $oneNews): 
        ?>
        <div class="news1">
            <img src="<?php echo $oneNews['pic']; ?>" alt="">
			<b><?=$oneNews['title'];?></b>
			<p><?=$oneNews['big_text'];?></p>
			
        </div>
        <?php endforeach; ?>
    </div>
     
    <input id="show_more" count_show="5" count_add="5" type="button" value="Показать еще" />
	<style>
    #titli {
	color: black;	
  	width: 100px;
    top: -500px;
    left: 80px;	
	margin: 10px auto;
	}
	
	#show_more {
	background-color: grey;
	color: lightgrey;
	position: relative;	
	width: 20%;
    top: 10px;
    left: 420px;
	border-color: white;
	font-family: Tahoma;
	font-size: 14px;
	}
	img {
	width: 100px;
    top: -500px;
    left: 80px;	
	vertical-align: top;
	}

	body {
      margin: 10px auto;
      width: -4470px;
	  background-color: grey;
    }
    p {
      margin: 10px 10px auto;
      padding: 0 0 .5em;
	  color: grey;
    }
	.news1 {
	text-align: left;
	margin: 10px auto;
	background-color: lightgrey;
	width: 500px;
	border:  thick double grey;
	}
	</style>
</body>
</html>