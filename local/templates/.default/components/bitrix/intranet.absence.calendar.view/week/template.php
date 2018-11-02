<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
?>
<script type="text/javascript">
if (window.JCCalendarViewWeek)
	jsBXAC.SetViewHandler(new JCCalendarViewWeek());
else
	BX.loadScript(
		'/local/templates/.default/components/bitrix/intranet.absence.calendar.view/week/view.js', 
		function() {jsBXAC.SetViewHandler(new JCCalendarViewWeek())}
	);
</script>