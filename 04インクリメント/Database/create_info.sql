INSERT INTO `users`(`mail`, `password`, `name`) 
            VALUES  ('mail1@mail.com','password1','user1'),
                    ('mail2@mail.com','password2','user2'),
                    ('mail3@mail.com','password3','user3');

INSERT INTO `regions`(`region_id`, `name`) 
        VALUES  ('1','北海道'),('2','東北'),('3','関東'),
                ('4','中部'),('5','近畿'),('6','中国'),
                ('7','四国'),('8','九州'),('9','海外');

INSERT INTO `posts`(`title`, `region_id`, `place`, `link_path`, `text`)
        VALUES  ('','1','札幌','','私の'),
                ('','2','青森','',''),
                ('','3','横浜','',''),
                ('','4','名古屋','',''),
                ('','5','京都','','');