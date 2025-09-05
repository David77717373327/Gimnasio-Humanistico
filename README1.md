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



php artisan view:clear
php artisan route:clear
php artisan config:clear
php artisan cache:clear
php artisan serve


<style>
        /* Variables de diseño empresarial */
        :root {
            --primary-color: #2563eb;
            --primary-dark: #1e40af;
            --secondary-color: #64748b;
            --success-color: #059669;
            --warning-color: #d97706;
            --error-color: #dc2626;
            --surface-color: #ffffff;
            --background-color: #f8fafc;
            --border-color: #e2e8f0;
            --text-primary: #1e293b;
            --text-secondary: #64748b;
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            --border-radius: 8px;
            --border-radius-lg: 12px;
            --transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Base styles */
        body {
            background-color: var(--background-color);
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            color: var(--text-primary);
            line-height: 1.6;
        }

        /* Header empresarial */
        .app-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            color: white;
            padding: 1.5rem 0;
            box-shadow: var(--shadow-lg);
        }

        .app-title {
            font-size: 1.75rem;
            font-weight: 700;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .app-subtitle {
            opacity: 0.9;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        /* Cards empresariales */
        .enterprise-card {
            background: var(--surface-color);
            border: 1px solid var(--border-color);
            border-radius: var(--border-radius-lg);
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
        }

        .enterprise-card:hover {
            box-shadow: var(--shadow-md);
        }

        /* Controles de la barra superior */
        .control-bar {
            background: var(--surface-color);
            border: 1px solid var(--border-color);
            border-radius: var(--border-radius-lg);
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: var(--shadow-sm);
        }

        .grade-selector {
            background: var(--surface-color);
            border: 2px solid var(--border-color);
            border-radius: var(--border-radius);
            padding: 0.75rem 1rem;
            font-weight: 500;
            transition: var(--transition);
        }

        .grade-selector:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgb(37 99 235 / 0.1);
            outline: none;
        }

        /* Status indicators mejorados */
        .status-indicator {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1rem;
            border-radius: var(--border-radius);
            font-weight: 500;
            font-size: 0.875rem;
        }

        .status-success {
            background: rgb(5 150 105 / 0.1);
            color: var(--success-color);
            border: 1px solid rgb(5 150 105 / 0.2);
        }

        .status-info {
            background: rgb(37 99 235 / 0.1);
            color: var(--primary-color);
            border: 1px solid rgb(37 99 235 / 0.2);
        }

        .status-loading {
            background: rgb(100 116 139 / 0.1);
            color: var(--secondary-color);
            border: 1px solid rgb(100 116 139 / 0.2);
        }

        /* Spinner profesional */
        .loading-spinner {
            width: 16px;
            height: 16px;
            border: 2px solid transparent;
            border-top: 2px solid currentColor;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Layout principal con split view */
        .main-layout {
            display: grid;
            grid-template-columns: 300px 1fr;
            gap: 2rem;
            min-height: calc(100vh - 200px);
        }

        @media (max-width: 1024px) {
            .main-layout {
                grid-template-columns: 1fr;
                gap: 1rem;
            }
        }

        /* Sidebar mejorado */
        .sidebar {
            position: sticky;
            top: 2rem;
            height: fit-content;
            max-height: calc(100vh - 120px);
            overflow-y: auto;
        }

        .sidebar-section {
            margin-bottom: 1.5rem;
        }

        .sidebar-title {
            font-size: 1.125rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        /* Chips mejorados */
        .resource-chip {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.875rem 1rem;
            background: var(--surface-color);
            border: 2px solid var(--border-color);
            border-radius: var(--border-radius);
            cursor: grab;
            transition: var(--transition);
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .resource-chip:hover {
            border-color: var(--primary-color);
            box-shadow: var(--shadow-sm);
            transform: translateY(-1px);
        }

        .resource-chip:active {
            cursor: grabbing;
            transform: translateY(0);
        }

        .resource-chip.subject {
            border-left: 4px solid var(--primary-color);
        }

        .resource-chip.teacher {
            border-left: 4px solid var(--warning-color);
        }

        .chip-icon {
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--background-color);
            border-radius: 4px;
            font-size: 12px;
        }

        /* Tabla de horarios empresarial */
        .schedule-container {
            background: var(--surface-color);
            border: 1px solid var(--border-color);
            border-radius: var(--border-radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow-sm);
        }

        .schedule-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            color: white;
            padding: 1rem 1.5rem;
            font-weight: 600;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .schedule-table-wrapper {
            overflow-x: auto;
            max-height: calc(100vh - 300px);
            scrollbar-width: thin;
            scrollbar-color: var(--secondary-color) var(--background-color);
        }

        .schedule-table-wrapper::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        .schedule-table-wrapper::-webkit-scrollbar-track {
            background: var(--background-color);
        }

        .schedule-table-wrapper::-webkit-scrollbar-thumb {
            background: var(--secondary-color);
            border-radius: 4px;
        }

        .schedule-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 700px;
        }

        .schedule-table th {
            background: var(--background-color);
            color: var(--text-primary);
            font-weight: 600;
            padding: 1rem;
            text-align: center;
            border-bottom: 2px solid var(--border-color);
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .schedule-table td {
            padding: 0;
            border: 1px solid var(--border-color);
            vertical-align: top;
            position: relative;
        }

        .time-cell {
            background: var(--background-color);
            font-weight: 600;
            color: var(--text-secondary);
            text-align: center;
            padding: 1rem 0.5rem;
            font-size: 0.875rem;
            white-space: nowrap;
            position: sticky;
            left: 0;
            z-index: 5;
            border-right: 2px solid var(--border-color);
        }

        /* Drop zones mejoradas */
        .schedule-cell {
            min-height: 80px;
            padding: 0.5rem;
            transition: var(--transition);
            position: relative;
            background: var(--surface-color);
        }

        .schedule-cell.dragover {
            background: rgb(37 99 235 / 0.1);
            border: 2px dashed var(--primary-color);
        }

        .schedule-cell.occupied {
            background: var(--background-color);
        }

        /* Class slots profesionales */
        .class-slot {
            background: var(--surface-color);
            border: 1px solid var(--border-color);
            border-radius: var(--border-radius);
            padding: 0.75rem;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: var(--transition);
            box-shadow: var(--shadow-sm);
            position: relative;
            overflow: hidden;
        }

        .class-slot.existing {
            background: linear-gradient(135deg, rgb(5 150 105 / 0.05) 0%, rgb(5 150 105 / 0.1) 100%);
            border-color: var(--success-color);
            border-left: 4px solid var(--success-color);
        }

        .class-slot.pending {
            background: linear-gradient(135deg, rgb(217 119 6 / 0.05) 0%, rgb(217 119 6 / 0.1) 100%);
            border-color: var(--warning-color);
            border-left: 4px solid var(--warning-color);
        }

        .class-slot.error {
            background: linear-gradient(135deg, rgb(220 38 38 / 0.05) 0%, rgb(220 38 38 / 0.1) 100%);
            border-color: var(--error-color);
            border-left: 4px solid var(--error-color);
        }

        .slot-content {
            flex-grow: 1;
        }

        .slot-subject {
            font-weight: 600;
            font-size: 0.875rem;
            color: var(--text-primary);
            margin-bottom: 0.25rem;
            line-height: 1.2;
        }

        .slot-teacher {
            font-size: 0.75rem;
            color: var(--text-secondary);
            line-height: 1.2;
        }

        .slot-actions {
            display: flex;
            justify-content: flex-end;
            gap: 0.25rem;
            margin-top: 0.5rem;
        }

        .slot-btn {
            background: none;
            border: none;
            padding: 0.25rem;
            border-radius: 4px;
            cursor: pointer;
            transition: var(--transition);
            font-size: 0.75rem;
            opacity: 0.7;
        }

        .slot-btn:hover {
            opacity: 1;
            background: var(--background-color);
        }

        .slot-status {
            position: absolute;
            top: 0.5rem;
            right: 0.5rem;
            width: 8px;
            height: 8px;
            border-radius: 50%;
        }

        .slot-status.existing {
            background: var(--success-color);
        }

        .slot-status.pending {
            background: var(--warning-color);
        }

        .slot-status.error {
            background: var(--error-color);
        }

        /* Placeholders mejorados */
        .slot-placeholder {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 80px;
            color: var(--text-secondary);
            font-size: 0.75rem;
            text-align: center;
            border: 2px dashed var(--border-color);
            border-radius: var(--border-radius);
            transition: var(--transition);
        }

        .slot-placeholder:hover {
            border-color: var(--primary-color);
            color: var(--primary-color);
            background: rgb(37 99 235 / 0.02);
        }

        .placeholder-day {
            font-weight: 600;
            font-size: 0.625rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0.25rem;
        }

        .placeholder-time {
            font-size: 0.625rem;
            margin-bottom: 0.25rem;
        }

        .placeholder-action {
            font-size: 0.625rem;
            opacity: 0.7;
        }

        /* Break row */
        .break-row td {
            background: linear-gradient(135deg, var(--background-color) 0%, rgb(100 116 139 / 0.05) 100%);
            padding: 0.75rem;
            text-align: center;
        }

        .break-indicator {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            background: var(--surface-color);
            border: 1px solid var(--border-color);
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--text-secondary);
        }

        /* Botones empresariales */
        .btn-enterprise {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            font-size: 0.875rem;
            border: 2px solid transparent;
            border-radius: var(--border-radius);
            transition: var(--transition);
            cursor: pointer;
            text-decoration: none;
            background: none;
        }

        .btn-enterprise.primary {
            background: var(--primary-color);
            color: white;
        }

        .btn-enterprise.primary:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
            box-shadow: var(--shadow-md);
        }

        .btn-enterprise.secondary {
            background: var(--surface-color);
            color: var(--text-primary);
            border-color: var(--border-color);
        }

        .btn-enterprise.secondary:hover {
            border-color: var(--primary-color);
            color: var(--primary-color);
        }

        .btn-enterprise.success {
            background: var(--success-color);
            color: white;
        }

        .btn-enterprise.success:hover {
            background: rgb(5 150 105 / 0.9);
            transform: translateY(-1px);
            box-shadow: var(--shadow-md);
        }

        .btn-enterprise.warning {
            background: var(--warning-color);
            color: white;
        }

        .btn-enterprise.danger {
            background: var(--error-color);
            color: white;
        }

        .btn-enterprise.danger:hover {
            background: rgb(220 38 38 / 0.9);
        }

        .btn-enterprise:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            transform: none !important;
        }

        /* Action bar flotante */
        .action-bar {
            position: sticky;
            bottom: 2rem;
            background: var(--surface-color);
            border: 1px solid var(--border-color);
            border-radius: var(--border-radius-lg);
            padding: 1rem 1.5rem;
            box-shadow: var(--shadow-lg);
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 2rem;
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95);
        }

        /* Notificaciones profesionales */
        .notification-container {
            position: fixed;
            top: 2rem;
            right: 2rem;
            z-index: 1000;
            width: 400px;
            max-width: 90vw;
        }

        .notification {
            background: var(--surface-color);
            border: 1px solid var(--border-color);
            border-radius: var(--border-radius-lg);
            box-shadow: var(--shadow-lg);
            margin-bottom: 1rem;
            overflow: hidden;
            animation: slideInRight 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        @keyframes slideInRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .notification-header {
            padding: 1rem 1.5rem 0.5rem;
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
        }

        .notification-icon {
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            flex-shrink: 0;
        }

        .notification.success .notification-icon {
            background: rgb(5 150 105 / 0.1);
            color: var(--success-color);
        }

        .notification.error .notification-icon {
            background: rgb(220 38 38 / 0.1);
            color: var(--error-color);
        }

        .notification.warning .notification-icon {
            background: rgb(217 119 6 / 0.1);
            color: var(--warning-color);
        }

        .notification.info .notification-icon {
            background: rgb(37 99 235 / 0.1);
            color: var(--primary-color);
        }

        .notification-content {
            flex-grow: 1;
        }

        .notification-title {
            font-weight: 600;
            font-size: 0.875rem;
            color: var(--text-primary);
            margin-bottom: 0.25rem;
        }

        .notification-message {
            font-size: 0.875rem;
            color: var(--text-secondary);
            line-height: 1.4;
        }

        .notification-suggestion {
            font-size: 0.75rem;
            color: var(--text-secondary);
            font-style: italic;
            margin-top: 0.5rem;
            padding-top: 0.5rem;
            border-top: 1px solid var(--border-color);
        }

        .notification-close {
            background: none;
            border: none;
            cursor: pointer;
            padding: 0.25rem;
            color: var(--text-secondary);
            opacity: 0.7;
            transition: var(--transition);
        }

        .notification-close:hover {
            opacity: 1;
        }

        .notification-progress {
            height: 3px;
            background: var(--border-color);
            overflow: hidden;
        }

        .notification-progress-bar {
            height: 100%;
            background: var(--primary-color);
            animation: progress 5s linear forwards;
        }

        @keyframes progress {
            from { width: 100%; }
            to { width: 0%; }
        }

        /* Modales empresariales */
        .enterprise-modal .modal-content {
            border: none;
            border-radius: var(--border-radius-lg);
            box-shadow: var(--shadow-lg);
        }

        .enterprise-modal .modal-header {
            background: var(--background-color);
            border-bottom: 1px solid var(--border-color);
            padding: 1.5rem;
        }

        .enterprise-modal .modal-title {
            font-weight: 600;
            color: var(--text-primary);
        }

        .enterprise-modal .modal-body {
            padding: 1.5rem;
        }

        .enterprise-modal .modal-footer {
            background: var(--background-color);
            border-top: 1px solid var(--border-color);
            padding: 1rem 1.5rem;
        }

        /* Estados de arrastre */
        body.dragging .schedule-cell:not(.occupied) {
            background: rgb(37 99 235 / 0.02);
            border: 1px dashed rgb(37 99 235 / 0.3);
        }

        body.dragging .resource-chip {
            opacity: 0.7;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .main-layout {
                grid-template-columns: 1fr;
            }
            
            .sidebar {
                position: relative;
                max-height: none;
            }
            
            .notification-container {
                width: calc(100vw - 2rem);
                right: 1rem;
                left: 1rem;
            }
            
            .action-bar {
                flex-direction: column;
                gap: 1rem;
            }
        }

        /* Utilidades */
        .text-truncate {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .sr-only {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            border: 0;
        }

        /* Estados vacíos */
        .empty-state {
            text-align: center;
            padding: 3rem 2rem;
            color: var(--text-secondary);
        }

        .empty-state-icon {
            font-size: 3rem;
            opacity: 0.5;
            margin-bottom: 1rem;
        }

        .empty-state-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }

        .empty-state-description {
            font-size: 0.875rem;
            max-width: 400px;
            margin: 0 auto;
        }
    </style>