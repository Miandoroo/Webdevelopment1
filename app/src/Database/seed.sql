CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    role ENUM('user', 'admin') NOT NULL DEFAULT 'user',
    training_level VARCHAR(50) DEFAULT NULL,
    preferred_training_type VARCHAR(50) DEFAULT NULL,
    theme_preference VARCHAR(20) NOT NULL DEFAULT 'light',
    is_deleted TINYINT(1) NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE trainers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    biography TEXT,
    certifications TEXT,
    specializations TEXT,
    photo_url VARCHAR(255) DEFAULT NULL,
    is_deleted TINYINT(1) NOT NULL DEFAULT 0
);

CREATE TABLE classes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    description TEXT,
    class_date DATE NOT NULL,
    start_time TIME NOT NULL,
    duration_minutes INT NOT NULL,
    level VARCHAR(50) NOT NULL,
    training_type VARCHAR(50) NOT NULL,
    max_participants INT NOT NULL,
    trainer_id INT DEFAULT NULL,
    is_deleted TINYINT(1) NOT NULL DEFAULT 0,
    CONSTRAINT fk_classes_trainer FOREIGN KEY (trainer_id) REFERENCES trainers(id)
);

CREATE TABLE reservations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    class_id INT NOT NULL,
    status ENUM('active', 'cancelled') NOT NULL DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_reservations_user FOREIGN KEY (user_id) REFERENCES users(id),
    CONSTRAINT fk_reservations_class FOREIGN KEY (class_id) REFERENCES classes(id)
);

INSERT INTO trainers (name, biography, certifications, specializations, photo_url) VALUES
('Nina Vermeer', 'Strength and mobility coach.', 'NASM CPT', 'Strength, Mobility', NULL),
('David Jansen', 'HIIT and endurance specialist.', 'ACE CPT', 'HIIT, Conditioning', NULL);

INSERT INTO classes (title, description, class_date, start_time, duration_minutes, level, training_type, max_participants, trainer_id) VALUES
('Morning HIIT', 'High-energy interval training session.', '2026-04-08', '07:30:00', 45, 'beginner', 'HIIT', 16, 2),
('Power Strength', 'Full-body strength fundamentals.', '2026-04-08', '18:00:00', 60, 'intermediate', 'Strength', 12, 1);
