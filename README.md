# Proyecto de ejemplo de Laravel

Este es un proyecto de ejemplo de Laravel que incluye:

- Autenticación de usuarios con Laravel Breeze/Paquete adiccional de composer requerido del test.
- ABM de productos ( Listado, Alta, Baja y Modificación ), cada producto debe contener como mínimo una imagen y stock en al menos 2 depósitos.
- API REST para la consulta de un Producto por código.
- Reporte existencias por depósito informando por cada Depósito los productos en stock
- Reporte stock mínimo informando los Productos por debajo del stock mínimo definido



## Requisitos

- PHP 7.4 o superior.
- Composer.
- MySQL 5.7 o superior.

## Instalación

1. Clonar este repositorio en tu computadora.
2. Ejecutar `composer install` en la raíz del proyecto.
3. Ejecutar la estructura de base datos brindada "test.sql".
4. Renombrar el archivo `.env.example` a `.env`.
5. Modificar el archivo `.env` con la información de la base de datos.
6. Ejecutar `php artisan serve` para iniciar el servidor de desarrollo.

## Uso

- Para acceder a la página de inicio, ir a `http://localhost:8000`.
- Para acceder a la página de autenticación, ir a `http://127.0.0.1:8000/login`.
- Para acceder a la página de registro, ir a `http://127.0.0.1:8000/register`.
- Para acceder al CRUD de Productos, ir a `http://localhost:8000/productos`.
- Para acceder a la Api Rest de Productos, ir a `http://localhost:8000/api/producto/{codigo}`.
    Ejemplo: `http://localhost:8000/api/producto/perfume`
- Para acceder al reporte de existencias por depósito, ir a `http://localhost:8000/depositos`.
- Para acceder al Reporte de Stock Mínimo, ir a `http://localhost:8000/stock-minimo`.

## Aclaraciones

- Como se pedia desarrollar una Api Rest para Producto por código y no existía dicho campo en la tabla producto se agregó el campo codigo para acceder a esta información.


## Autor

[Ramón Fajardo Fonseca]
