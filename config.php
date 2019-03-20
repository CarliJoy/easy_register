<?php
    date_default_timezone_set('Europe/London');  

 $dates = array();
 $dates[1] = "02. - 04.03.18";
 $dates[2] = "27. - 29.04.18";
 $dates[3] = "01. - 03.06.18";
 $dates[4] = "06. - 08.07.18";
 
 $now = new datetime();
 $date1 = new datetime("2018-06-03");
 $date2 = new datetime("2018-04-29");
 $date3 = new datetime("2018-03-18");
 if ($now > $date1) $datenr = 4;
 else if ($now > $date2) $datenr = 3;
 else if ($now > $date3) $datenr = 2;
 else $datenr = 1;
 
 
 $title = "Klimacamp/Sommerschul-Orgakreisplenum " . $dates[$datenr];
 $title_eng = "Climate Camp/Summer School " . $dates[$datenr];
 $folder_pass = "PLEASE_ENTER";
?>
