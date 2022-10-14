<?php
include ('../config.php');
switch ($_REQUEST['action']){
    case "sendMessage":
        //echo 'sending response back from php page';
        //global $pdo;
        session_start();
        $cur_date = date('Y-m-d H:i:s');
        $query = $pdo->prepare("INSERT INTO messages SET user=?, message=?,date=? ");
        $row = $query->execute([$_SESSION['username'], $_REQUEST['message'],$cur_date]);

        if ($row){
            echo 1;
            exit;
        }

        break;

    case "getMessages":
        //echo 'working';
        $query=$pdo->prepare("SELECT * FROM messages ORDER BY date ASC");
        $row=$query->execute();
        $rs=$query->fetchAll(PDO::FETCH_OBJ);
        //echo var_dump($rs);
    $chat='';
    foreach ($rs as $messages){
        //$chat.=$message->message.'<br>';
        $chat .= 
        
        '<div class="message right">
        <div class="bubble">
        '.$messages->message.'
           <br> <div class="corner"></div>
            <span>'.$messages->date.'</span>
        </div>
    </div> ';
    }
    echo $chat;
        break;
}
?>