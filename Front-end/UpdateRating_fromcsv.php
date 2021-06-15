<?php

include 'config/database.php';
// get database connection
$database = new Database();
$db = $database->getConnection();

$file = fopen("Review_new.csv", "r") or die ('Unable to open file');

function RemoveSpecialChar($value){
$result  = str_replace(['"', "'"],'',$value);
return $result;
}


$flag = true;
while (($lines = fgetcsv($file, 0, ",")) !== FALSE) {
		
		$line = RemoveSpecialChar($lines);
		if($flag) {$flag = false; continue;}
			else{
				$query = "UPDATE Review SET rating = $line[5] WHERE review_id = $line[3]";

				$stmt = $db->prepare($query);
				$res = $stmt->execute();

				if ($res !=0) {
					echo "Record updated successfully!<br>";
						} else {
 							echo "Error: " . $query . "<br>";
					}
		}
	}
fclose($file);

?>
