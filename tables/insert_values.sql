use dental;

insert into patient values 
(1, 'somename@gmail.com', 'somename', 'somepassword'),
(2, 'somename2@gmail.com', 'somename2', 'somepassword2');

insert into dentist values 
(1, 'dentist1', 'director', 'cosmetic surgery'),
(2, 'dentist2', 'senior', 'cavity cleaning');

insert into date values 
(1, 1, '2022-10-20'),
(2, 1, '2022-10-23'),
(3, 2, '2022-10-20');

insert into time values 
(1, 1, '10:30:00'),
(2, 1, '16:00:00'),
(3, 2, '12:00:00'),
(4, 3, '17:00:00');

insert into appointment values 
(1, 1, 1, 1, 1),
(2, 1, 2, 3, 4),
(3, 2, 1, 1, 2);