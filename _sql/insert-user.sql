INSERT INTO `roles` (`id`, `name`, `description`)
VALUES
	(1,'login','Login privileges, granted after account confirmation'),
	(2,'admin','Administrative user, has access to everything.'),
	(3,'editor','Editor has right to edit and update. Not to create or delete.'),
	(4,'developer','Developer has all access even above admin.');

INSERT INTO `users` (`id`, `f1_id`, `first_name`, `last_name`, `email`, `username`, `password`, `logins`, `last_login`, `image`)
VALUES
	(1,NULL,'Isaac','Castillo','icastillo@cbcmail.org','icemancast','b7b21e48597cd6f3ac98d3d5de1524893035677f9ea2aae5be87b787c589e884',9,1311195283,NULL);

INSERT INTO `roles_users` (`user_id`, `role_id`)
VALUES
	(1,1),
	(1,2),
	(1,3),
	(1,4);