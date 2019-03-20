<?php
include 'config.php';

if(!file_exists($folder_pass)) {
    mkdir($folder_pass);
}
chmod($folder_pass, 0777);
$filename = $folder_pass.'/guests_'.$datenr.'.csv';


if(!isset($_POST['email']) || empty($_POST['email']) || !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
  $content=file_get_contents("anmelden.php");
  $content=str_replace('<!--eMailFehler','',$content);
  $content=str_replace('eMailFehler-->','',$content);
  die($content);
}

$field_opts=array();

$translation=(isset($_POST['field_trans'])&&$_POST['field_trans']=="yes")?'1':'0';

foreach(array(4,5,7,9,10) as $field) {
    $field_opts[$field]="";
    if(isset($_POST['field_'.$field])) {
        foreach($_POST['field_'.$field] as $f) {
            if(!empty($field_opts[$field])) $field_opts[$field].="&";
            $field_opts[$field].=$f;
        }
    }
}

$fileLine = date("Y-m-d H:i:s").";".
            $_POST['lang'].";".
            $_POST['field_1'].";".
            $_POST['email'].";".            
            $_POST['field_3'].";".
            $field_opts[4].";".
            $field_opts[5].";". 
            $field_opts[10].";".         
            $_POST['field_6'].";". 
            $field_opts[7].";".          
            $_POST['field_trans'].";".
			$field_opts[9].";".
			$_POST['field_8'].";".
			"\n";

$fileHeaderLine = "Datum;En/De;Name;E-Mail;Kinderbetreuung?;Unterkunft für diese Nächte;U-Wünsche;Lecker Essen;Fahrtkosten?;komfortable Sprachen;Übersetzen?;Allergien;Kommentar \n";


if(!is_file($filename) || filesize($filename)<10) {
    // Add a header to the fileLine if new file...
    $fileLine=$fileHeaderLine.$fileLine;
}

//if (is_writable($filename)) {

			    if (!$handle = fopen($filename, 'a'))
			    {
			         echo "Cannot open file ($filename)";
			         exit;
			    }
			    if (fwrite($handle, $fileLine) === FALSE) {
			        echo "Cannot write to file ($filename)";
			        exit;
			    }

			    fclose($handle);

	/*		} else {
			    echo "The file  ".$filename." is still not writable";
			    exit;
			}*/

include("anmelden_confirm.php");

?>
