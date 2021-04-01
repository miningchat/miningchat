<?php
$company_editor = 0;
$company_auditor=0;

$month_day=gmdate("d");

if (($user == 'jeunissel' || $user == 'Ricardo_' || $user == 'lavirsn' || $user == 'edit_1' || $user == 'Djólly')   && ($month_day>=1 && $month_day<=31)) {
$company_editor=1;
}
if (($user == 'lavirson' || $user == 'aurelio') && ($month_day>=1 && $month_day<=25)) {
$company_auditor=1;
}
?>