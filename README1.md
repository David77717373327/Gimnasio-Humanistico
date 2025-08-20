# Sistema de Gestión Escolar

## Descripción

Sistema desarrollado en **Laravel** para gestionar un colegio, incluyendo autenticación, horarios de clases, menciones honoríficas, procesos de inscripciones e información institucional. Cumple con los requisitos funcionales RF01-RF10, soportando roles de **Administrador** (gestiona datos) y **Usuario** (consultas).

### Requisitos Funcionales
- **RF01**: Autenticación (correo/contraseña, roles: admin/user).
- **RF02**: Cierre de sesión seguro.
- **RF03-RF05**: Registro, edición, eliminación de horarios (grados, asignaturas, docentes, días/horas).
- **RF07-RF08**: Gestión de menciones honoríficas (registro implícito, edición, eliminación).
- **RF09**: Gestión de procesos de inscripciones (fechas, requisitos, grados).
- **RF10**: Consulta de información institucional (historia, misión, visión, estudiantes destacados).

## Instalación

### Prerrequisitos
- PHP >= 8.1
- Composer
- MySQL/PostgreSQL
- Laravel 11+
- Node.js (para frontend,/Jetstream)

### Pasos
1. Clona el repositorio:
   ```bash
   git clone <url-del-repositorio>
   cd sistema-escolar


Instala dependencias:composer install
npm install


Configura .env:DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=school_system
DB_USERNAME=root
DB_PASSWORD=


Genera la clave:php artisan key:generate


Ejecuta migraciones:php artisan migrate


(Opcional) Carga datos de prueba:php artisan db:seed


Inicia el servidor:php artisan serve



Estructura de la Base de Datos
El esquema es normalizado, escalable y usa claves foráneas para integridad. Tablas:

users: Autenticación y roles (RF01, RF02).
grades: Grados/cursos (RF03, RF09, RF10).
subjects: Asignaturas (RF03-RF05).
teachers: Docentes (RF03-RF05).
schedules: Horarios (RF03-RF05).
students: Estudiantes (RF07, RF08, RF10).
honor_mentions: Menciones honoríficas (RF07, RF08).
enrollment_processes: Procesos de inscripciones (RF09).
institutional_infos: Información institucional (RF10).

Relaciones
users → teachers (1:1, opcional, SET NULL).
grades → schedules, students (1:N, CASCADE).
subjects → schedules (1:N, CASCADE).
teachers → schedules (1:N, CASCADE).
students → honor_mentions (1:N, CASCADE).
enrollment_processes: Independiente, usa JSON para grados.
institutional_infos: Independiente.

Migraciones
A continuación, todas las migraciones en un solo bloque PHP para documentación. Cada tabla incluye comentarios explicando su propósito, columnas clave y restricciones. Para usarlas, divide este código en archivos separados bajo database/migrations/ (e.g., 2025_08_15_000001_create_users_table.php) o usa un script para generarlas.
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        // Tabla users: Autenticación y roles (RF01, RF02). Almacena credenciales y permisos.
        Schema::create('users', function (Blueprint $table) {
            $table->id()->comment('Clave primaria');
            $table->string('email')->unique()->comment('Correo único para login');
            $table->string('password')->comment('Contraseña hasheada');
            $table->enum('role', ['admin', 'user'])->default('user')->comment('Rol: admin (gestiona), user (consultas)');
            $table->string('remember_token', 100)->nullable()->comment('Token para sesiones persistentes');
            $table->timestamps()->comment('created_at, updated_at para auditoría');
        });

        // Tabla grades: Grados/cursos, base para horarios e inscripciones (RF03, RF09, RF10).
        Schema::create('grades', function (Blueprint $table) {
            $table->id()->comment('Clave primaria');
            $table->string('name', 100)->unique()->comment('Nombre del grado (ej. "1er Grado")');
            $table->text('description')->nullable()->comment('Descripción opcional');
            $table->timestamps();
        });

        // Tabla subjects: Asignaturas para horarios (RF03-RF05).
        Schema::create('subjects', function (Blueprint $table) {
            $table->id()->comment('Clave primaria');
            $table->string('name', 100)->unique()->comment('Nombre (ej. "Matemáticas")');
            $table->text('description')->nullable()->comment('Descripción opcional');
            $table->timestamps();
        });

        // Tabla teachers: Docentes asignados a horarios (RF03-RF05). Vinculable a users.
        Schema::create('teachers', function (Blueprint $table) {
            $table->id()->comment('Clave primaria');
            $table->string('name', 255)->comment('Nombre completo');
            $table->string('email', 255)->unique()->nullable()->comment('Correo opcional');
            $table->string('phone', 20)->nullable()->comment('Teléfono opcional');
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null')->comment('Vínculo a users, si es usuario');
            $table->timestamps();
        });

        // Tabla schedules: Horarios de clases (RF03-RF05). Soft deletes para eliminaciones reversibles.
        Schema::create('schedules', function (Blueprint $table) {
            $table->id()->comment('Clave primaria');
            $table->foreignId('grade_id')->constrained()->onDelete('cascade')->comment('Grado asociado');
            $table->foreignId('subject_id')->constrained()->onDelete('cascade')->comment('Asignatura');
            $table->foreignId('teacher_id')->constrained()->onDelete('cascade')->comment('Docente');
            $table->string('day', 20)->comment('Día (ej. "Lunes")');
            $table->time('start_time')->comment('Hora de inicio');
            $table->time('end_time')->comment('Hora de fin');
            $table->softDeletes()->comment('Soft deletes para evitar pérdida accidental');
            $table->timestamps();
        });

        // Tabla students: Estudiantes para menciones y consultas destacados (RF07, RF08, RF10).
        Schema::create('students', function (Blueprint $table) {
            $table->id()->comment('Clave primaria');
            $table->string('name', 255)->comment('Nombre completo');
            $table->string('email', 255)->nullable()->comment('Correo opcional');
            $table->foreignId('grade_id')->constrained()->onDelete('cascade')->comment('Grado al que pertenece');
            $table->boolean('outstanding')->default(false)->comment('Indica si es estudiante destacado (RF10)');
            $table->timestamps();
        });

        // Tabla honor_mentions: Menciones honoríficas (RF07, RF08). Soft deletes.
        Schema::create('honor_mentions', function (Blueprint $table) {
            $table->id()->comment('Clave primaria');
            $table->foreignId('student_id')->constrained()->onDelete('cascade')->comment('Estudiante asociado');
            $table->string('type', 255)->comment('Tipo de mención (ej. "Mejor Estudiante")');
            $table->text('description')->comment('Descripción detallada');
            $table->date('date')->comment('Fecha de la mención');
            $table->softDeletes()->comment('Soft deletes para eliminaciones reversibles');
            $table->timestamps();
        });

        // Tabla enrollment_processes: Procesos de inscripciones (RF09). JSON para grados disponibles.
        Schema::create('enrollment_processes', function (Blueprint $table) {
            $table->id()->comment('Clave primaria');
            $table->year('year')->comment('Año del proceso (ej. 2025)');
            $table->date('start_date')->comment('Fecha de inicio');
            $table->date('end_date')->comment('Fecha de fin');
            $table->text('requirements')->comment('Requisitos de inscripción');
            $table->json('available_grades')->comment('IDs de grados disponibles, en JSON para flexibilidad');
            $table->softDeletes()->comment('Soft deletes para eliminaciones reversibles');
            $table->timestamps();
        });

        // Tabla institutional_infos: Información institucional (RF10). ENUM para tipos.
        Schema::create('institutional_infos', function (Blueprint $table) {
            $table->id()->comment('Clave primaria');
            $table->enum('type', ['history', 'mission', 'vision', 'other'])->comment('Tipo de información');
            $table->text('content')->comment('Contenido (ej. texto de misión)');
            $table->timestamps();
        });
    }

    public function down()
    {
        // Revertir en orden inverso para evitar conflictos de claves foráneas
        Schema::dropIfExists('institutional_infos');
        Schema::dropIfExists('enrollment_processes');
        Schema::dropIfExists('honor_mentions');
        Schema::dropIfExists('students');
        Schema::dropIfExists('schedules');
        Schema::dropIfExists('teachers');
        Schema::dropIfExists('subjects');
        Schema::dropIfExists('grades');
        Schema::dropIfExists('users');
    }
};

Notas para Desarrolladores

Ejecución: Divide el código en archivos separados (e.g., 2025_08_15_000001_create_users_table.php) para cada tabla, o usa este bloque como referencia para un script consolidado. Ejecuta con php artisan migrate.
Validaciones: Agrega lógica en controladores para evitar solapamientos en horarios (schedules) y validar formatos (e.g., start_time como H:i).
Seguridad: Usa Laravel Auth para RF01/RF02. Protege rutas con middleware auth y role:admin.
Pruebas: Crea seeders (php artisan make:seeder) y factories para datos de prueba.
Escalabilidad: Considera paquetes como spatie/laravel-permission para roles más granulares o spatie/laravel-activitylog para auditoría.
Índices: Los índices unique (e.g., email, name) optimizan consultas y evitan duplicados.
Soft Deletes: Usados en schedules, honor_mentions, enrollment_processes para cumplir con RF05, RF08, RF09, permitiendo restaurar datos eliminados.

Para más detalles, revisa los requisitos funcionales o contacta al equipo de desarrollo.```

contraseñas de la pagina web:

Administrador: 
admin@example.com
password123

Estudiante:
jhonburgos@gmail.com
12345678