use dental;

create table patient (

patientid int unsigned not null auto_increment primary key,
email char(50) not null unique,
username char(50) not null unique,
password char(100) not null

);

create table dentist (

dentistid int unsigned not null auto_increment primary key,
profile char(100) not null,
name char(50) not null, 
position char(50) not null, 
specialisation char(50) not null,
details char(255) not null

);

create table date (

dateid int unsigned not null auto_increment primary key,
dentistid int unsigned not null,
date_available date,
unique(dentistid, date_available)

);

create table time(

timeid int unsigned not null auto_increment primary key,
dateid int unsigned not null,
time_available time,
unique(dateid, time_available)

);

create table appointment (

appointmentid int unsigned not null auto_increment primary key, 
patientid int unsigned not null, 
dentistid int unsigned not null, 
dateid int unsigned not null, 
timeid int unsigned not null unique

);
