<?php
/* Принимаем данные от Ajax */

$title = $_POST['title'];
$name = $_POST['name'];
$id = $_POST['id'];


class Vote {

    const DB_NAME = "vote.db"; //БД
    protected $_db;
    
    function __construct() {
        $this->_db = new SQLite3(self::DB_NAME);
    }
    function __destruct() {
        unset ($this->_db);
    }
    /* В этой функции $name - ассоциативный массив который 
     *  при помоши цикла for разделяем и отдельно заносим  в БД
     */
   function addVote ($title, $name) {
       for ($index = 0; $index < count($name); $index++) {
               
        $sql = "INSERT INTO vote (title,name,count) VALUES ('$title','$name[$index]',0)";
        $res = $this->_db->query($sql);
 
       }
       echo "Данные добавлены";
       return $res;
       
 
   }
    /* Получаем все данные с таблицы vote */
   function getVote() {
       $sql = "SELECT * FROM vote";
       return $this->_db->query($sql);

       
   }
        /* Получаем тему голосования */
      function getTitleVote() {
       $sql = "SELECT title FROM vote";
       return $this->_db->querySingle($sql);

       
   }
    /* Обновляем на 1 в поле  count $id - это идентификатор вопроса */
   function setVote ($id) {
       $sql = "UPDATE vote SET count = (SELECT count FROM vote WHERE id = $id ) + 1 WHERE id = $id";
       echo "Спасибо, Ваши данные внесены";
       return $this->_db->query($sql);
       
   }
    /* Общая сумма всех голосов */
   function sumVote() {
       $sql = "SELECT SUM(count) FROM vote";
       return $this->_db->querySingle($sql);
       
   }


}
 // Обьявляем обьект Vote
$vote = new Vote();

if($title && $name) {
    $vote->addVote($title, $name);
        
}

if($id) {
    $vote->setVote($id);
}

?>
