CREATE DATABASE IF NOT EXISTS cms CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE cms;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    is_verified TINYINT(1) NOT NULL DEFAULT 1,
    verification_token VARCHAR(255) DEFAULT '0',
    role VARCHAR(30) NOT NULL DEFAULT 'USER'
);

CREATE TABLE pages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(120) NOT NULL,
    slug VARCHAR(200) NOT NULL UNIQUE,
    content TEXT NOT NULL,
    status VARCHAR(30) NOT NULL DEFAULT 'draft',
    author VARCHAR(120) NOT NULL,
    date DATETIME NOT NULL
);

INSERT INTO users (email, password, is_verified, verification_token, role)
VALUES (
    'admin@admin.com',
    '$2y$12$Kbu/qfoR5VwpHmiveT.jPOmiuNn2FxiWzVB3JV/b7.pNAuswSLB0a',
    1,
    '0',
    'ADMIN'
);