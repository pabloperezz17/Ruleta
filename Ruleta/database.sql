CREATE DATABASE ruleta;

USE ruleta;

CREATE TABLE usuarios(
id INT AUTO_INCREMENT PRIMARY KEY,
usuario VARCHAR(50),
password VARCHAR(255),
saldo INT DEFAULT 1000
);

CREATE TABLE historial(
id INT AUTO_INCREMENT PRIMARY KEY,
numero INT,
color VARCHAR(10),
fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO usuarios(usuario,password,saldo)
VALUES('admin', MD5('1234'), 1000);