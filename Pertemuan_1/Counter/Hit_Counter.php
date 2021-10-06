<?php 
$file_counter = "counter.txt";
$fl = fopen($file_counter, "r+");
$hit = fread($fl,filesize($file_counter));

echo("<table width=250 align=center border=1 cellspacing=0 cellpadding=0 bordercolor=#0000FF> <tr>");
echo("<td width=250 valign=middle align=center>");
echo("<font face=verdana size=2 color=#FF0000><b>");
echo("Anda pengunjung yang ke:");
echo($hit);
echo("</b></font>");
echo("</td>");
echo("</tr></table>");
fclose($fl);

$fl=fopen($file_counter,"w+");
$hit=$hit+1;
fwrite($fl,$hit,strlen($hit));
fclose($fl);
?>
