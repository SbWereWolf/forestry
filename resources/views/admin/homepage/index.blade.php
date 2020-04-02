@extends('admin.layout.default')

<link rel="stylesheet" type="text/css" href="/css/forestry.css">

@section('body')

    <div class="archive">
        <div>
            <a href="#"
               role="button" class="btn btn-primary">Структура</a>
        </div>
        <div class="article ">
            <a href="#"
               role="button" class="btn btn-primary">Карты</a>
        </div>
        <div>
            <a href="#"
               role="button" class="btn btn-primary">Лесоустройство</a>
            </div>
        <div>
            <a href="#"
               role="button" class="btn btn-primary">Услуги</a>
            </div>
        <div>
            <a href="#"
               role="button" class="btn btn-primary">Продукция</a>
            </div>
        <div>
            <a href="#"
               role="button" class="btn btn-primary">Контакты</a>
            </div>
        <div>
            <a href="{{route('info/structure')}}"
               role="button" class="btn btn-success">Лесные участки</a>
            </div>
        <div>
            <a href="/forestry-map/Карта%201_Целевое%20назначение.pdf"
               target="_blank"
               role="button" class="btn btn-success">Целевое назначение</a>
            </div>
        <div>
            <a href="{{route('admin/forest-resources/index')}}"
               role="button" class="btn btn-success">Таксационные характеристики</a>
            </div>
        <div>
            <a href="{{route('info/services')}}"
               role="button" class="btn btn-success">Услуги</a>
            </div>
        <div>
            <a href="{{route('info/products')}}"
               role="button" class="btn btn-success">ПРОДУКЦИЯ</a>
            </div>
        <div>
            <a href="{{route('info/contacts')}}"
               role="button" class="btn btn-success">КОНТАКТЫ</a>
            </div>
        <div>
            <a href="/forestry-documents/Регламент ЛХР_Лодейнопольский_2018.pdf"
               target="_blank"
               role="button" class="btn btn-success">Регламент</a>
            </div>
        <div>
            <a href="/forestry-map/Карта 2_преобладающие породы.jpg"
               target="_blank"
               role="button" class="btn btn-success">преобладающие породы</a>
            </div>
        <div>
            <a href="{{route('admin/forestry-indicators/index')}}"
               role="button" class="btn btn-success">Основные показатели лесного фонда</a>
            </div>
        <div></div>
        <div></div>
        <div></div>
        <div>
            <a href="/forestry-documents/Руководство.jpg"
               target="_blank"
               role="button" class="btn btn-success">Руководство</a>
            </div>
        <div>
            <a href="/forestry-map/Карта 3 Схема_распределения_лесов_по_целевому_назначению.jpg"
               target="_blank"
               role="button" class="btn btn-success">Схема распределения лесов по целевому назначению</a>
            </div>
        <div>
            <a href="{{route('admin/cutting-areas/index')}}"
               role="button" class="btn btn-success">Рассчёт лесосеки</a>
            </div>
        <div></div>
        <div></div>
        <div></div>

    </div>

@endsection
