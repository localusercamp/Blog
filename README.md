<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

<p align="center"> CRUD-БЛОГ </p>

## Что использовал

Фронт реализовал с помощью:
- **HTML разметки**
- **Vue.js**
- **Стандартных CSS-стилей**
- **Капля чистого JS'а**

По поводу реализации фронтана - программировал на Vue первый раз, по гайдам и части документации. В итоге на 3/4 проекта узнал, что фронт на Vue реализуется через роутеры...
Конечно же переделывать ничего не стал, и как итог каждый компонент на каждом HTML шаблоне =)

Фронт не адаптивный, создавался на разрешении 1366х768.

Бэк реализовал с помощью Larevel 6.x

## Что реализовано


- **Асинхронное добавление, изменение и удаление комментариев**
- **Асинхронные лайки (по модели многие ко многим)**
- **Асинхронные совместимые фильтры (по дате, лайкам, категориям)**
- **Пагинация страницы с постами (без многошаговости)**
- **Профиль пользователя с обрывками статистики**
- **Изменение и удаление постов**
- **Ролевая политика из админа и блоггера**
- **Регистрация, логин, логаут пользователя**
- **Middleware'ы для ограничения доступа**
- **Разметка реализована через layout'ы и includ'ы**

## Примечания

Авторизацию, регистрацию и ограничение роутов с помощью middleware'ов написал сам по доке,
хотел понять как это реализовано в Laravel, я знаю что есть make:auth =).
Испольовал базу PostgreSQL. В качестве сервера использовал apache2. 
Приложение использует ресурсы интернета (в том числе Vue.js) - чтобы все работало
нужно подключение к интернету.