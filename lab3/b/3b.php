<!DOCTYPE html>
<html>
<head>
 <!-- <meta charset="utf-8"> -->
  <title>Гостевая книга</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script type="text/javascript">

  $('document').ready(function() {
    $('#button').on('click', function() {
      $('.form_box .rfield').each(function() {
        if ($(this).val() != '') {
          console.log(32);
          // Если поле не пустое удаляем класс-указание
          $(this).removeClass('empty_field');
        } else {
          console.log(33);
          // Если поле пустое добавляем класс-указание
          $(this).addClass('empty_field');
        }
      });
	   
	   if ($("#letter").val().length >10) {
          console.log(32);
          // Если поле не пустое удаляем класс-указание
          $("#letter").removeClass('empty_field');
        } else {
          console.log(33);
          // Если поле пустое добавляем класс-указание
          $("#letter").addClass('empty_field');
          alert("Текст сообщения содержит меньше 11 символов");
        }


		 if ($("#ml").val() != '' && $("#ml").val().indexOf("@",1)!==-1) {
          console.log(32);
          // Если поле не пустое удаляем класс-указание
          $("#ml").removeClass('empty_field');
        } else {
          console.log(33);
          // Если поле пустое добавляем класс-указание
          $("#ml").addClass('empty_field');
         }
         
        
      });
    });
     
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
    <style type="text/css">
     body {
		 
    background-color: rgb(212, 231, 238);
    }
     textarea.empty_field {
      border-width: 2px;
      border-color: red;
     }
    .form_box input.empty_field {
      border-width: 2px;
      border-color: red;
    }
    .form_box {
      width: 300px;
      margin: 40px left;
    }
    .form_box input {
      display: block;
      border: 2px solid #cfcfcf;
      font-size: 14px;
      color: #444444;
      padding: 7px 7px 8px;
      width: 250px;
      margin-bottom: 10px;
      transition: all 0.5s;
      -webkit-transition: all 0.5s;
      -moz-transition: all 0.5s;
    }
    .form_box input:focus {
      outline: none;
      border-color: #07a6e6;
    }
      #button {
     width: 260px;  
   }
     #ava {
      width: 60px;
      margin: 40px auto;
      border-radius: 10%;
    } 
     #capcha {
    width: 100px;
    }
    #letter {
     height: 150px; 
    }
    .content {  display:inline-block;
	width: 50%}
	   .menu {
        display:flex;
        max-width: 100%;
        height: auto
    }
	.comm1 {	
	border:  1px dotted grey;
	 margin-bottom: 10px;
	 padding: 5px;
	}
	#show_more {
	background-color: rgb(212, 235, 240);
	border-color: lightgrey;
	font-family: Tahoma;
	font-size: 14px;
	color: grey;
	position: relative;
	margin-bottom: 10px;
	}
  </style>
</head>
<body>
 <!-- <img id="ava" src="https://st.depositphotos.com/1779253/5140/v/950/depositphotos_51405259-stock-illustration-male-avatar-profile-picture-use.jpg">
-->
<div class="menu">
<div class="form_box">
  <p id="gost" align="left"><font size=5 >ГОСТЕВАЯ КНИГА</font>
   <p id="comm">Здесь Вы можете отсавить свой отзыв о работе сотрудников, 
  выразить благодарность или задать любые интересующие Вас вопросы!</p>
   <form name="user" id="form1">
     <br> Ваше имя:
     <input class="rfield" type="text" name="f" size="30" > 
	 <br> Ваш e-mail:
	 <input class="rfield" id="ml"  type="text" name="e" size="35" >
	 <br> Текст сообщения:<br>
	<!-- <input type="text" class="rfield" id="letter" name="text"  cols="33" rows="8"></textarea>-->
<textarea class="rfield" id="letter" name="text"  cols="33" rows="8"></textarea>	
 <br>
     <input type="button" id="button" value="Отправить" >
   </form> 
 </div>
 
 <!-- ,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,-->
    <div id="content">
	 <i><h1 id="titli">Комментарии</h1></i>
	  	 <input id="show_more" count_show="3" count_add="5" type="button" value="Показать еще" />
        <?php
            // выведем в самом начале 5 комментов
            include "db.php";
             
            $sql = mysqli_query($db_connect,"
                SELECT * FROM tbl_comm ORDER BY  `Time_comm` DESC LIMIT 3 
            ") or die(mysqli_error());
            $commData = array();
            while($result = mysqli_fetch_array($sql)){
                $commData[] = $result;
            }           
            foreach($commData as $oneComm): 
        ?>
        <div class="comm1">
            <img src="<?php echo $oneComm['pic']; ?>" alt="">
			Написал(а): <b><?=$oneComm['Name_comm'];?></b>
			<p><?=$oneComm['Time_comm'];?></p>
			<p><?=$oneComm['Text_comm'];?></p>
		
        </div>
        <?php endforeach; ?>
		  
    </div>     

  </div>
  
</body>

</html>
