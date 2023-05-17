# Технологическая демонстрация

## **скачать проект**

                git clone git@github.com:alexbabashov/WordToPdf.git
## **Stack**

### Frontend

* HTML
* JavaScript
* CSS
* Vue.JS

### Backend

* php
* laravel
* Docker

---

## **Задание**

Сделать приложение на Laravel +vue, где пользователь загружает документ word c текстом, в котором есть хотя бы одна переменная, которую пользователь может ввести в input.
На выходе получить pdf c текстом word-а и замененной переменной. Структура pdf, формат отступы должны максимально соответствовать загруженному файлу Word.

## **ПРИМЕЧАНИЕ**

Вся обвязка полностью раабочая. Однако с реализацией бизнес логики возникли трудности.

Пример конвертации Doc в Pdf и замена переменных
https://www.scratchcode.io/how-to-convert-word-to-pdf-in-laravel/
аналогичное решение можно найти тут
https://phpforever.com/laravelexample/how-to-convert-word-to-pdf-in-laravel/

Для решения задачи конвертации используется PHPOffice/PHPWord
Однако найдена проблема с загрузкой Doc файлов
https://github.com/PHPOffice/PHPWord/issues/2389

Решение проблемы пока не найдено. Исопльзование платных сервисов для конвертации Doc в Pdf выходит за рамки тестового задания.

## **Для работы необходимо установить Docker**

https://docs.docker.com/engine/install/

## **Запуск приложения**

Создание и запуск контейнеров
        
        docker-compose -f ./.docker/docker-compose.yml up --build

Установка зависимостей

        docker exec word_to_pdf-app npm install

        docker exec word_to_pdf-app composer install

Создание симлинков

_не корректно работает при запуске из Windows_

        docker exec word_to_pdf-app php artisan storage:link

Сборка проекта

        docker exec word_to_pdf-app npm run wpk-dev

Запус проекта

        http://localhost:8098/

## **Дополнительные возможности**

Получение IP адреса контейнеровнера для доступа из хостовой ОС

        docker inspect -f '{{range.NetworkSettings.Networks}}{{.IPAddress}}{{end}}' <id-container>


