<?php
require dirname(__FILE__) . '/../inc/require.php';
header('Content-type: text/calendar');
header('Content-Disposition: attachment; filename="'.$classe->getNom().'.ics"');

//$ical = tmpfile();
$c = null;
$cal = $classe->getAllDevoirs();
$now = date("Ymd\THis");

foreach($cal as $v){
    $txt = new Text($v['contenu']);

    $c .= "BEGIN:VEVENT\n";
    $c .= "CATEGORIES:WEEKLYTASK\n";
    $c .= "DTSTAMP:".$now."\n";
    $c .= "LAST-MODIFIED:".date("Ymd\THis", strtotime($v["date_post"]))."\n";
    $c .= "UID: WeeklyTask ".$v["nom"]." ".$v["prenom"]." - Tasks\n";
    $c .= "DTSTART:".date("Ymd\THis", strtotime($v["date"])+(8*60*60))."\n";
    $c .= "DTEND:".date("Ymd\THis", strtotime($v["date"])+(9*60*60))."\n";
    $c .= "SUMMARY;LANGUAGE=fr:Task - ".$txt->cut()."\n";
    //$c .= "LOCATION;LANGUAGE=fr:AIX-1"
    $c .= "DESCRIPTION;LANGUAGE=fr:".$txt->cut()."\\n-Posté par ".$v["nom"]." ".$v["prenom"]."\n";
    $c .= "END:VEVENT\n";
}

$begin = strtotime($cal[0]["date"]);
$end = strtotime($cal[count($cal)-1]["date"]);

$rend = "BEGIN:VCALENDAR\n";
$rend.= "VERSION:2.0\n";
$rend.= "PRODID;LANGUAGE=fr:WeeklyTask 2014\n";
$rend.= "METHOD:PUBLISH\n";
$rend.= "X-CALSTART:".date("Ymd\THis", strtotime($cal[0]["date"]))."\n";
$rend.= "X-CALEND:".(date("Ymd\THis", $end)+1)."\n";
$rend.= "X-WR-CALNAME;LANGUAGE=fr:WeeklyTask - ".$hud->getNom()." ".$hud->getPrenom()." - ".$classe->getNom()." - ";
$rend.= "du ".date("d M Y", $begin)." au ".date("d M Y", $end)."\n";
$rend.= "X-WR-CALDESC;LANGUAGE=fr:Planning des tâches de ".$hud->getNom()." ".$hud->getPrenom()." généré par le site WeeklyTask ";
$rend.= "le ".date("d M Y")." pour la classe ".$classe->getNom()." valable sur la période du ".date("d M Y", $begin)." au ".date("d M Y", $end);
$rend.= " - Semaines : semaine ".date("W", $begin)." - ".date("W", $end)."\n";
$rend.= $c;
$rend.= "END:VCALENDAR";

echo $rend;
//fwrite($ical, $rend);
//fclose($ical);