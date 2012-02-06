<?php 


include 'ajax_vote.php';


$vote = new Vote();

$vote_array = $vote->getVote();

$sum = $vote->sumVote();

?>
  
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="style.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    
        $('#vote_form :button').click(function() {
            
            /* В переменную id заносим данные которые пользователь выберет в форме */
            var id = $('#vote_form :radio:checked').val();
       
             /* Отправляем аяксом идентификатор вопроса */
            $.ajax({
                type: "POST",
                url: "ajax_vote.php",
                data: {id: id},
                error: function() {alert('Ошибка, данные не передались')},
                success: function(data) {alert(data)
                location.href = "index.php";
                }
            });
            
            /* Чтобы кнопка не срабатывала с точки зрения HTML*/
            return false;
        });
   
    
});        
    
</script>
    </head>
    <body>
        
<div id="vote_form">
    <h3><?php   echo $vote->getTitleVote(); ?></h3>
     <form>

    <?php while ($res = $vote_array->fetchArray(SQLITE3_ASSOC)): ?>

            <input type="radio" value="<?php echo $res['id']; ?>" name="vote"/><?php echo $res['name']; ?><br/>

    <?php endwhile; ?>

      <button>Голосовать</button>
     </form>     
</div>         
        
        
        
        
 <div class="vote">

         <?php while ($res = $vote_array->fetchArray(SQLITE3_ASSOC)):
             $a = $res['count'];
         /* В $c попадает количестро процентов от 100% */
          $c =  round(($a / $sum) * 100);  
      
 ?>
       
        <dl>
            <dt><b><?php echo $c; ?>%</b><div>(<?php  echo $res['count']; ?>)</div></dt>
            
                <dd><?php echo $res['name']; ?>
                    
                <div style="width: <?php echo $c; ?>%" class="othe_vote"></div>
            </dd>
        </dl>
     
         <?php endwhile; ?>
        <b>Всего голосов: <?php echo $sum; ?></b>
</div>
        
    </body>
</html>





