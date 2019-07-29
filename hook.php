<?php
// Load config
require 'config.php';

$POST = file_get_contents('php://input');
$POST = json_decode($POST);
if (isset($POST->message->chat->type) && $POST->message->chat->type == 'group') {
    if (preg_match('/asd/', $POST->message->text)) {
        $sql = "SELECT * FROM groups WHERE id = " . $POST->message->chat->id;
        
        $asdco = $conn->query($sql);
        if ($asdco->num_rows == 0) {
            $sql = "INSERT INTO groups (id, username)
            VALUES (" . $POST->message->chat->id . ", " . $POST->message->chat->username . ");";
                $insert = $conn->query($sql);
        }
    
        $sql = "INSERT INTO asd (groupid, date, sender)
        VALUES (" . $POST->message->chat->id . ", CURDATE()," . $POST->message->from->id. ");";
        $result = $conn->query($sql);
        
            $sql = "SELECT * FROM asd WHERE groupid = " . $POST->message->chat->id;
            $aa = $conn->query($sql);
               
        switch($aa->num_rows) {
    
    
            case 1: 
                $addtext = 'Il primo asd. Benvenuto nella grande famiglia di asdbot';
                 $response = file_get_contents('http://api.telegram.org/bot' . $bot_api_key . '/sendPhoto?chat_id=' . $POST->message->chat->id . '&photo=http://www.lanciano.it/faccine/asdone.gif&caption=Così asdoso, asd.');
                break;
            case 10:
                $addtext = 'Il decimo asd! Complimenti, asd.';
                $response = file_get_contents('http://api.telegram.org/bot' . $bot_api_key . '/sendPhoto?chat_id=' . $POST->message->chat->id . '&photo=http://www.lanciano.it/faccine/asdone.gif&caption=Così asdoso, asd.');
                break;
            case 100:
                $addtext = 'IL CENTESIMO ASD, ASD! COMPLIMENTS CONGRATULATIONS AUF WIDERSHEN';
                $response = file_get_contents('http://api.telegram.org/bot' . $bot_api_key . '/sendPhoto?chat_id=' . $POST->message->chat->id . '&photo=http://www.lanciano.it/faccine/asdone.gif&caption=Così asdoso, asd.');
                break;
            case 1000:
                $addtext = '1000 asd, wow! Questo gruppo è così asdoso, asd';
                   $response = file_get_contents('http://api.telegram.org/bot' . $bot_api_key . '/sendPhoto?chat_id=' . $POST->message->chat->id . '&photo=http://www.lanciano.it/faccine/asdone.gif&caption=Così asdoso, asd.');
                break;
            case 10000:
                
                $addtext = '10000 è un record mondiale, asd';
                               $response = file_get_contents('http://api.telegram.org/bot' . $bot_api_key . '/sendPhoto?chat_id=' . $POST->message->chat->id . '&photo=http://www.lanciano.it/faccine/asdone.gif&caption=Così asdoso, asd.');
                break;
        }
        $response = file_get_contents('http://api.telegram.org/bot' . $bot_api_key . '/sendMessage?chat_id=' . $POST->message->chat->id . '&text=Il contasd conta ben '. $asdco->num_rows . ', asd.');
        $response = json_decode($response);
    } elseif ($POST->message->text == '/start' ) {
                $response = file_get_contents('http://api.telegram.org/bot' . $bot_api_key . '/sendMessage?chat_id=' . $POST->message->chat->id . '&text=Bella zio! Sono il bot asdoso creato da Ferdinando Traversa (ferdinando.me) da idea di Valerio Bozzolan (reyboz.it), asd! Digita /grafico per ricevere il link ad un grafico, anche in privato per averne uno personale, asd.');
    } elseif ($POST->message->text == '/grafico' ) {
                        $response = file_get_contents('http://api.telegram.org/bot' . $bot_api_key . '/sendMessage?chat_id=' . $POST->message->chat->id . '&text=Visualizza il bel grafico che vien dal mar su http://asd.ferdinando.me/grafico.php?type=group&id=' . $POST->message->chat->id);

    }
}

if (isset($POST->message) && $POST->message->chat->type == 'private' && $POST->message->text != '/grafico') {
                    $response = file_get_contents('http://api.telegram.org/bot' . $bot_api_key . '/sendMessage?chat_id=' . $POST->message->chat->id . '&text=Bella zio! Sono il bot asdoso creato da Ferdinando Traversa (ferdinando.me) da idea di Valerio Bozzolan (reyboz.it), asd! Aggiungimi ai tuoi gruppi e conterò gli asd. Scrivi /grafico e ti manderò un link per vedere il tuo grafico personal personal personal');

}
if (isset($POST->message) && $POST->message->chat->type == 'group' && $POST->message->text == '/grafico') {
                    $response = file_get_contents('http://api.telegram.org/bot' . $bot_api_key . '/sendMessage?chat_id=' . $POST['message']['chat']['id'] . '&text=Bella zio! Sono il bot asdoso creato da Ferdinando Traversa (ferdinando.me) da idea di Valerio Bozzolan (reyboz.it), asd! Aggiungimi ai tuoi gruppi e conterò gli asd.');

}

