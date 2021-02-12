# Feedback System - CodeIgniter 4 (Version 4.1.1)

Basic feedback system develop using great framework.

## Feature

### Client side

- Write/send Feedback - `http://localhost:8080/feedback`

### Dashboard login info

- Email: `admin@jaironlanda.com`
- Password: `admin`

### Admin side

- Login - `http://localhost:8080/login`
- Dashboard - `http://localhost:8080/dashboard`
    - Total feedback
    - List feedback
- View feedback detail - `http://localhost:8080/dashboard/view/{feedback_id}`
- Delete feedback - `http://localhost:8080/dashboard/delete/{feedback_id}`

## Installation & updates

`composer update` 
whenever there is a new release of the framework.

When updating, check the release notes to see if there are any changes you might need to apply
to your `app` folder. The affected files can be copied or merged from
`vendor/codeigniter4/framework/app`.

## Setup

Copy `env` to `.env` and tailor for your app, specifically the baseURL
and any database settings.

### Database settings

Please replace `YOURDBUSERNAME` and `YOURDBPASSWORD` based on your database server settings
```
database.default.hostname = localhost
database.default.database = feedbackSys
database.default.username = YOURDBUSERNAME
database.default.password = YOURDBPASSWORD
database.default.DBDriver = MySQLi
```

### SQL file

`feedback-management/SQL-file/Dump20210212-feedback-management.sql`

## Server Requirements

PHP version 7.3 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (enabled by default - don't turn it off)

## Generate encryption key (Optional)

`php spark key:generate`