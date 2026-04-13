# Mini PHP MVC CMS

A lightweight **native PHP CMS** developed as part of a project focused on building a **light CMS using an MVC architecture**. The application allows the management of users, roles, and content pages through both a **front office** and a **back office**.

The project is based on:
- **Models / Views / Controllers**
- user authentication
- database connection through a **Singleton**
- an **autoloader**
- **PHP namespaces**

## Project Goal

The goal of this project is to build a lightweight CMS in native PHP that allows:
- user management
- role and permission management
- page creation, editing, and deletion
- dynamic page display using routes such as `/page/slug`

## Main Features

- MVC architecture
- User authentication
- Sign up
- Login / logout
- Role management
- Admin back office
- Page CRUD
- User CRUD
- Slug generation for pages
- Front office page display
- Protected admin routes
- Password hashing
- Singleton database connection
- Autoloader and namespaces

## Technologies Used

- PHP 8.2
- Apache
- MariaDB
- phpMyAdmin
- Docker / Docker Compose

## Project Structure

```text
www/
├── Core/
├── Controllers/
├── Models/
├── Views/
│   ├── layout/
│   ├── page/
│   ├── admin/
│   └── Auth/
├── helpers/
├── config/
├── index.php
└── .htaccess
