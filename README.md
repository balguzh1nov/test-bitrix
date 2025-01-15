## Структура файлов

- **`bitrix/php_interface/test_for_grid.xlsx`**: Исходный файл с данными для грида и фильтра.
- **`bitrix/local/templates/template/index.php/index.php`**: Основной файл, который включает компоненты Bitrix для отображения грида и фильтра.

Запустил у себя на локальном компе через команду:
php -S localhost:8000 -t /Applications/MAMP/htdocs/  

Использовал вместо CSV файла .xlsx формат файла так как у меня CSV формат некорректно отображался
Для чтения из файла Excel использовал библиотеку phpoffice/phpspreadsheet
