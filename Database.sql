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
  bibNumber INT NOT NULL,
  run1time float NOT NULL,
  run2Time float NOT NULL,
  level varchar NOT NULL,
  race varchar NOT NULL,
  /*employeeID INT NOT NULL,*/
  PRIMARY KEY (bibNumber),
  /*FOREIGN KEY (employeeID) REFERENCES employee(employeeID)*/
);
