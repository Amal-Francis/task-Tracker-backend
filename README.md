# Task Tracker – Backend

A RESTful API built with **Laravel 12** and **PHP** for a full-stack Task Tracker application. It handles user authentication and task management operations, allowing authenticated users to create, retrieve, complete, and delete their personal tasks.

The backend provides secure API endpoints using Laravel Sanctum and supports both MySQL for local development and PostgreSQL for production deployment.

## Live Application

🌐 **Frontend:** [Task Tracker – Live](https://task-tracker-frontend-pearl-eta.vercel.app/)

🚀 **Backend API:** [Task Tracker – Render](https://task-tracker-backend-rrol.onrender.com/)

🎥 **Video Demonstration:** [Task Tracker - Demo](https://youtu.be/SrTdbmpHhzQ)

## Frontend Repository

🔗 [Task Tracker – Frontend GitHub Repository](https://github.com/Amal-Francis/task-tracker-frontend)

## Features

### Authentication

- User registration.
- User login and logout.
- Session-based authentication using Laravel Sanctum.
- Protected API endpoints for authenticated users.

### Task Management

- Create new tasks.
- Retrieve the authenticated user's tasks.
- Mark tasks as completed or pending.
- Delete existing tasks.
- Associate tasks with their respective users.

### Database

- MySQL for local development.
- Neon PostgreSQL for production deployment.
- Laravel migrations for database schema management.

## Technologies Used

| Technology        | Purpose                        |
| ----------------- | ------------------------------ |
| PHP 8.2+          | Backend programming language   |
| Laravel 12        | Backend framework              |
| Laravel Sanctum 4 | Authentication                 |
| MySQL             | Local development database     |
| PostgreSQL        | Production database            |
| Neon              | Hosted PostgreSQL database     |
| REST API          | Frontend-backend communication |
| Composer          | PHP dependency management      |

## API Endpoints

All endpoints use the `/api` prefix.

### Authentication Endpoints

| Method | Endpoint        | Description              | Authentication |
| ------ | --------------- | ------------------------ | -------------- |
| POST   | `/api/register` | Register a new user      | No             |
| POST   | `/api/login`    | Authenticate a user      | No             |
| POST   | `/api/logout`   | Log out the current user | Yes            |

### Task Management Endpoints

| Method | Endpoint              | Description            | Authentication |
| ------ | --------------------- | ---------------------- | -------------- |
| POST   | `/api/add`            | Create a new task      | Yes            |
| GET    | `/api/show`           | Retrieve user tasks    | Yes            |
| PUT    | `/api/completed/{id}` | Toggle task completion | Yes            |
| DELETE | `/api/delete/{id}`    | Delete a task          | Yes            |

**Note:** Protected endpoints require an authenticated session managed through Laravel Sanctum.

## Getting Started

Follow these steps to run the backend locally.

### Prerequisites

Make sure you have installed:

- PHP 8.2 or later
- Composer
- MySQL
- Node.js and npm (if you need to run the Laravel frontend assets or development scripts)
- Git

### 1. Clone the repository

```bash
git clone https://github.com/Amal-Francis/task-Tracker-backend.git
```

### 2. Navigate to the project directory

```bash
cd task-Tracker-backend
```

### 3. Install dependencies

```bash
composer install
```

### 4. Configure environment variables

Create your local environment file:

```bash
cp .env.example .env
```

On Windows PowerShell, you can alternatively use:

```powershell
Copy-Item .env.example .env
```

Generate the Laravel application key:

```bash
php artisan key:generate
```

### 5. Configure the database

For local development, configure your `.env` file to use MySQL:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=task_tracker
DB_USERNAME=root
DB_PASSWORD=
```

Create a MySQL database named `task_tracker` using phpMyAdmin or MySQL.

For production, the application uses PostgreSQL hosted through Neon. Configure the production database credentials through your Render environment variables.

**Never commit your actual `.env` file or database credentials to GitHub.**

### 6. Run database migrations

```bash
php artisan migrate
```

This creates the required database tables using Laravel migrations.

### 7. Start the Laravel development server

```bash
php artisan serve
```

The backend will be available at:

```text
http://localhost:8000
```

## Authentication and CORS Configuration

The frontend communicates with the backend using Axios.

Laravel Sanctum handles session-based authentication for the frontend application.

When running locally, configure the appropriate frontend origin, stateful domains and CORS settings to allow requests from your React development server.

For production, configure the deployed frontend domain and backend cookie/session settings appropriately.

## Deployment

The backend is deployed using:

| Service | Purpose                        |
| ------- | ------------------------------ |
| Render  | Backend hosting                |
| Neon    | Production PostgreSQL database |
| Vercel  | Frontend hosting               |

**Production backend URL:**

https://task-tracker-backend-rrol.onrender.com

## Project Structure

```text
task-Tracker-backend/
│
├── app/
│   ├── Http/
│   │   └── Controllers/
│   └── Models/
│
├── bootstrap/
├── config/
├── database/
│   ├── migrations/
│   └── seeders/
│
├── public/
├── resources/
├── routes/
│   └── api.php
│
├── storage/
├── tests/
├── .env.example
├── artisan
├── composer.json
└── README.md
```

_This is a simplified overview of the Laravel application structure._

## Author

**Amal Francis**

- GitHub: [Amal-Francis](https://github.com/Amal-Francis)
- Frontend Repository: [task-tracker-frontend](https://github.com/Amal-Francis/task-tracker-frontend)
- Backend Repository: [task-Tracker-backend](https://github.com/Amal-Francis/task-Tracker-backend)

---

⭐ Thank you for checking out this project!
