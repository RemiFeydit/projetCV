INSERT INTO Admin (firstName, lastName, birthDate, mail, telephoneNumber, address, postalcode, city, gitLink, linkedinLink, picture)
VALUES ('Rémi', 'FEYDIT', '10/08/1998', 'feyditremi@gmail.com', '0678480591', '11 rue Henri Expert appt 20', 33300, 'Bordeaux', 'https://github.com/RemiFeydit', 'https://www.linkedin.com/in/r%C3%A9mi-feydit-750936165/', './images/photo.jpg');

INSERT INTO Education (startDate, endDate, schoolName, degree, idAdmin)
VALUES ('2009', '2012', 'Collège Cheverus', 'Brevet des collèges', 1);

INSERT INTO Skills(skillName, level, idAdmin)
VALUES ('SQL', 85, 1);
INSERT INTO Skills(skillName, level, idAdmin)
VALUES ('Python', 75, 1);
INSERT INTO Skills(skillName, level, idAdmin)
VALUES ('HTML/CSS', 40, 1);
INSERT INTO Skills(skillName, level, idAdmin)
VALUES ('Javascript', 70, 1);
INSERT INTO Skills(skillName, level, idAdmin)
VALUES ('Programmation C', 50, 1);

INSERT INTO ProfessionalExperience(compagnyName, startDate, endDate, jobName, idAdmin)
VALUES('La Poste', 'Mi-Juillet', 'Mi-Août', 'Facteur à vélo', 1);