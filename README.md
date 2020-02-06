# bitrix24-crm-list
Выборка елементов списка из Bitrix24 CRM с доп. полями ФИО пользователя и название Сделки или Контакта. На странице выводится 10 елементов списка.  

index.php - основной файл, содержит пустую таблицу и кнопки перехода к следующей или предыдущей странице. Перелистывание страниц выполняется без перезагрузки страницы index.php с помощью AJAX-запроса.  

index.js - содержит JS-скрипт, выполняет AJAX-запрос для загрузки записей в формате JSON, заполняет HTML-таблицу строками списка.  

index_api.php - принимает параметры:  
iNumPage - номер текущей страницы  
nPageSize - количество записей на странице  
Обращается к API bitrix, получает записи текущей страницы списка.
Также получает полное количество записей списка.
Возвращает данные Java скрипту в формате JSON.  

Интерфейс с помощью Bootstrap:  
![bitrix24-crm-list](https://github.com/apcrf/bitrix24-crm-list/blob/master/%D0%A1%D0%BF%D0%B8%D1%81%D0%BE%D0%BA%20%D0%9F%D0%BE%D0%BB%D1%8C%D0%B7%D0%BE%D0%B2%D0%B0%D1%82%D0%B5%D0%BB%D1%8C%20%2B%20%D0%A1%D0%B4%D0%B5%D0%BB%D0%BA%D0%B0%2C%20%D0%9A%D0%BE%D0%BD%D1%82%D0%B0%D0%BA%D1%82.png)
