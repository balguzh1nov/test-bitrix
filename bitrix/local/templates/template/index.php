<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Тестовое задание");

use PhpOffice\PhpSpreadsheet\IOFactory;
require_once($_SERVER["DOCUMENT_ROOT"]."/vendor/autoload.php");

// Чтение данных из Excel файла
$spreadsheet = IOFactory::load($_SERVER["DOCUMENT_ROOT"]."/bitrix/php_interface/test_for_grid.xlsx");
$sheet = $spreadsheet->getActiveSheet();
$rows = $sheet->toArray();

$header = array_shift($rows); // Получаем и удаляем заголовки из массива
$data = [];

// Формируем данные с числовыми ключами
foreach ($rows as $index => $row) {
    if (count($header) == count($row)) {
        $rowData = array_combine($header, $row);
        $rowData['ID'] = $index + 1; // Добавляем ID для каждой строки
        $data[] = $rowData;
    }
}

// Получаем параметры фильтра
$gridFilter = new Bitrix\Main\UI\Filter\Options('CALL_LOG_FILTER');
$filterData = $gridFilter->getFilter();

// Применяем фильтрацию
$filteredData = $data;
if (!empty($filterData)) {
    $filteredData = array_filter($data, function($row) use ($filterData) {
        $matches = true;
        
        // Фильтр по статусу
        if (!empty($filterData['STATUS']) && $filterData['STATUS'] !== 'undefined') {
            $matches = $matches && (trim($row['Статус']) === trim($filterData['STATUS']));
        }
        
        // Фильтр по типу звонка
        if (!empty($filterData['CALL_TYPE']) && $filterData['CALL_TYPE'] !== 'undefined') {
            $matches = $matches && (trim($row['Тип звонка']) === trim($filterData['CALL_TYPE']));
        }
        
        // Фильтр по длительности звонка
        if (isset($filterData['CALL_DURATION_from']) && $filterData['CALL_DURATION_from'] !== '') {
            $matches = $matches && ($row['Длительность звонка'] >= intval($filterData['CALL_DURATION_from']));
        }
        if (isset($filterData['CALL_DURATION_to']) && $filterData['CALL_DURATION_to'] !== '') {
            $matches = $matches && ($row['Длительность звонка'] <= intval($filterData['CALL_DURATION_to']));
        }
        
        return $matches;
    });
}

// Получаем уникальные значения для фильтров
$status_values = array_unique(array_column($data, 'Статус'));
$call_type_values = array_unique(array_column($data, 'Тип звонка'));

// Убираем пустые значения и сортируем
$status_values = array_filter($status_values);
$call_type_values = array_filter($call_type_values);
sort($status_values);
sort($call_type_values);

// Подготавливаем значения для выпадающих списков
$status_items = array_combine($status_values, $status_values);
$call_type_items = array_combine($call_type_values, $call_type_values);

// Подключаем фильтр
$APPLICATION->IncludeComponent(
    "bitrix:main.ui.filter",
    "",
    [
        "FILTER_ID" => "CALL_LOG_FILTER",
        "GRID_ID" => "CALL_LOG_GRID",
        "FILTER" => [
            [
                "id" => "STATUS",
                "name" => "Статус",
                "type" => "list",
                "items" => $status_items,
                "default" => true,
                "params" => ["multiple" => "N"]
            ],
            [
                "id" => "CALL_TYPE",
                "name" => "Тип звонка",
                "type" => "list",
                "items" => $call_type_items,
                "default" => true,
                "params" => ["multiple" => "N"]
            ],
            [
                "id" => "CALL_DURATION",
                "name" => "Длительность звонка",
                "type" => "number",
                "default" => true
            ],
        ],
        "ENABLE_LABEL" => true,
        "ENABLE_LIVE_SEARCH" => true,
        "RESET_TO_DEFAULT_MODE" => true
    ]
);

// Формируем колонки для грида на основе заголовков из файла
$columns = [
    [
        "id" => "ID",
        "name" => "ID",
        "sort" => "ID",
        "default" => true
    ]
];

foreach ($header as $headerName) {
    $columns[] = [
        "id" => $headerName,
        "name" => $headerName,
        "sort" => $headerName,
        "default" => true
    ];
}

// Подключаем грид
$APPLICATION->IncludeComponent(
    "bitrix:main.ui.grid",
    "",
    [
        "GRID_ID" => "CALL_LOG_GRID",
        "COLUMNS" => $columns,
        "ROWS" => array_map(function($row) {
            return [
                "data" => $row,
            ];
        }, $filteredData),
        "SHOW_ROW_CHECKBOXES" => false,
        "SHOW_GRID_SETTINGS_MENU" => true,
        "SHOW_PAGINATION" => true,
        "SHOW_SELECTED_COUNTER" => false,
        "SHOW_TOTAL_COUNTER" => true,
        "ALLOW_COLUMNS_SORT" => true,
        "ALLOW_COLUMNS_RESIZE" => true,
        "ALLOW_HORIZONTAL_SCROLL" => true,
        "ALLOW_SORT" => true,
        "ALLOW_PIN_HEADER" => true,
    ]
);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>