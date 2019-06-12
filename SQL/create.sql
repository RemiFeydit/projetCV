CREATE TABLE Admin
(
id INT NOT NULL AUTO_INCREMENT,
firstName VARCHAR(10),
lastName VARCHAR(10),
birthDate VARCHAR(10),
mail VARCHAR(20),
telephoneNumber VARCHAR(10),
address VARCHAR(50),
postalCode INT,
city VARCHAR(15),
gitLink VARCHAR(50),
linkedinLink VARCHAR(75),
picture VARCHAR(50),
PRIMARY KEY (id)
);

CREATE TABLE Education
(
id INT NOT NULL AUTO_INCREMENT,
startDate VARCHAR(30),
endDate VARCHAR(30),
schoolName VARCHAR(20),
degree VARCHAR(20),
idAdmin INT,
PRIMARY KEY (id),
FOREIGN KEY (idAdmin) REFERENCES Admin(id)
);

CREATE TABLE Skills
(
id INT NOT NULL AUTO_INCREMENT,
skillName VARCHAR(20),
level INT,
idAdmin INT,
PRIMARY KEY (id),
FOREIGN KEY (idAdmin) REFERENCES Admin(id)
);

CREATE TABLE ProfessionalExperience
(
id INT NOT NULL AUTO_INCREMENT,
compagnyName VARCHAR(20),
startDate VARCHAR(20),
endDate VARCHAR(20),
jobName VARCHAR(20),
idAdmin INT,
PRIMARY KEY (id),
FOREIGN KEY (idAdmin) REFERENCES Admin(id)
);

CREATE TABLE Contact
(
id INT NOT NULL AUTO_INCREMENT,
last_name VARCHAR(20),
first_name VARCHAR(20),
mail VARCHAR(50),
sendingDate VARCHAR(20),
object VARCHAR(50),
idAdmin INT,
PRIMARY KEY (id),
FOREIGN KEY (idAdmin) REFERENCES Admin(id)
);

CREATE TABLE UserCV
(
id INT NOT NULL AUTO_INCREMENT,
name VARCHAR(20),
password VARCHAR(20),
PRIMARY KEY (id)
);