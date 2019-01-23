<?php
session_start();



if(isset($_POST['newmessage']) && !empty($_POST['newmessage']))
{
	$newmessage = $_POST['newmessage'];

	include_once 'db.php';

	//code to save the message in database ....

	$newmessage = "Mohandas Karamchand Gandhi (/ˈɡɑːndi, ˈɡændi/;[3][needs Gujarati IPA] Hindustani: [ˈmoːɦəndaːs ˈkərəmtʃənd ˈɡaːndʱi] (About this soundlisten); 2 October 1869 – 30 January 1948) was an Indian activist who was the leader of the Indian independence movement against British rule. Employing nonviolent civil disobedience, Gandhi led India to independence and inspired movements for civil rights and freedom across the world. The honorific Mahātmā (Sanskrit: high-souled, venerable)[4] – applied to him first in 1914 in South Africa[5] – is now used worldwide. In India, he is also called Bapu (Gujarati: endearment for father,[6] papa)[6][7] and Gandhi ji, and known as the Father of the Nation.[8][9]

Born and raised in a Hindu merchant caste family in coastal Gujarat, India, and trained in law at the Inner Temple, London, Gandhi first employed nonviolent civil disobedience as an expatriate lawyer in South Africa, in the resident Indian community's struggle for civil rights. After his return to India in 1915, he set about organising peasants, farmers, and urban labourers to protest against excessive land-tax and discrimination. Assuming leadership of the Indian National Congress in 1921, Gandhi led nationwide campaigns for various social causes and for achieving Swaraj or self-rule.";

	$query = "INSERT INTO messagetable(message)VALUES('$newmessage');";
	mysqli_query($conn,$query);

	echo $newmessage .strlen($newmessage);
}


?>