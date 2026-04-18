# Seguridad Web - Actividad 2: Autenticación y autorización

Aplicación web desarrollada con **Laravel 13** para practicar autenticación de usuarios, autorización basada en roles y gestión de tareas.

El proyecto implementa:

- registro, inicio y cierre de sesión;
- protección de rutas con `auth`;
- control de acceso por roles con **Spatie Laravel Permission**;
- CRUD de tareas;
- listado de usuarios visible solo para administradores.

---

## Objetivo

Esta práctica está orientada a reforzar conceptos de **seguridad web**, especialmente:

- autenticación de usuarios;
- autorización según privilegios;
- separación de permisos por rol;
- protección de recursos sensibles dentro de la aplicación.

---

## Tecnologías utilizadas

| Tecnología | Versión / uso |
|-----------|----------------|
| PHP | 8.3 |
| Laravel | 13 |
| Laravel UI | autenticación clásica |
| Spatie Laravel Permission | gestión de roles y permisos |
| Blade | vistas del servidor |
| Bootstrap 5 | interfaz visual |
| Vite | compilación de assets |
| PHPUnit | pruebas |

---

## Funcionalidades principales

### 1. Autenticación

La aplicación permite:

- registrar nuevos usuarios;
- iniciar sesión;
- cerrar sesión;
- redirigir al panel principal tras autenticarse.

### 2. Gestión de tareas

El módulo principal activo del proyecto es el de **tasks**, con operaciones de:

- listado;
- creación;
- edición;
- visualización de detalle;
- eliminación.

### 3. Gestión de usuarios

Existe una vista de listado de usuarios registrados, accesible únicamente para el rol **administrador**.

### 4. Control de acceso por roles

Las rutas están protegidas con middleware de roles. Los roles creados por el seeder son:

- `administrador`
- `editor`
- `usuario`

---

## Matriz de acceso

| Acción | administrador | editor | usuario |
|-------|:-------------:|:------:|:-------:|
| Ver listado de tareas | ✅ | ✅ | ✅ |
| Crear tareas | ✅ | ✅ | ❌ |
| Editar tareas | ✅ | ✅ | ❌ |
| Ver detalle de tarea | ✅ | ❌ | ❌ |
| Eliminar tareas | ✅ | ❌ | ❌ |
| Ver listado de usuarios | ✅ | ❌ | ❌ |

---

## Estructura relevante del proyecto

```text
app/
 ├─ Http/Controllers/
 │   ├─ Auth/
 │   ├─ HomeController.php
 │   ├─ TaskController.php
 │   └─ UserController.php
 ├─ Models/
 │   ├─ Task.php
 │   └─ User.php

database/
 ├─ migrations/
 └─ seeders/
     ├─ DatabaseSeeder.php
     └─ RolesAndPermissionsSeeder.php

resources/views/
 ├─ auth/
 ├─ tasks/
 ├─ users/
 └─ layouts/

routes/
 └─ web.php
```

---

## Instalación y puesta en marcha

### Requisitos previos

- PHP 8.3 o superior
- Composer
- Node.js y npm
- Un motor de base de datos configurado en el archivo `.env`

### Pasos

1. Clonar el repositorio y entrar en la carpeta del proyecto.
2. Instalar las dependencias de PHP:

```bash
composer install
```

3. Instalar las dependencias de frontend:

```bash
npm install
```

4. Crear el archivo de entorno:

```bash
copy .env.example .env
```

> En Linux o macOS puedes usar `cp .env.example .env`.

5. Configurar la conexión a base de datos en `.env`.
6. Generar la clave de la aplicación:

```bash
php artisan key:generate
```

7. Ejecutar migraciones y seeders:

```bash
php artisan migrate --seed
```

8. Iniciar el entorno de desarrollo:

```bash
composer run dev
```

Si prefieres ejecutarlo por separado:

```bash
php artisan serve
npm run dev
```

---

## Usuario de prueba

El seeder crea este usuario base:

- **Email:** test@example.com
- **Contraseña:** password

### Importante

El proyecto crea los **roles y permisos**, pero los usuarios registrados no reciben un rol automáticamente desde el registro. Para probar correctamente las rutas protegidas, asigna un rol manualmente con Tinker:

```bash
php artisan tinker
```

```php
$user = App\Models\User::where('email', 'test@example.com')->first();
$user->assignRole('administrador');
```

También puedes sustituir `administrador` por `editor` o `usuario` según la prueba que quieras realizar.

---

## Rutas principales

| Ruta | Descripción | Acceso |
|------|-------------|--------|
| `/` | redirección al inicio | público |
| `/login` | inicio de sesión | invitado |
| `/register` | registro | invitado |
| `/home` | panel principal | autenticado |
| `/tasks` | listado de tareas | administrador, editor, usuario |
| `/users` | listado de usuarios | solo administrador |

---

## Comandos útiles

```bash
php artisan migrate
php artisan db:seed
php artisan test
npm run build
```

---

## Observaciones

- El módulo documentado y operativo actualmente es **tasks**.
- El repositorio conserva archivos relacionados con **posts**, pero sus rutas están comentadas y no forman parte del flujo principal actual.
- Si al ejecutar Laravel aparece un error relacionado con `vendor/autoload.php`, primero debes ejecutar `composer install`.

---

## Autoría

Proyecto académico para la asignatura de **Seguridad Web**, centrado en autenticación y autorización en Laravel.

