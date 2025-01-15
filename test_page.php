<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Тестовый грид!");

$APPLICATION->IncludeComponent(
    "local:test.grid",
    "",
    []
);

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");
?>
