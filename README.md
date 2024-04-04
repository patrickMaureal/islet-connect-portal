## ISLET CONNECT PORTAL

## Installation

> Clone the repository

> Open a terminal, and navigate to your project directory. 

> Execute below commands:

```bash
npm install
composer install
cp .env.example .env
php artisan key:generate
```

> Create your database name, user, password from your local database server.

> Connect your application to your database: Open `.env` file and configure below to work with your local database connection.
```bash
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

> Change mail configuration: Open `.env` file and copy below to work with email notification.
```bash
MAIL_MAILER=
MAIL_HOST=
MAIL_PORT=
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=
MAIL_FROM_ADDRESS=
```

> Execute below command. This will migrate all tables and seeds user account.
```bash
php artisan migrate:fresh --seed
```

## Usage - Default login account

> Default administrator login account: 
- Url: http://islet-connect-portal.test/login
- Username: `test@test.com`
- Password: `12345678`

## Email notification configuration for development
Enable Queue Jobs - System's email sending service

> Open a terminal

> Execute command in your project root directory to enable queue jobs and made priority.
```bash
php artisan queue:work --queue=high,default
```



## Author

> [CVISNET Foundation Inc](https://cvis.net.ph/)
