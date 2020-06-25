#create database
Create database if not exists my_first_database;

#select database
use my_first_database;

#creating a film table
#firstly create the nonrelational tables
create table if not exists films(
_id_film int not null,
_title varchar(45) not null,
_year date,
_nacionality varchar(20),
_leaguage varchar(120),
_format enum('black and white','color'),
_description varchar(120),
_summary varchar(225),
_comments varchar(225),
primary key (_id_film)
) engine = innodb;