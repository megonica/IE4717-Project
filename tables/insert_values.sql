use dental;

insert into patient values 
(1, 'somename@gmail.com', 'somename', 'somepassword'),
(2, 'somename2@gmail.com', 'somename2', 'somepassword2');

insert into dentist values 
(1, 'https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80','Dr. David Singh', 'Senior Associate Dental Surgeon', 'Wisdom tooth surgery', '(10 years Experience) You may need a wisdom teeth surgery if you experience red or swollen gums or bleeding gums, swelling around the jaw, bad breath, an unpleasant taste in your mouth.'),
(2, 'https://images.unsplash.com/photo-1588776813677-77aaf5595b83?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1887&q=80','Dr. Matthew Lim', 'Senior Associate Dental Surgeon', 'Wisdom tooth surgery', '(5 years Experience) You may need a wisdom teeth surgery if you experience red or swollen gums or bleeding gums, swelling around the jaw, bad breath, an unpleasant taste in your mouth.'),
(3, 'https://images.unsplash.com/photo-1559839734-2b71ea197ec2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80','Dr. Kathy Tan', 'Senior Associate Dental Surgeon', 'Dental implant surgery', '(5 years Experience) A dental implant refers to a titanium screw or fixture placed where the lost tooth was. After several months of allowing the implant to fuse or integrate with the surrounding bone, the implant becomes “one with” your bone.'),
(4, 'https://images.pexels.com/photos/3779697/pexels-photo-3779697.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2','Dr. Mohammad Rifqi', 'Senior Associate Dental Surgeon', 'Ceramic crowns & bridges', '(5 years Experience) A crown is used to protect a tooth that has been weakened by cracks or decay. Crowns can protect your teeth from further wear and cracks which may lead to extraction of the tooth.'),
(5, 'https://images.pexels.com/photos/6529117/pexels-photo-6529117.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2','Dr. Cindy Maxwell', 'Oral Health Therapist', 'Hygienist (periodontal treatment)', '(7 years Experience) A periodontist is a dental specialist skilled in the prevention, diagnosis and treatment of gum disease and the supporting structures of teeth.'),
(6, 'https://images.pexels.com/photos/4687360/pexels-photo-4687360.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2','Dr. Jenny Koh', 'Orthodontics Specialist', 'Teeth straightening', '(2 years Experience) The Smile braces is a self-ligating braces that uses a special type of bracket which functions like a sliding door and the archwire is allowed to move freely, compared to traditional braces where the wire is tightly held in place.');

insert into date values 
(1, 1, '2022-11-20'),
(2, 1, '2022-11-23'),
(3, 2, '2022-10-20');

insert into time values 
(1, 1, '10:30:00'),
(2, 1, '16:00:00'),
(3, 2, '12:00:00'),
(4, 3, '17:00:00');

insert into appointment values 
(1, 1, 1, 1, 1),
(2, 2, 2, 3, 4);