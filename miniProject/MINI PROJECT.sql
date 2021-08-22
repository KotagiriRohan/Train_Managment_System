DROP database if exists MMRS_Data;

create database if not exists MMRS_Data;

use MMRS_Data;

create table CUSTOMER
(Username varchar(20) primary key,
Fname varchar(10),
Lname varchar(10),
Address varchar(20),
Phone_No varchar(10),
Password varchar(16)
);
create table ADMIN
(Admin_Id int primary key AUTO_INCREMENT,
Admin_Name varchar(20),
Age int,
Sex char(1),
Email varchar(30),
Password varchar(16)
);

create table SMARTCARD
(Card_No varchar(10) primary key,
Balance decimal,
Card_Status varchar(15) NOT NULL DEFAULT 'Pending',
Username varchar(20),
Admin_Id int, 
foreign key(Username) references CUSTOMER(Username) on delete cascade,
foreign key(Admin_Id) references ADMIN(Admin_Id)
);

create table ROUTE
(Route_Id int primary key,
Route_Name varchar(200)
);

create table STATION
(Station_Name varchar(25),
Route_Id int,
primary key(Station_Name,Route_Id)
);

create table TRAIN
(Train_Id int primary key AUTO_INCREMENT,
Admin_Id int,
Route_Id int,
foreign key(Admin_Id) references ADMIN(Admin_Id),
foreign key(Route_Id) references ROUTE(Route_Id) on delete cascade
);

create table COMPLAINT
(Comp_Id int primary key AUTO_INCREMENT,
Comp_Subject varchar(50),
Comp_Desc varchar(500),
Comp_Status varchar(20) NOT NULL DEFAULT 'Not_Replied',
Username varchar(20),
foreign key(Username) references CUSTOMER(Username)
);
create table EMAIL
(Username varchar(200),
Email varchar(200),
primary key(Username,Email),
foreign key(Username) references CUSTOMER(Username) on delete cascade
);

create table DISPLAY_STATUS
(From_Station varchar(25),
To_Station varchar(25),
Arrival time,
Departure time,
Train_id int,
primary key(From_Station,To_Station,Train_Id),
foreign key(From_Station) references STATION(Station_Name) on delete cascade,
foreign key(To_Station) references STATION(Station_Name) 
);

GRANT ALL ON mmrs_data.* TO 'rohan'@'localhost' identified by 'password';
GRANT ALL on mmrs_data.* to 'rohan'@'127.0.0.1' identified by 'password';

INSERT INTO admin (Admin_Name,Age,Email,Password,Sex) VALUES ('rohan',19,'rohankotagiri@gmail.com','password','Male');
INSERT INTO route( Route_Id,Route_Name) VALUES (1,"route 1"),(2,"route 2"),(3,"route 3");
INSERT INTO `train`(`Train_Id`, `Admin_Id`, `Route_Id`) VALUES (123,1,1),(126,1,3),(103,1,2);
INSERT INTO `train`(`Train_Id`, `Admin_Id`, `Route_Id`) VALUES (12,1,1),(16,1,3),(10,1,2);
INSERT INTO `train`(`Admin_Id`, `Route_Id`) VALUES (1,1),(1,3),(1,2);
INSERT INTO `station`(`Station_Name`, `Route_Id`) VALUES ('JNTU','1'),('KPHB','1'),('miyapur','1'),('SR nagar','2'),('ameerpet','2'),('nampally','2'),('LB nagar','3'),('Balanagar','3'),('ESI','3');
INSERT INTO `display_status`(`From_Station`, `To_Station`, `Arrival`, `Departure`, `Train_id`)
VALUES ('JNTU','KPHB','10:00:00','12:00:00',1),('KPHB','miyapur','14:00:00','16:00:00',12),
('miyapur','JNTU','18:00:00','20:00:00',123),
('SR nagar','ameerpet','10:00:00','12:00:00',3),('ameerpet','nampally','14:00:00','16:00:00',10),
('nampally','SR nagar','18:00:00','20:00:00',103),
('LB nagar','Balanagar','10:00:00','12:00:00',2),('Balanagar','ESI','14:00:00','16:00:00',16),
('ESI','LB nagar','18:00:00','20:00:00',126);

CREATE TABLE booking(
    train_id int,
    username varchar(20),
    booking_status varchar(20)
    );