# Interview Assignment - Laravel 12 + Vite + Bootstrap App

This is my folder structure and code style for laravel development. 

**Read this doc to setup and run the project**

Note: I did not used the repository pattern in this as this is a small scale applciation, if i convert your ci app into laravel and tha is a big project than i'll follwo repository pattern which is more scalable.

- all the server side validations are insidee FormRequest Class,
- i created my own response structure Trait for error and succeess response
- followd proper status codee in response
- Using MVSC pattern to saperate business logic from Controller 
- all the business logcs are stored in services
- for some routes like Dealer address update (written server side validation and queries in controller), did not created servicess for that
    to explain that we can also use this type of code structure

## Prerequisites

Before setting up the application, ensure you have the following installed on your system:

- **PHP 8.2** or higher
- **MySQL** (or any supported database)
- **Node.js 24** or higher (includes npm)
- **Composer** (for PHP dependency management)

## Setup Instructions

### 1. Download and Extract

Download and extract the project files to your local machine.

### 2. Install Dependencies

Navigate to the project directory and install both PHP and Node.js dependencies:

```bash
# Install PHP dependencies
composer install

# Install Node.js dependencies
npm install
```

### 3. Configure Environment

Create a `.env` file by copying the `.env.example` file:

```bash
cp .env.example .env
```

Update the `.env` file with your MySQL database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=interview_assignment
DB_USERNAME=root
DB_PASSWORD=your_password
```

Generate the application key:

```bash
php artisan key:generate
```

### 4. Run Database Migrations

Run the migration to set up the database schema:

```bash
php artisan migrate:fresh
```

### 5. Run the Seeder

Run the seeder to fill the dummy data
Note: all the dummy users have password **123456** you can change it from UserFactory file

```bash
php artisan db:seed
```

## Running the Application

The application requires two terminal sessions to run simultaneously:

### Terminal 1 - Run PHP Development Server

```bash
php artisan serve
```

This will start the Laravel development server at `http://localhost:8000`

### Terminal 2 - Run Vite Development Server

```bash
npm run dev
```

This will start the Vite development server and compile your frontend assets on the fly.

Once both servers are running, you can access the application at `http://localhost:8000`

## Project Structure

The project follows the **MVC (Model-View-Controller)** architecture pattern:

```
interview_assignment/
│
├── app/
│   ├── Http/
│   │   ├── Controllers/          # Application controllers
│   │   │   ├── Auth/            # Authentication controllers
│   │   │   │   ├── LoginController.php
│   │   │   │   └── RegisterController.php
│   │   │   └── DashboardController.php
│   │   └── Requests/            # Form request validation (Server-side)
│   │
│   ├── Models/
│   │   ├── User.php             # User model
│   │   └── ...
│   │
│   ├── Services/
│   │   ├── Auth/                # Authentication services
│   │   └── ...
│   │
│   ├── Traits/
│   │   └── AjaxResponse.php     # Reusable traits for AJAX responses
│   │
│   └── Providers/               # Service providers
│       └── AppServiceProvider.php
│
├── config/                       # Configuration files
│   ├── app.php
│   ├── auth.php
│   ├── database.php
│   ├── cache.php
│   └── ...
│
├── database/
│   ├── migrations/              # Database migration files
│   ├── seeders/                 # Database seeders
│   └── factories/               # Model factories for testing
│
├── resources/
│   ├── css/
│   │   └── app.css             # Application styles
│   │
│   ├── js/
│   │   ├── app.js              # Main JavaScript entry point
│   │   ├── bootstrap.js         # Bootstrap configuration
│   │   ├── pages/              # Page-specific JavaScript
│   │   └── utils/              # Utility functions
│   │
│   └── views/
│       ├── layouts/            # Layout templates
│       └── pages/              # Page views
│
├── routes/
│   ├── web.php                 # Web routes
│   └── console.php             # Console commands
│
├── tests/                       # Test files
│   ├── Unit/
│   └── Feature/
│
├── storage/                     # Application storage
│   ├── app/
│   ├── framework/
│   └── logs/
│
├── public/                      # Public webroot
│   └── index.php               # Laravel entry point
│
├── vite.config.js              # Vite configuration
├── composer.json               # PHP dependencies
├── package.json                # Node.js dependencies
└── .env                        # Environment configuration
```

## Validation

### Server-side Validation

Server-side validation is handled through Laravel's **Form Requests** located in the `app/Http/Requests/` directory. These request classes validate incoming data according to defined rules before processing in controllers.

Example usage in controller:

```php
public function store(LoginRequest $request)
{
    // Request is automatically validated
    // Only reach here if validation passes
}
```

### Frontend Validation

The application uses **AJAX and jQuery** for client-side validation, providing real-time feedback to users without page reloads. This validation works alongside server-side validation for a smooth user experience.

## Key Features

- 🔐 User authentication (Login & Register)
- 📊 Dashboard with authenticated access
- 🏠 Address management for dealers
- ✅ Server-side validation using Form Requests
- 🎯 Client-side AJAX/jQuery validation
- 📱 Responsive Bootstrap UI
- ⚡ Fast development with Vite
- 🗄️ MySQL database integration

## Troubleshooting

- **CORS errors**: Check `config/cors.php` configuration
- **Database connection**: Verify MySQL is running and `.env` credentials are correct
- **Asset compilation**: Ensure npm dev server is running for CSS/JS assets
- **Port conflicts**: If ports 8000 or 5173 are in use, check `php artisan serve --port=PORT` or Vite config


## Additional Commands

```bash
# Build for production
npm run build

# Run database seeder
php artisan db:seed
```

---

**Created for Interview Assignment**
