<?php 
echo 'Server Memory Usage: ';
$free = shell_exec('free -m');
$free = (string)trim($free);
$free_arr = explode("\n", $free);
$mem = explode(" ", $free_arr[1]);
$mem = array_filter($mem);
$mem = array_merge($mem);
echo 	$memory_usage = $mem[2]/$mem[1]*100;
echo '%<br>';
unset($free);
unset($mem);
unset($memory_usage);

echo 'Server CPU Usage: ';
$load = sys_getloadavg();
echo $load[0];
echo '%<br>';

echo 'Initial: ' . number_format(memory_get_usage(), 0, '.', ',') . " bytes<br>";
echo 'Peak: ' . number_format(memory_get_peak_usage(), 0, '.', ',') . " bytes<br>";
?>