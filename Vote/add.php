<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="style.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    
    // по клике на #add_vote(картинка) добавляется дополнительное текстовое поле
    $('#add_vote').click( function () {
                $('#div_vote').append('<div><input type="text"/><img src="rem.png" id="rem_vote"/></div>');
                
     // по клике на #rem_vote(картинка) удаляется выбраное текстовое поле           
       $('#div_vote').on( "click","#rem_vote", function() {
       $(this).parent().remove();
 
    });            
                
    });
    
 
    
   /* При нажатии на кнопку "Отправить" заносим в переменную title
    * данные темы опроса. Далее циклом проходим все поля которые находяться
    * в #div_vote  и выбираем все данные с полей <input type="text"/>
    *  и заносим в массив name.
    */
    $('#button_vote').click(function() {
        var title = $('#title').val();
            var name = [];
           $('#div_vote :text').each(function () {
               var a = $(this).val();
               //все пустые поля пропускаются а остальные заносяться в массив name
               if(a == "") { return true} else { name.push(a);}
              
           });

    /* Используем Ajax для отправки полученных данных
     * где url: это адрес php скрипта где будем принимать
     * методом POST данные.
     * data: это название переменных которые передаем 
     */    
    $.ajax({
    type: "POST",
    url: "ajax_vote.php",
    data: {name: name, title: title},
    error: function() {alert('Ошибка, данные не передались')},
    success: function(data) {alert(data)}
    }); 
        
       return false;
    });

});
</script>
    </head>
    <body>
<center>
   
        <form method="POST">

            <label>Введите тему опроса:</label><br />
            <input type="text" id="title" required/><br />

            <label>Ведите вариант вопроса:</label><br />
            <div id="div_vote">
                <div><input type="text"/><img src="add.png" id="add_vote"/></div>
            </div>

            <br /><button id="button_vote">Добавить</button>
        </form>
</center>
    </body>
</html>





