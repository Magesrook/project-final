CREATE DATABASE Notes;

USE Notes;

CREATE TABLE Users
(
User_KEY int(11) PRIMARY KEY,
User_Name varchar(24),
LastName varchar(50),
FirstName varchar(50),
Email varchar(255),
Uuid varchar(255),
Permission int(5)
);