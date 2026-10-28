# Dashboard EPS Compensar

[🇪🇸 Español](README.md) | [🇺🇸 English](README.en.md)

Sistema de reportería y panel administrativo para EPS Compensar, desarrollado sobre **CodeIgniter 4** con autenticación y gestión de usuarios mediante **CodeIgniter Shield**.

---

## 🚀 Características

- **Panel Administrativo:** Gestión y creación de usuarios con roles y permisos controlados.
- **Módulo de Reportes (CML):** Carga y visualización de archivos Excel para reportería y métricas.
- **Seguridad Integrada:** Autenticación robusta con CodeIgniter Shield, protección CSRF y filtros de rutas.
- **Diseño Responsivo:** Interfaz gráfica basada en Bootstrap y DataTables para consulta dinámica de registros.

---

## 📋 Requisitos del Sistema

- **PHP:** Versión 7.4 o superior (PHP 8.0+ recomendado).
- **Extensiones de PHP requeridas:**
  - `intl`
  - `mbstring`
  - `json`
  - `mysqlnd`
  - `curl`
- **Gestor de Dependencias:** [Composer](https://getcomposer.org/)
- **Base de Datos:** MySQL 5.7+ o MariaDB 10.3+
- **Servidor Web:** Apache / Nginx o el servidor de desarrollo integrado de CodeIgniter.

---

## 🛠️ Instalación y Configuración

### 1. Clonar el repositorio
```bash
git clone https://github.com/zirryzero/dashboard-eps-compensar.git
cd dashboard-eps-compensar
```

### 2. Instalar dependencias
```bash
composer install
```

### 3. Configurar variables de entorno
Copia la plantilla de entorno `.env.example` para crear tu `.env` local:

En Windows (PowerShell / CMD):
```powershell
copy .env.example .env
```

En Linux / macOS:
```bash
cp .env.example .env
```

Abre el archivo `.env` y configura los parámetros de tu entorno local:
```ini
CI_ENVIRONMENT = development

app.baseURL = 'http://localhost:8080/'

database.default.hostname = localhost
database.default.database = epscompensar
database.default.username = tu_usuario
database.default.password = tu_contraseña
database.default.DBDriver = MySQLi
database.default.port = 3306
```

### 4. Ejecutar migraciones de base de datos
Para crear las tablas de autenticación (Shield) y las tablas del sistema:
```bash
php spark migrate
```

### 5. Iniciar el servidor local
```bash
php spark serve
```
El sistema estará accesible en [http://localhost:8080](http://localhost:8080).

---

## 📁 Estructura del Proyecto

```text
├── app/
│   ├── Config/            # Configuraciones generales, base de datos y seguridad
│   ├── Controllers/       # Controladores (AdminController, Controll_cml, etc.)
│   ├── Models/            # Modelos de datos
│   └── Views/             # Plantillas y vistas del sistema
├── assets/                # Imágenes, logos y recursos estáticos
├── css/                   # Hojas de estilo
├── excels/                # Directorio de carga de archivos Excel (ignorado por Git)
├── js/                    # Scripts JavaScript y configuración de DataTables
├── writable/              # Archivos de caché, logs y sesiones temporales
├── .env.example           # Plantilla de variables de entorno
├── .gitignore             # Archivos y carpetas excluidas de Git
├── composer.json          # Dependencias del proyecto
└── README.md              # Documentación del proyecto
```

---

## 🔒 Seguridad y Buenas Prácticas

- **Variables de Entorno:** Nunca subas el archivo `.env` al repositorio. Utiliza siempre `.env.example` como plantilla.
- **Datos Sensibles:** Las carpetas de subida (`excels/`, `writable/`) y respaldos locales están excluidas del control de versiones.
- **Entorno de Producción:** Al desplegar en producción, asegúrate de cambiar `CI_ENVIRONMENT = production` y configurar correctamente `app.baseURL`.

---

## 📄 Licencia

Este proyecto está bajo la Licencia MIT. Consulta el archivo [LICENSE](LICENSE) para más detalles.
