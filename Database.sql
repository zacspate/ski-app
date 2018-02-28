CREATE TABLE Employee
(
  First_Name INT NOT NULL,
  Last_Name INT NOT NULL,
  EmployeeID INT NOT NULL,
  PRIMARY KEY (EmployeeID)
);

CREATE TABLE Racer
(
  Bib_Number INT NOT NULL,
  Run_1_time INT NOT NULL,
  Run_2_Time INT NOT NULL,
  Level INT NOT NULL,
  Race INT NOT NULL,
  EmployeeID INT NOT NULL,
  PRIMARY KEY (Bib_Number),
  FOREIGN KEY (EmployeeID) REFERENCES Employee(EmployeeID)
);