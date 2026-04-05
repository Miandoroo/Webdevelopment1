# Gym Class Booking Platform

This project is a scoped-down MVC assignment for Web Development 1. It focuses on class booking instead of a larger gym ecosystem so the implementation stays realistic and aligned with the rubric.

## Scope

- Anonymous visitors can view the homepage, class schedule and trainers
- Registered users can register, log in, book classes, cancel bookings and save account preferences
- Admin users can manage classes, trainers and users
- JSON endpoints support filtering and reservation actions through `fetch()`

## Architecture

Request -> Router -> Controller -> Service -> Repository -> Database -> View / JSON response

## Assignment alignment

- MVC structure with thin controllers
- PDO repositories with prepared statements
- Session-based authentication
- Password hashing via `password_hash()` / `password_verify()`
- Bootstrap responsive layout
- JSON API endpoints
- JavaScript with asynchronous updates using `fetch()`

## Setup

1. Run `composer dump-autoload`
2. Create a database and import `app/src/Database/seed.sql`
3. Update database credentials in `app/src/Config/database.php`
4. Point your local web server to `app/public`
