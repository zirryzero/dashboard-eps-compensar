# Dashboard EPS Compensar

[🇪🇸 Español](README.md) | [🇺🇸 English](README.en.md)

Administrative dashboard and reporting module for EPS Compensar, built on **CodeIgniter 4** with user authentication and management powered by **CodeIgniter Shield**.

---

## 🚀 Features

- **Admin Dashboard:** User creation and role/permission management.
- **Reporting Module (CML):** Upload and visualization of Excel files for metrics and operational reporting.
- **Built-in Security:** Robust authentication with CodeIgniter Shield, CSRF protection, and route filters.
- **Responsive UI:** Modern web interface built with Bootstrap and DataTables for dynamic data inspection.

---

## 📋 System Requirements

- **PHP:** Version 7.4 or higher (PHP 8.0+ recommended).
- **Required PHP Extensions:**
  - `intl`
  - `mbstring`
  - `json`
  - `mysqlnd`
  - `curl`
- **Dependency Manager:** [Composer](https://getcomposer.org/)
- **Database:** MySQL 5.7+ or MariaDB 10.3+
- **Web Server:** Apache / Nginx or CodeIgniter's built-in development server.

---

## 🛠️ Installation & Setup

### 1. Clone the repository
```bash
git clone https://github.com/zirryzero/dashboard-eps-compensar.git
cd dashboard-eps-compensar
```

### 2. Install dependencies
```bash
composer install
```

### 3. Environment configuration
Copy the sample environment file `.env.example` to create your local `.env`:

On Windows (PowerShell / CMD):
```powershell
copy .env.example .env
```

On Linux / macOS:
```bash
cp .env.example .env
```

Open `.env` and set your local environment parameters:
```ini
CI_ENVIRONMENT = development

app.baseURL = 'http://localhost:8080/'

database.default.hostname = localhost
database.default.database = epscompensar
database.default.username = your_username
database.default.password = your_password
database.default.DBDriver = MySQLi
database.default.port = 3306
```

### 4. Run database migrations
Execute migrations to set up Shield authentication tables and system schemas:
```bash
php spark migrate
```

### 5. Launch local server
```bash
php spark serve
```
The application will be accessible at [http://localhost:8080](http://localhost:8080).

---

## 📁 Project Structure

```text
├── app/
│   ├── Config/            # Application configuration, database & security settings
│   ├── Controllers/       # Controllers (AdminController, Controll_cml, etc.)
│   ├── Models/            # Data models
│   └── Views/             # Views and layout templates
├── assets/                # Static assets (images, logos, icons)
├── css/                   # Stylesheets
├── excels/                # Excel upload directory (ignored by Git)
├── js/                    # JavaScript scripts and DataTables configurations
├── writable/              # Cache, logs, and temporary session files
├── .env.example           # Environment template file
├── .gitignore             # Excluded files and folders from Git
├── composer.json          # Project dependencies
└── README.md              # Project documentation
```

---

## 🔒 Security & Best Practices

- **Environment Variables:** Never commit `.env` to version control. Always use `.env.example` as a template.
- **Sensitive Data:** Upload folders (`excels/`, `writable/`) and local backups are completely excluded from Git tracking.
- **Production Environment:** When deploying to production, ensure `CI_ENVIRONMENT = production` and set the correct production `app.baseURL`.

---

## 📄 License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.
