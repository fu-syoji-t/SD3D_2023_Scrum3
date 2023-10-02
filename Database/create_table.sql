CREATE TABLE profile_images
(image_id INT AUTO_INCREMENT,
 path VARCHAR(400) NOT NULL,
 PRIMARY KEY(image_id)
);

CREATE TABLE profile_sentences
(sentence_id INT AUTO_INCREMENT,
 sentence TEXT NOT NULL,
 PRIMARY KEY(sentence_id)
);

CREATE TABLE users
(user_id INT AUTO_INCREMENT,
 mail VARCHAR(128) NOT NULL,
 password VARCHAR(128) NOT NULL,
 name VARCHAR(128) NOT NULL,
 PRIMARY KEY(user_id)
);

CREATE TABLE regions
(region_id INT NOT NULL,
 name VARCHAR(128) NOT NULL,
 PRIMARY KEY(region_id)
);

CREATE TABLE posts
(post_id INT AUTO_INCREMENT,
 user_id INT NOT NULL,
 title VARCHAR(128) NOT NULL,
 region_id INT NOT NULL,
 place VARCHAR(128) NOT NULL,
 link_path VARCHAR(800),
 text TEXT,
 date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
 PRIMARY KEY(post_id)
);

CREATE TABLE post_images
(image_id INT AUTO_INCREMENT,
 post_id INT NOT NULL,
 image_order INT NOT NULL,
 path VARCHAR(400) NOT NULL,
 PRIMARY KEY(image_id),
 FOREIGN KEY (post_id)
	REFERENCES posts(post_id)
);

CREATE TABLE post_sentences
(sentence_id INT AUTO_INCREMENT,
 post_id INT NOT NULL,
 sentence_order INT NOT NULL,
 sentence TEXT NOT NULL,
 PRIMARY KEY(sentence_id),
 FOREIGN KEY (post_id)
	REFERENCES posts(post_id)
);

CREATE TABLE keep_posts
(keep_id INT AUTO_INCREMENT,
 user_id INT NOT NULL,
 post_id INT NOT NULL,
 PRIMARY KEY(keep_id),
 FOREIGN KEY (user_id)
	REFERENCES users(user_id),
 FOREIGN KEY (post_id)
	REFERENCES posts(post_id)
);