-- Change the prefix "blogger-cnn" to your desired one
-- Drop tables if they already exist (for fresh installs)
DROP TABLE IF EXISTS blogger-cnn_blog_tags;
DROP TABLE IF EXISTS blogger-cnn_blog;
DROP TABLE IF EXISTS blogger-cnn_tags;
DROP TABLE IF EXISTS blogger-cnn_categories;
DROP TABLE IF EXISTS blogger-cnn_users;

-- Create Users Table
CREATE TABLE blogger-cnn_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(255) NOT NULL UNIQUE,
    display_name VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create Categories Table
CREATE TABLE blogger-cnn_categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create Tags Table
CREATE TABLE blogger-cnn_tags (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create Blog Table
CREATE TABLE blogger-cnn_blog (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,
    description TEXT NOT NULL,
    author_id INT NOT NULL,
    category_id INT NOT NULL,
    featured_image VARCHAR(255) DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT fk_author FOREIGN KEY (author_id) REFERENCES blogger-cnn_users(id) ON DELETE CASCADE,
    CONSTRAINT fk_category FOREIGN KEY (category_id) REFERENCES blogger-cnn_categories(id) ON DELETE CASCADE
);

-- Create Blog-Tags Relationship Table (Many-to-Many)
CREATE TABLE blogger-cnn_blog_tags (
    blog_id INT NOT NULL,
    tag_id INT NOT NULL,
    PRIMARY KEY (blog_id, tag_id),
    CONSTRAINT fk_blog FOREIGN KEY (blog_id) REFERENCES blogger-cnn_blog(id) ON DELETE CASCADE,
    CONSTRAINT fk_tag FOREIGN KEY (tag_id) REFERENCES blogger-cnn_tags(id) ON DELETE CASCADE
);
