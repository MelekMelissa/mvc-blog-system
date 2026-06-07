# MVC Blog System

## Overview

MVC Blog System is a blog application developed in pure PHP using the Model-View-Controller (MVC) architecture.

The application allows users to register, log in, create and manage blog posts, browse categories, leave comments, and manage their profiles. An administrator account has additional permissions for managing content and accessing the administration panel.

The user interface is built with Bootstrap 5 and is fully responsive.

---

## Implemented Features

### User Authentication

* User registration
* User login and logout
* Password hashing
* User profile page
* Change password functionality

### Post Management

* Create post
* View post details
* Edit post
* Delete post
* Draft and published post status
* Search posts by title and content
* Pagination (10 posts per page)

### Category Management

* Create category
* Edit category
* Delete category

### Comments

* Add comments to posts
* Delete comments

### Administration

* Admin dashboard
* User and admin roles
* Author or administrator permissions for editing and deleting posts

### Security

* PDO prepared statements to prevent SQL injection
* XSS protection using `htmlspecialchars()`
* CSRF protection for forms
* Session-based authentication
* Middleware for access control

### User Interface

* Bootstrap 5
* Responsive layout
* Navigation bar
* Cards and alerts
* Flash messages
* Confirmation dialogs

---

## Technologies

* PHP 8
* MySQL
* Bootstrap 5
* PDO
* MVC Architecture
* PHPUnit

---

## Database Setup

Create a database named:

```sql
CREATE DATABASE mvc_blog_system;
```

After creating the database, import the SQL script containing the tables:

* users
* categories
* posts
* comments

---

## Installation

1. Download or clone the project.

2. Place the project folder inside:

```text
xampp/htdocs/
```

3. Create a MySQL database named:

```text
mvc_blog_system
```

4. Import the database structure.

5. Configure database credentials in:

```text
config/database.php
```

6. Start Apache and MySQL from XAMPP.

7. Open the application:

```text
http://localhost/mvc-blog-system/public
```

---

## Default Accounts

### Administrator

Email:

```text
test@test.com
```

Password:

```text
1234567
```

Role:

```text
admin
```

### Regular User

Email:

```text
user@test.com
```

Password:

```text
1234567
```

Role:

```text
user
```

---

## PHPUnit Tests

The project includes simple PHPUnit tests for model methods.

Run tests with:

```bash
php vendor/bin/phpunit
```

Example result:

```text
OK (4 tests, 4 assertions)
```

---

## Screenshots

Add screenshots of:

* Home page
* Login page
* Post details page
* Categories page
* Profile page
* Admin dashboard

---

## Project Structure

```text
app
├── Controllers
├── Models
├── Views
├── Middleware
└── Core

config
└── routes.php

public
└── index.php

tests
├── PostTest.php
└── UserTest.php
```

---

## Author

Melek Koyun

MVC Web Application Development

Final Project – 2026
