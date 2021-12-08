DROP DATABASE watersystem;

CREATE DATABASE watersystem;
	use watersystem;

CREATE TABLE roles (
  id int PRIMARY KEY AUTO_INCREMENT,
  name varchar(20),
  UNIQUE(name)
);
INSERT INTO roles VALUES(1, 'Administrador'), (2, 'Supervisor'), (3, 'Lecturador');


CREATE TABLE users (
  id INT PRIMARY KEY AUTO_INCREMENT,
  names VARCHAR(50),
  firstname VARCHAR(50),
  lastname VARCHAR(50),
  username VARCHAR(50),
  password VARCHAR(100),
  id_roles int,
  image VARCHAR(50),
  status INT,
  UNIQUE(username),
  FOREIGN KEY (id_roles) REFERENCES roles (id)
);
INSERT INTO users VALUES (1, 'Alex', 'Garcia', '', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, '619c40e76a6321522772760-5ac29cadeca5b.jpg', 1);


CREATE TABLE affiliates (
  id INT PRIMARY KEY AUTO_INCREMENT,
  ci VARCHAR(10),
  names VARCHAR(50),
  firstname VARCHAR(50),
  lastname VARCHAR(50),
  address VARCHAR(50),
  appletree INT(11),
  lote INT(11),
  phone INT(11),
  status INT
);

CREATE TABLE meters (
  id INT PRIMARY KEY AUTO_INCREMENT,
  meter INT,
  id_affiliate INT,
  p_reading INT,
  currentdate DATE,
  state VARCHAR(100),
  status INT,
  FOREIGN KEY (id_affiliate) REFERENCES affiliates (id)
);

CREATE TABLE prices (
  id int PRIMARY KEY AUTO_INCREMENT,
  price float
);
INSERT INTO prices VALUES(1, 3.07);

CREATE TABLE reading (
  id INT PRIMARY KEY AUTO_INCREMENT,
  id_meter INT,
  previousreading INT,
  currentreading INT,
  previousdate  DATE,
  currentdate DATE,
  observation VARCHAR(100),
  FOREIGN KEY (id_meter) REFERENCES meters (id)
);

CREATE TABLE details (
  id INT PRIMARY KEY AUTO_INCREMENT,
  id_meter INT,
  previousreading INT,
  currentreading INT,
  period VARCHAR(20),
  previousdate DATE, 
  currentdate DATE,
  dateofissue DATE,
  id_affiliate INT,
  amount FLOAT,
  notify INT,
  missingmeeting INT,
  pendingdetails INT,
  reconnection INT,
  other INT,
  total FLOAT,
  status INT,
  FOREIGN KEY (id_affiliate) REFERENCES affiliates (id),
  FOREIGN KEY (id_meter) REFERENCES meters (id)
);



