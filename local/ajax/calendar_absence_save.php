<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

use \Bitrix\Main\Loader;

Loader::includeModule('calendar');
 
$fromTs = CCalendar::Timestamp(filter_input(INPUT_POST, 'date_start'));
$toTs  =  CCalendar::Timestamp(filter_input(INPUT_POST, 'date_end'));

$arFields['DATE_FROM'] = CCalendar::Date($fromTs);
$arFields['DATE_TO'] = CCalendar::Date($toTs);

$arFields["CAL_TYPE"] = "user";
$arFields["OWNER_ID"] = $USER->GetID();

if(filter_input(INPUT_POST, 'cal_type') == 'COMPANY') {

  $arFields["CAL_TYPE"] = 'company_calendar' ;
  $arFields["OWNER_ID"] = 0;
}

$arFields["NAME"] = filter_input(INPUT_POST, 'event_name');
$arFields["DESCRIPTION"] = filter_input(INPUT_POST, 'reason_absence');

$arFields["RRULE"] = FALSE;
$arFields["IS_MEETING"] = FALSE;
$arFields["COLOR"] = filter_input(INPUT_POST, 'absence_type');
$arFields['TEXT_COLOR'] = filter_input(INPUT_POST, 'absence_text_color');
$arFields['ACCESSIBILITY'] = 'absent';
$arFields['DT_SKIP_TIME'] = 'Y';

$eventId = CCalendar::SaveEvent(array('arFields' => $arFields, 'autoDetectSection' => true));

if($eventId > 0 ) {

   echo $eventId;

} else {

  if($e = $APPLICATION->GetException()) {
  
     echo $e->GetString();

  } else {
     echo 'неизвестная ошибка в календаре';
  }
}


