/*CREATE TABLE employee
(
  firstName varchar NOT NULL,
  lastName varchar NOT NULL,
  employeeID INT NOT NULL,
  PRIMARY KEY (employeeID)
);
*/
CREATE TABLE Racer
(
  racerid INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  bibNumber INT,
  run1time VARCHAR(15),
  run2Time VARCHAR(15),
  level VARCHAR(15),
  race VARCHAR(15)
);
