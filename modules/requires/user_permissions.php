<?php
$company_editor = 0;
$company_auditor=0;

$month_day=gmdate("d");

if (($user == 'tim' || $user == 'lavirson')   && ($month_day>=1 && $month_day<=25)) {
$company_editor=1;
}
if (($user == 'konrad' || $user == 'aurelio') && ($month_day>=1 && $month_day<=25)) {
$company_auditor=1;
}
?>
