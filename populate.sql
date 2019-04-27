USE r69420;

SET SQL_SAFE_UPDATES = 0;

DELETE FROM `role`;
ALTER TABLE `role` AUTO_INCREMENT = 1;
INSERT INTO `role` (`role_name`) VALUES ('admin');
INSERT INTO `role` (`role_name`) VALUES ('guest');
INSERT INTO `role` (`role_name`) VALUES ('director');
INSERT INTO `role` (`role_name`) VALUES ('manager');
INSERT INTO `role` (`role_name`) VALUES ('student');

DELETE FROM `faculty`;
ALTER TABLE `faculty` AUTO_INCREMENT = 1;
INSERT INTO `faculty` (`faculty_name`) VALUES ('computing');
INSERT INTO `faculty` (`faculty_name`) VALUES ('business');
INSERT INTO `faculty` (`faculty_name`) VALUES ('design');

DELETE FROM `submission`;
DELETE FROM `user`;
ALTER TABLE `user` AUTO_INCREMENT = 1;
INSERT INTO `user` (role_id, faculty_id, username, password) VALUES (1, 1, 'admin@m.com', MD5('admin'));
INSERT INTO `user` (role_id, faculty_id, username, password) VALUES (3, 1, 'mng1@m.com', MD5('mng1'));
INSERT INTO `user` (role_id, faculty_id, username, password) VALUES (3, 2, 'mng2@m.com', MD5('mng2'));
INSERT INTO `user` (role_id, faculty_id, username, password) VALUES (3, 3, 'mng3@m.com', MD5('mng3'));
INSERT INTO `user` (role_id, faculty_id, username, password) VALUES (4, 1, 'drt@m.com', MD5('drt'));
INSERT INTO `user` (role_id, faculty_id, username, password) VALUES (2, 1, 'guest1@m.com', MD5('guest1'));
INSERT INTO `user` (role_id, faculty_id, username, password) VALUES (2, 2, 'guest2@m.com', MD5('guest2'));
INSERT INTO `user` (role_id, faculty_id, username, password) VALUES (2, 3, 'guest3@m.com', MD5('guest3'));
INSERT INTO `user` (role_id, faculty_id, username, password) VALUES (5, 1, 'std1@m.com', MD5('std1'));
INSERT INTO `user` (role_id, faculty_id, username, password) VALUES (5, 2, 'std2@m.com', MD5('std2'));
INSERT INTO `user` (role_id, faculty_id, username, password) VALUES (5, 3, 'std3@m.com', MD5('std3'));

DELETE FROM `closure`;
ALTER TABLE `closure` AUTO_INCREMENT = 1;
INSERT INTO `closure` (`academic_year`, `closure_date`) VALUES ('2017', '2017-11-11');
INSERT INTO `closure` (`academic_year`, `closure_date`) VALUES ('2018', '2018-11-11');
INSERT INTO `closure` (`academic_year`, `closure_date`) VALUES ('2019', '2019-11-11');
