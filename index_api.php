<?
//**************************************************************************************************
// Список Пользователь + Сделка, Контакт
// http://192.168.1.109/my_list_user_deal_contact/
// Все задание делаем с помощью Апи битрикса (не рестапи)
// https://dev.1c-bitrix.ru/api_help/iblock/classes/ciblockelement/getlist.php
// Таблица используемых полей CRM
// http://askaron.ru/api_help/course1/lesson203/
//**************************************************************************************************

if ( empty($_REQUEST["iNumPage"]) || empty($_REQUEST["nPageSize"]) ) {
	http_response_code(404);
	exit;
}

require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("iblock");

// Загрузка списка
$arOrder = ["ID"=>"DESC"];
$arFilter = ["IBLOCK_ID"=>28];
$arGroupBy = false;
$arNavStartParams = ["iNumPage"=>$_REQUEST["iNumPage"], "nPageSize"=>$_REQUEST["nPageSize"]];
$arSelect = [
	"IBLOCK_ID", "ID", "NAME",
	"PROPERTY_PRIVYAZKA_K_SOTRUDNIKU", "PROPERTY_PRIVYAZKA_K_SOTRUDNIKU.NAME",
	"PROPERTY_PRIVYAZKA_K_ELEMENTAM_CRM", "PROPERTY_PRIVYAZKA_K_ELEMENTAM_CRM.NAME",
];

$res = CIBlockElement::GetList($arOrder, $arFilter, $arGroupBy, $arNavStartParams, $arSelect);

// Выбор полей списка
$rows = [];
while($obj = $res->GetNextElement()) {
	$fields = $obj->GetFields();
	$row = [];
	$row["ID"] = $fields["ID"];
	$row["NAME"] = $fields["NAME"];
	$row["USER_ID"] = $fields["PROPERTY_PRIVYAZKA_K_SOTRUDNIKU_VALUE"];
	$row["CRM_ID"] = $fields["PROPERTY_PRIVYAZKA_K_ELEMENTAM_CRM_VALUE"];
	$rows[] = $row;

	// $row2 = $obj->GetProperties();
	// var_dump($row2);
	//echo "<br>-------------------------<br>";
	//var_dump($fields["PROPERTY_PRIVYAZKA_K_SOTRUDNIKU_VALUE"]);
	//echo "<br>--<br>";
	//$res3 = CIBlockElement::GetByID($fields["PROPERTY_PRIVYAZKA_K_SOTRUDNIKU_VALUE"]);
	//$obj3 = $res3->GetNextElement();
	//$row3 = $obj3->GetProperties();
	//var_dump($row3);
	//echo "<br>---------------------------------------------------------------------<br>";
}

// Вывод в JSON
$data = [];
// Количество элементов в инфоблоке
$data["cnt"] = CIBlockElement::GetList(false, $arFilter, ["IBLOCK_ID"])->Fetch()["CNT"];
// Записи инфоблока
$data["rows"] = $rows;
exit(json_encode($data, JSON_UNESCAPED_UNICODE));
?>
