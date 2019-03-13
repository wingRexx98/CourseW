INSERT INTO `r69420`.`role` (`role_name`) VALUES ('admin');
INSERT INTO `r69420`.`role` (`role_name`) VALUES ('guest');
INSERT INTO `r69420`.`role` (`role_name`) VALUES ('director');
INSERT INTO `r69420`.`role` (`role_name`) VALUES ('manager');
INSERT INTO `r69420`.`role` (`role_name`) VALUES ('student');

INSERT INTO `r69420`.`faculty` (`faculty_name`) VALUES ('computing');
INSERT INTO `r69420`.`faculty` (`faculty_name`) VALUES ('business');
INSERT INTO `r69420`.`faculty` (`faculty_name`) VALUES ('design');

INSERT INTO `r69420`.`user` (`role_id`, `faculty_id`, `username`, `password`) VALUES ('1', '1', 'admin@m.com', 'admin');
INSERT INTO `r69420`.`user` (`role_id`, `faculty_id`, `username`, `password`) VALUES ('4', '1', 'mng1@m.com', 'mng1');
INSERT INTO `r69420`.`user` (`role_id`, `faculty_id`, `username`, `password`) VALUES ('4', '2', 'mng2@m.com', 'mgn2');
INSERT INTO `r69420`.`user` (`role_id`, `faculty_id`, `username`, `password`) VALUES ('4', '3', 'mgn3@m.com', 'mgn3');
INSERT INTO `r69420`.`user` (`role_id`, `faculty_id`, `username`, `password`) VALUES ('3', '1', 'drt@m.com', 'drt');
INSERT INTO `r69420`.`user` (`role_id`, `faculty_id`, `username`, `password`) VALUES ('2', '1', 'guest1@m.com', 'guest1');
INSERT INTO `r69420`.`user` (`role_id`, `faculty_id`, `username`, `password`) VALUES ('2', '2', 'guest2@m.com', 'guest2');
INSERT INTO `r69420`.`user` (`role_id`, `faculty_id`, `username`, `password`) VALUES ('2', '3', 'guest3@m.com', 'guest3');
INSERT INTO `r69420`.`user` (`role_id`, `faculty_id`, `username`, `password`) VALUES ('5', '1', 'std1@m.com', 'std1');
INSERT INTO `r69420`.`user` (`role_id`, `faculty_id`, `username`, `password`) VALUES ('5', '2', 'std2@m.com', 'std2');
INSERT INTO `r69420`.`user` (`role_id`, `faculty_id`, `username`, `password`) VALUES ('5', '3', 'std3@m.com', 'std3');

INSERT INTO `r69420`.`closure` (`academic_year`, `closure_date`) VALUES ('2017', '2017-11-11');
INSERT INTO `r69420`.`closure` (`academic_year`, `closure_date`) VALUES ('2018', '2018-11-11');
INSERT INTO `r69420`.`closure` (`academic_year`, `closure_date`) VALUES ('2019', '2019-11-11');
