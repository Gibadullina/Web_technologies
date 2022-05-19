$( function() {
	$("#select").selectmenu({
						        <option>Фасилиск</option>
				                <option>Грифон</option>
				                <option>Цербер</option>
				                <option>Пони</option>
				                <option>Осел</option>
	});
    $( "#accordion" ).accordion();
    $( "#accordion1" ).accordion({
        autoHeight: false
    });
    $( "#accordion2" ).accordion({
        autoHeight: false
    });
    $( "#tabs" ).tabs();

    $( "#dialog-confirm" ).dialog({
        autoOpen: false,
        resizable: false,
        height: "auto",
        width: 400,
        modal: true,
        buttons: {
            "Хочу приключений": function() {
              $( this ).dialog( "close" );
              $( "#dialog-form" ).dialog('close')
              $( "#dialog-ok" ).dialog('open')
            },
            "Назад": function() {
              $( this ).dialog( "close" );
            }
          }
    })
    $( "#dialog-ok" ).dialog({
        autoOpen: false,
        resizable: false,
        height: "auto",
        width: 400,
        modal: true,
        buttons: {
            "Ок": function() {
              $( this ).dialog( "close" );
            }
        }
    })

    $( "#dialog-form" ).dialog({
        modal: true,
        autoOpen: false,
        buttons: {
          Создать: function() {
            // $( this ).dialog( "close" );
            $( "#dialog-confirm" ).dialog('open');
          },
          Закрыть: function() {
            $( this ).dialog( "close" );
          }
        }
      });

    $( "#createElf" ).on( "click", function() {
        $("#heroInfo").text('Вы создаете эльфа')
        $( "#dialog-form" ).dialog( "open" );
    });

    $( "#createOgr" ).on( "click", function() {
        $("#heroInfo").text('Вы создаете огра')
        $( "#dialog-form" ).dialog( "open" );
    });

    $( "#createHuman" ).on( "click", function() {
        $("#heroInfo").text('Вы создаете человека')
        $( "#dialog-form" ).dialog( "open" );
    });

    var handle = $( "#custom-handle" );
    $( "#slider" ).slider({
       value: 50,
      min: 50,
      max: 150,
      step: 50,
      create: function() {
        // handle.text( $( this ).slider( "value" ) );
      },
      slide: function( event, ui ) {
        switch(ui.value) {
            case 50:
                $('#difficulty').text('Сложность: Легко')
                break;
            case 100:
                $('#difficulty').text('Сложность: Средне')
                break
            case 150:
                $('#difficulty').text('Сложность: Сложно')
                break
        }
      }
    });

    var flowers = ["Астра", "Нарцисс", "Роза", "Пион", "Примула",
			      "Подснежник", "Мак", "Первоцвет", "Петуния", "Фиалка"];
            
    $('#name').autocomplete({
        source: flowers
    })

    $( document ).tooltip();
});