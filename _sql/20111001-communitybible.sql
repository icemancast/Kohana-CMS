/* SQLEditor (MySQL (2))*/

CREATE TABLE sessions
(
session_id VARCHAR(24) NOT NULL,
last_active INTEGER(11) UNSIGNED NOT NULL,
contents TEXT NOT NULL,
PRIMARY KEY (session_id)
) ENGINE=InnoDB CHARACTER SET=utf8;

CREATE TABLE roles
(
id INTEGER(11) UNSIGNED NOT NULL AUTO_INCREMENT,
name VARCHAR(255) NOT NULL UNIQUE,
description TEXT,
PRIMARY KEY (id)
) ENGINE=InnoDB CHARACTER SET=utf8;

CREATE TABLE users
(
id INTEGER(11) UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE,
f1_id INTEGER(11) UNSIGNED,
first_name VARCHAR(127),
last_name VARCHAR(127),
email VARCHAR(127) NOT NULL UNIQUE,
username VARCHAR(127) UNIQUE,
password VARCHAR(64) NOT NULL,
logins INTEGER(11) UNSIGNED NOT NULL DEFAULT 0,
last_login INTEGER(11) UNSIGNED,
image VARCHAR(255),
PRIMARY KEY (id)
) ENGINE=InnoDB CHARACTER SET=utf8;

CREATE TABLE roles_users
(
user_id INTEGER(11) UNSIGNED NOT NULL,
role_id INTEGER(11) UNSIGNED NOT NULL,
PRIMARY KEY (user_id,role_id)
) ENGINE=InnoDB CHARACTER SET=utf8;

CREATE TABLE tags
(
id INTEGER(11) UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE,
user_id INTEGER(11) UNSIGNED,
tag VARCHAR(255) UNIQUE,
date_created INTEGER(11) UNSIGNED,
date_modified INTEGER(11) UNSIGNED,
PRIMARY KEY (id)
) CHARACTER SET=utf8;

CREATE TABLE speakers
(
id INTEGER(11) UNSIGNED NOT NULL AUTO_INCREMENT,
user_id INTEGER(11) UNSIGNED,
console_id INTEGER(11) UNSIGNED,
name VARCHAR(255),
title VARCHAR(100),
slug VARCHAR(100),
date_created INTEGER(11) UNSIGNED,
date_modified INTEGER(11) UNSIGNED,
PRIMARY KEY (id)
) ENGINE=InnoDB CHARACTER SET=utf8;

CREATE TABLE podcasts
(
id INTEGER(11) UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE,
user_id INTEGER(11) UNSIGNED,
speaker_id INTEGER(11) UNSIGNED,
podcast_title VARCHAR(255),
podcast_author VARCHAR(255),
link VARCHAR(255),
description TEXT,
subtitle VARCHAR(255),
summary TEXT,
owner_name VARCHAR(255),
owner_email VARCHAR(255),
image VARCHAR(255),
image_title VARCHAR(255),
image_link VARCHAR(255),
image_width INTEGER(5) UNSIGNED DEFAULT 144,
image_height INTEGER(5) UNSIGNED DEFAULT 144,
image_itunes VARCHAR(255),
category VARCHAR(255),
category_itunes VARCHAR(255),
subcategory_itunes VARCHAR(255),
keywords VARCHAR(255),
date_created INTEGER(11) UNSIGNED,
date_modified INTEGER(11) UNSIGNED,
PRIMARY KEY (id)
) ENGINE=InnoDB CHARACTER SET=utf8;

CREATE TABLE sermons
(
id INTEGER(11) UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE,
user_id INTEGER(11) UNSIGNED,
lightcast_id INTEGER(11) UNSIGNED,
podcast_id INTEGER(11) UNSIGNED,
speaker_id INTEGER(11) UNSIGNED,
sermon_title VARCHAR(255),
description TEXT,
file_size VARCHAR(255),
duration VARCHAR(255),
cupertino INTEGER(2) UNSIGNED DEFAULT 0,
lightcast_location VARCHAR(255),
lightcast_code VARCHAR(255),
mp3_file VARCHAR(255),
keywords VARCHAR(255),
status ENUM('inactive','active') DEFAULT 'active',
date_sermon INTEGER(11) UNSIGNED,
date_created INTEGER(11) UNSIGNED,
date_modified INTEGER(11) UNSIGNED,
PRIMARY KEY (id)
) ENGINE=InnoDB CHARACTER SET=utf8;

CREATE TABLE user_tokens
(
id INTEGER(11) UNSIGNED NOT NULL AUTO_INCREMENT,
user_id INTEGER(11) UNSIGNED NOT NULL,
user_agent VARCHAR(40) NOT NULL,
token VARCHAR(40) NOT NULL UNIQUE,
type INTEGER(100) NOT NULL,
created INTEGER(10) UNSIGNED NOT NULL,
expires INTEGER(10) UNSIGNED NOT NULL,
PRIMARY KEY (id)
) ENGINE=InnoDB CHARACTER SET=utf8;

CREATE TABLE events
(
id INTEGER(11) UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE,
user_id INTEGER(11) UNSIGNED,
event_title VARCHAR(255),
event_image VARCHAR(255),
event_who VARCHAR(255),
event_what TEXT,
event_date INTEGER(11) UNSIGNED,
event_end INTEGER(11) UNSIGNED,
event_where VARCHAR(255),
event_cost DECIMAL(10,2),
registration_url VARCHAR(255) DEFAULT '0',
tags TEXT,
slug VARCHAR(255) UNIQUE,
status ENUM('inactive','active') DEFAULT 'inactive',
date_published INTEGER(11) UNSIGNED,
date_expired INTEGER(11) UNSIGNED DEFAULT 0,
date_created INTEGER(11) UNSIGNED,
date_modified INTEGER(11) UNSIGNED,
PRIMARY KEY (id)
) ENGINE=InnoDB CHARACTER SET=utf8;

CREATE TABLE navs
(
id INTEGER(11) UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE,
user_id INTEGER(11) UNSIGNED,
nav_title VARCHAR(255),
date_created INTEGER(11) UNSIGNED,
date_modified INTEGER(11) UNSIGNED,
PRIMARY KEY (id)
) ENGINE=InnoDB CHARACTER SET=utf8;

CREATE TABLE pages
(
id INTEGER(11) UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE,
user_id INTEGER(11) UNSIGNED,
parent_id INTEGER(11) UNSIGNED,
nav_id INTEGER(11) UNSIGNED,
head_code VARCHAR(255),
description TEXT,
slug VARCHAR(255) UNIQUE,
browser_title VARCHAR(255),
page_title VARCHAR(255),
status ENUM('draft','published','pending','archive') DEFAULT 'draft',
date_published INTEGER(11) UNSIGNED,
date_expired INTEGER(11) UNSIGNED DEFAULT 0,
date_created INTEGER(11) UNSIGNED,
date_modified INTEGER(11) UNSIGNED,
PRIMARY KEY (id)
) ENGINE=InnoDB CHARACTER SET=utf8;

CREATE TABLE contents
(
id INTEGER(11) UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE,
user_id INTEGER(11) UNSIGNED,
page_id INTEGER(11) UNSIGNED,
content_title VARCHAR(255),
content LONGTEXT,
status ENUM('draft','published','pending','archive') DEFAULT 'draft',
sort INTEGER(5) UNSIGNED DEFAULT 0,
date_published INTEGER(11) UNSIGNED,
date_expired INTEGER(11) UNSIGNED DEFAULT 0,
date_created INTEGER(11) UNSIGNED,
date_modified INTEGER(11) UNSIGNED,
PRIMARY KEY (id)
) ENGINE=InnoDB CHARACTER SET=utf8;

CREATE TABLE images
(
id INTEGER(11) UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE,
user_id INTEGER(11) UNSIGNED,
page_id INTEGER(11) UNSIGNED,
image_title VARCHAR(255),
url VARCHAR(255),
file VARCHAR(255),
type ENUM('banner','header'),
status ENUM('inactive','active'),
sort INTEGER(5) UNSIGNED,
date_published INTEGER(11) UNSIGNED,
date_expired INTEGER(11) UNSIGNED DEFAULT 0,
date_created INTEGER(11) UNSIGNED,
date_modified INTEGER(11) UNSIGNED,
PRIMARY KEY (id)
) ENGINE=InnoDB CHARACTER SET=utf8;

CREATE TABLE urls
(
id INTEGER(11) UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE,
user_id INTEGER(11) UNSIGNED,
nav_id INTEGER(11) UNSIGNED,
url_title VARCHAR(255),
url VARCHAR(255),
status ENUM('inactive','active'),
sort INTEGER(5) UNSIGNED,
date_published INTEGER(11) UNSIGNED,
date_expired INTEGER(11) UNSIGNED DEFAULT 0,
date_created INTEGER(11) UNSIGNED,
date_modified INTEGER(11) UNSIGNED,
PRIMARY KEY (id)
) ENGINE=InnoDB CHARACTER SET=utf8;

CREATE TABLE events_tags
(
tag_id INTEGER(11) UNSIGNED NOT NULL,
event_id INTEGER(11) UNSIGNED NOT NULL,
PRIMARY KEY (tag_id,event_id)
) CHARACTER SET=utf8;

CREATE INDEX last_active_idx ON sessions(last_active);
ALTER TABLE roles_users ADD FOREIGN KEY user_id_idxfk (user_id) REFERENCES users (id) ON DELETE CASCADE;

ALTER TABLE roles_users ADD FOREIGN KEY role_id_idxfk (role_id) REFERENCES roles (id) ON DELETE CASCADE;

ALTER TABLE tags ADD FOREIGN KEY user_id_idxfk_1 (user_id) REFERENCES users (id);

ALTER TABLE speakers ADD FOREIGN KEY user_id_idxfk_2 (user_id) REFERENCES users (id);

ALTER TABLE podcasts ADD FOREIGN KEY user_id_idxfk_3 (user_id) REFERENCES users (id);

ALTER TABLE podcasts ADD FOREIGN KEY speaker_id_idxfk (speaker_id) REFERENCES speakers (id);

ALTER TABLE sermons ADD FOREIGN KEY user_id_idxfk_4 (user_id) REFERENCES users (id);

ALTER TABLE sermons ADD FOREIGN KEY `sermons_ibfk_1` (podcast_id) REFERENCES podcasts (id);

ALTER TABLE sermons ADD FOREIGN KEY `sermons_ibfk_2` (speaker_id) REFERENCES speakers (id);

ALTER TABLE user_tokens ADD FOREIGN KEY user_id_idxfk_5 (user_id) REFERENCES users (id);

ALTER TABLE events ADD FOREIGN KEY user_id_idxfk_6 (user_id) REFERENCES users (id);

ALTER TABLE navs ADD FOREIGN KEY user_id_idxfk_7 (user_id) REFERENCES users (id);

ALTER TABLE pages ADD FOREIGN KEY user_id_idxfk_8 (user_id) REFERENCES users (id);

ALTER TABLE pages ADD FOREIGN KEY nav_id_idxfk (nav_id) REFERENCES navs (id);

ALTER TABLE contents ADD FOREIGN KEY page_id_idxfk (page_id) REFERENCES pages (id);

ALTER TABLE images ADD FOREIGN KEY user_id_idxfk_9 (user_id) REFERENCES users (id);

ALTER TABLE images ADD FOREIGN KEY page_id_idxfk_1 (page_id) REFERENCES pages (id);

ALTER TABLE urls ADD FOREIGN KEY user_id_idxfk_10 (user_id) REFERENCES users (id);

ALTER TABLE urls ADD FOREIGN KEY nav_id_idxfk_1 (nav_id) REFERENCES navs (id);

ALTER TABLE events_tags ADD FOREIGN KEY tag_id_idxfk (tag_id) REFERENCES tags (id);

ALTER TABLE events_tags ADD FOREIGN KEY event_id_idxfk (event_id) REFERENCES events (id);
