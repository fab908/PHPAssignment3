CREATE DATABASE assignment3;
USE assignment3;
CREATE TABLE accounts(
  id int(11) NOT NULL AUTO_INCREMENT,
  fname varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  lname varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  email varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  bio varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
