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
  racerid AutoNumber Not NULL,
  bibNumber Integer NOT NULL,
  run1time FLOAT NOT NULL,
  run2Time FLOAT NULL,
  level VARCHAR NOT NULL,
  race VARCHAR NOT NULL,
  /*employeeID INT NOT NULL,*/
  PRIMARY KEY (racerid),
  /*FOREIGN KEY (employeeID) REFERENCES employee(employeeID)*/
  
);
