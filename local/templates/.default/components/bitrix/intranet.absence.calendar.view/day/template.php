<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
?>
<script type="text/javascript">
if (window.JCCalendarViewDay)
	jsBXAC.SetViewHandler(new JCCalendarViewDay());
else
	BX.loadScript(
		'/local/templates/.default/components/bitrix/intranet.absence.calendar.view/day/view.js',
		function() {jsBXAC.SetViewHandler(new JCCalendarViewDay())}
	);
</script>