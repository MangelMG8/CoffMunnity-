CREATE DATABASE IF NOT EXISTS coffmunnity_db;
USE coffmunnity_db;

CREATE TABLE users (
    id VARCHAR(128) PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password_hash VARCHAR(255),
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    birth_date DATE,
    profile_pic VARCHAR(255) DEFAULT '/assets/img/user.png',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE posts (
    id CHAR(36) PRIMARY KEY,
    user_id VARCHAR(128) NOT NULL,
    title VARCHAR(150) NOT NULL,
    content TEXT NOT NULL,
    type ENUM('review', 'story', 'recipe', 'article') NOT NULL,
    image_url VARCHAR(255),
    rating INT DEFAULT NULL CHECK (rating BETWEEN 1 AND 5),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE game_scores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id VARCHAR(128) NOT NULL,
    game_name VARCHAR(50) NOT NULL,
    score INT NOT NULL,
    achieved_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    INDEX idx_game_scores_ranking (game_name, score DESC)
);

CREATE TABLE conversations (
    id CHAR(36) PRIMARY KEY,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE conversation_participants (
    conversation_id CHAR(36) NOT NULL,
    user_id VARCHAR(128) NOT NULL,
    PRIMARY KEY (conversation_id, user_id),
    FOREIGN KEY (conversation_id) REFERENCES conversations(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    conversation_id CHAR(36) NOT NULL,
    sender_id VARCHAR(128) NOT NULL,
    message_text TEXT NOT NULL,
    is_read BOOLEAN DEFAULT FALSE,
    sent_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (conversation_id) REFERENCES conversations(id) ON DELETE CASCADE,
    FOREIGN KEY (sender_id) REFERENCES users(id) ON DELETE CASCADE
);