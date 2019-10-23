<?php

function send_notification()
{
echo 'Hello';
define( 'API_ACCESS_KEY', 'AAAAWUVaMXo:APA91bHp3K1Kd9xZTt1Eet_JOl2lENqiWYtQ5XxnMMbXHegswfMTGjoXvzqAAPPxmHmlGMIThiFpWriTWXnAwi4p6RbjKy13oR68xTkZSCj4wK0so_lsRBZy6YHuF_qe_S4mGwNbCkaS');

#prep the bundle

     $msg = array
          (
		'body' 	=> $_GET['phone'],
        'title'	=> 'New electronic item on sale',
        'phone' => $_GET['phone'],
        'icon' => $_GET['lat'],
        'tag' => $_GET['lng'],
             	
          );
          $fields = array
          (
              'to'  => '/topics/alerts',
              'notification'          => $msg
          );
	
	
	$headers = array
			(
				'Authorization: key=' . API_ACCESS_KEY,
				'Content-Type: application/json'
			);
#Send Reponse To FireBase Server	
		$ch = curl_init();
		curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
		curl_setopt( $ch,CURLOPT_POST, true );
		curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
		$result = curl_exec($ch );
		echo $result;
		curl_close( $ch );
}

send_notification();

echo "<script>document.location = 'http://paviljondedinje.com/hackathon/exchange.php'</script>";
?>