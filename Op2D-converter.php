<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Op to Discord Convertor</title>
    </head>
    <body>

<?php


echo "The time is " . date("h:i:sa")."<br />";

require_once('Op2D-config.php');

#Request data
$request_body = file_get_contents('php://input');



if ( $DEBUG == true ) {

	echo '<h2>Debug ON</h2>';

	//Debug
	if (!$request_body) {

		echo "<p>Using fake data</p>";
		
		//load fake data
		$fakeData = fakeData();
		
			//Print on syslog for remote requests

		
		$data = json_decode($fakeData, true);
		
		$dataText = print_r($data, true);

	} else {
	
		echo "<p>Using request data</p>";
	
	//Receive true data
		$request_body = file_get_contents('php://input');
		$data = json_decode($request_body, true);
	}


	//Print on screen
	echo "<pre>";
		var_export($data, true);
	echo "</pre>";

	//Print on syslog for remote requests
	$dataText = print_r($data, true);
	
	openlog("OpenProject to Discord", LOG_PID | LOG_PERROR, LOG_LOCAL0);
		syslog(LOG_WARNING, date("Y-m-d H:i:s").' - SOURCE - '.$dataText );
	closelog();


} else {

	//Production, no data no party
	if (!$request_body) {
	   http_response_code(400);
	   die();

	} else {
	
		//Decode
		$data = json_decode($request_body, true);
	}

}



#Post

// EXTRACT CONTENT


//Stato (es. new)

$state = "";
$color = "";
if ($data['work_package']['_links']['status']['title'] != null) {
    $state = $data['work_package']['_links']['status']['title'];
}

$color = "	11119017"; //Gray

if ($state == "New") {
    $color = "16766720"; //Golden decimal by https://www.spycolor.com/ffd700
} elseif ($state == "Closed"){
    $color = "	32768"; //Green
}



//Contenuto
$content = "";


//Progetto
if ($data['work_package']['_links']['project'] != null) {
    $content .= " \n \n \n Notizie di **".$data['work_package']['_links']['project']['title']."**";
}

//Consegna
if ( isset($data['work_package']['dueDate']) ) {

	if ( $data['work_package']['dueDate'] != null ) {
		$content .= " \n :clock1: Consegna il ".$data['work_package']['dueDate'];
	}

}

//Modificato
if ( isset($data['work_package']['updatedAt']) ) {

	if ( $data['work_package']['updatedAt'] != null ) {
		$content .= " | :arrows_counterclockwise: Modificato il ".$data['work_package']['updatedAt'];
	}

}


//Assegnato a
if ($data['work_package']['_links']['assignee']['href'] != null) {
    $content .= " \n :raised_hand: Assegnato a ".$data['work_package']['_links']['assignee']['title'];
}

//Responsabile
if ($data['work_package']['_links']['responsible']['href'] != null) {
    $content .= " | :eye: Responsabile ".$data['work_package']['_links']['responsible']['title'];
}




//Map Openproject usernames with Discord ones
$namesConvert = namesConvert();

$content = str_ireplace(
  array_keys($namesConvert), 
  array_values($namesConvert), 
  $content
);



$embedTitle = "";
$embedContent = "";

//Tipo (es. feature)
if ($data['work_package']['_links']['type']['href'] != null) {
    $embedTitle .= $data['work_package']['_links']['type']['title'];
}

//Oggetto
if ($data['work_package']['subject'] != null) {
    $embedTitle .= ": ".$data['work_package']['subject'];
}

//Descrizione
if ($data['work_package']['description']['raw'] != null) {

	$cont = $data['work_package']['description']['raw'];

	//Avoid long text
	if ( strlen( $data['work_package']['description']['raw'] ) >= 150 ) {
		$cont =substr( $data['work_package']['description']['raw'],0,150 ).' di più...';
	}
	
	//If is a closed task do not show description
	if ($state != "Closed"){
		$embedContent .= " \n :notepad_spiral: ".$cont;
	}

}






// PICK API URL

$project = $data['work_package']['_links']['project']['title'];

//Strip single quotation from project name
$project = str_replace("'", "", $project );

$url = urls($project);

echo '<p>Indirizzo: '.$url.'</p>';
echo '<p>Contenuto: '.$content.'</p>';
echo '<p>Embed: '.$embedContent.'</p>';



// Create a new cURL resource
$ch = curl_init($url);

// Setup request to send json via POST
//Courtesy of:
//https://www.gaisciochmagazine.com/articles/posting_to_discord_using_php_and_webhooks.html
//https://birdie0.github.io/discord-webhooks-guide/other/discord_markdown.html
//https://birdie0.github.io/discord-webhooks-guide/structure/embed/author.html

$data = array(
  'username'	=> 'ArcaBot',
  'type'    	=> 1,
  'content'		=> $content,
  'embeds'      => array(
  	array(
  	'title'     	=> $state.' | '.$embedTitle,
  	'description'  	=> $embedContent,
  	'color'    		=> $color,
  	'url'			=> 'https://arcalab.eu/'.'work_packages/'.$data['work_package']['id']
	))
);







$payload = json_encode($data);

echo "<h2>Payload to Discord</h2>";
echo "<pre>";
	print_r( $payload );
echo "</pre>";




// Attach encoded JSON string to the POST fields
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

// Set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

// Return response instead of outputting
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the POST request
$result = curl_exec($ch);
print_r($result);

// Close cURL resource
curl_close($ch);




echo "<p>Inviato su Discord<p>";


?>

    </body>
</html>
