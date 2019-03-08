DROP DATABASE [IF EXISTS] r69420;
CREATE DATABASE r69420;
USE r69420;

CREATE TABLE IF NOT EXISTS closure (
    closure_id INT AUTO_INCREMENT,
    academic_year INT NOT NULL,
    closure_date DATE,
    PRIMARY KEY (closure_id)
);

CREATE TABLE IF NOT EXISTS faculty (
    faculty_id INT AUTO_INCREMENT,
    faculty_name VARCHAR(255) NOT NULL,
    PRIMARY KEY (faculty_id)
);

CREATE TABLE IF NOT EXISTS role (
    role_id INT AUTO_INCREMENT,
    role_name VARCHAR(255) NOT NULL,
    PRIMARY KEY (role_id)
);

CREATE TABLE IF NOT EXISTS user (
    user_id INT AUTO_INCREMENT,
    role_id INT,
    faculty_id INT,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    PRIMARY KEY (user_id),
    FOREIGN KEY (role_id) REFERENCES role(role_id),
    FOREIGN KEY (faculty_id) REFERENCES faculty(faculty_id)
);

CREATE TABLE IF NOT EXISTS submission (
    submission_id INT AUTO_INCREMENT,
    user_id INT,
    submission_date DATE,
    word_url VARCHAR(255) NOT NULL,
    image_url VARCHAR(255) NOT NULL,
    publication TINYINT(1) DEFAULT 0,
    PRIMARY KEY (submission_id),
    FOREIGN KEY (user_id) REFERENCES user(user_id)
);


CREATE TABLE IF NOT EXISTS comment (
    comment_id INT AUTO_INCREMENT,
    submission_id INT,
    content TEXT,
    PRIMARY KEY (comment_id),
    FOREIGN KEY (submission_id) REFERENCES submission(submission_id)
);

INSERT INTO `r69420`.`faculty` (`faculty_name`) VALUES ('a');
INSERT INTO `r69420`.`role` (`role_name`) VALUES ('admin');
INSERT INTO `r69420`.`user` (`role_id`, `faculty_id`, `username`, `password`) VALUES ('1', '1', 'admin@m.com', 'admin');
