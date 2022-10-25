use dental;

insert into patient values 
(1, 'somename@gmail.com', 'somename', 'somepassword'),
(2, 'somename2@gmail.com', 'somename2', 'somepassword2');

insert into dentist values 
(1, 'https://images.unsplash.com/photo-1588776813677-77aaf5595b83?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1887&q=80','dentist1', 'director', 'cosmetic surgery'),
(2, 'https://images.unsplash.com/photo-1559839734-2b71ea197ec2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80','dentist2', 'senior', 'cavity cleaning');

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