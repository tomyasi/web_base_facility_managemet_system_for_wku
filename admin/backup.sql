DROP TABLE eaccount;

CREATE TABLE `eaccount` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `lastlogin` datetime NOT NULL,
  `role` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `emp_id` (`emp_id`),
  CONSTRAINT `eaccount_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=191 DEFAULT CHARSET=utf8mb4;

INSERT INTO eaccount VALUES("145","113","manager","321","1","2022-06-15 09:26:23","manager");
INSERT INTO eaccount VALUES("146","114","admin","admin","1","2022-06-15 08:58:15","admin");
INSERT INTO eaccount VALUES("147","115","security","security","1","2022-06-12 22:02:58","security");
INSERT INTO eaccount VALUES("148","116","technician","technician","1","2022-05-29 10:19:16","technician");
INSERT INTO eaccount VALUES("183","116","stor","stor","1","2022-06-13 13:11:22","storekpeer");
INSERT INTO eaccount VALUES("184","120","leder","f9025508216a1db7044e63a02f3d32d9","1","2022-05-29 10:19:16","manager");
INSERT INTO eaccount VALUES("185","123","RegarfHghshsgyt","202cb962ac59075b964b07152d234b70","0","2022-05-29 10:19:16","admin");
INSERT INTO eaccount VALUES("186","124","RegarfHghshsgyt","c8ffe9a587b126f152ed3d89a146b445","1","2022-05-29 10:19:16","clealiness");
INSERT INTO eaccount VALUES("187","116","leder","leder","1","2022-06-14 14:07:14","leder");
INSERT INTO eaccount VALUES("188","125","RegarfHghshsgyt","3def184ad8f4755ff269862ea77393dd","1","2022-06-10 12:08:48","manger");
INSERT INTO eaccount VALUES("189","126","RegarfHghshsgyt","069059b7ef840f0c74a814ec9237b6ec","1","2022-06-10 12:08:48","admin");
INSERT INTO eaccount VALUES("190","127","RegarfDfsdf","ec5decca5ed3d6b8079e2e7e7bacc9f2","1","2022-06-10 12:08:48","manger");



DROP TABLE employee;

CREATE TABLE `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` varchar(50) DEFAULT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `age` int(11) NOT NULL,
  `gmail` varchar(100) NOT NULL,
  `phone` int(11) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `salary` float NOT NULL,
  `jop_position` varchar(100) NOT NULL,
  `status` int(100) NOT NULL,
  `avater` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=128 DEFAULT CHARSET=utf8mb4;

INSERT INTO employee VALUES("113","2","Getasew","ttesera","gess","f","39","fg67@gmail.com","123456789","ethiopia","addissssss","10000","manager","1","gf");
INSERT INTO employee VALUES("114","","Tesfa","Middel","Selam","m","23","tom@gmail.com","960035866","Ethiopia","Debre","1999","admin","1","");
INSERT INTO employee VALUES("115","","Yalew","Selemon","Bimrew","m","65","tommyasichenek@gmail.com","123123345","Ethiopia","Debremarkos","0","security","1","");
INSERT INTO employee VALUES("116","","Demeku","Gashew","Dfsdf","f","32","demeku@gmail.com","568754342","Ethiopia","Debre","0","technician","0","");
INSERT INTO employee VALUES("120","EMP_3248_120","wer","Misdl","Asifrgfg","m","48","tomy@gmail.com","123123123","Ethiopia","Debremarkos","34556","manager","0","");
INSERT INTO employee VALUES("123","EMP_3226_123","Regarf","Fgfdyhtrshfg","Hghshsgyt","m","65","egdvrtr@gmail.com","123545456","Etr","Rtty","0","admin","1","");
INSERT INTO employee VALUES("124","EMP_1743_124","Regarf","Fgfdyhtrshfg","Hghshsgyt","m","23","et@gmail.com","123545458","Etr","Rtty","0","clealiness","1","");
INSERT INTO employee VALUES("125","EMP_9054_125","Regarf","Fgfdyhtrshfg","Hghshsgyt","m","45","egdv5@gmail.com","123545450","Etr","Rtty","0","manger","1","");
INSERT INTO employee VALUES("126","EMP_7040_126","Regarf","Fgfdyhtrshfg","Hghshsgyt","F","45","egedv@gmail.com","123545453","Etr","Rtty","1000","admin","1","");
INSERT INTO employee VALUES("127","EMP_5223_127","Regarf","Fgfdyhtrshfg","Dfsdf","F","67","egdv4rtr@gmail.com","123545455","Etr","Rtty","1000.3","manger","1","");



DROP TABLE feedback;

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `feedback_by` int(11) NOT NULL,
  `send_to` int(11) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `date` datetime NOT NULL,
  `view` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `send_to` (`send_to`),
  KEY `feedback_ibfk_1` (`feedback_by`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4;

INSERT INTO feedback VALUES("23","19","115","thank you","2022-05-17 15:00:48","1");
INSERT INTO feedback VALUES("24","19","117","rergrea","2022-05-17 15:13:03","1");
INSERT INTO feedback VALUES("25","19","115","ragfdgar","2022-05-17 15:13:11","1");
INSERT INTO feedback VALUES("26","20","115","tank you","2022-05-17 15:24:05","1");
INSERT INTO feedback VALUES("36","19","115","FDGFN","2022-06-04 11:51:00","1");



DROP TABLE give_item;

CREATE TABLE `give_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `give_to` int(100) NOT NULL,
  `give_by` int(100) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_type` varchar(100) NOT NULL,
  `item_category` varchar(100) NOT NULL,
  `quality` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `give_date` datetime NOT NULL,
  `message` varchar(1000) NOT NULL,
  `schedule` datetime NOT NULL,
  `view` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `give_to` (`give_to`),
  KEY `give_item_ibfk_1` (`give_by`),
  CONSTRAINT `give_item_ibfk_1` FOREIGN KEY (`give_by`) REFERENCES `employee` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4;

INSERT INTO give_item VALUES("18","115","115","laptop","office material","Disposable","moderate","3","2022-05-21 19:42:32","fgfgd","2022-05-27 10:46:00","1");
INSERT INTO give_item VALUES("19","115","115","laptop","office material","Returnable","high","4","2022-05-21 19:42:50","ghdfhghds","2022-06-02 02:46:00","1");
INSERT INTO give_item VALUES("20","115","115","bus","Clean material","Returnable","moderate","6","2022-05-21 19:43:01","ghfgh","2022-07-12 01:46:00","1");
INSERT INTO give_item VALUES("21","115","115","laptop","Security Material","Consumable","moderate","3","2022-05-21 21:38:03","dfsdfdsfds","2022-08-20 12:42:00","1");
INSERT INTO give_item VALUES("22","115","115","bus","office material","Returnable","high","2","2022-05-21 21:38:16","fdzgdfg","2022-09-21 16:42:00","1");
INSERT INTO give_item VALUES("23","115","115","laptop","Security Material","Consumable","moderate","1","2022-05-22 00:17:45","GHJHGJGH","2022-05-21 19:21:00","1");
INSERT INTO give_item VALUES("24","115","115","laptop","Security Material","Disposable","low","4","2022-06-01 11:57:06","dffgh","2022-06-10 14:59:00","0");
INSERT INTO give_item VALUES("25","115","115","bus","office","Returnable","high","1","2022-06-01 21:36:39","rfrgvfsgfdgdfgdfgfg","2022-06-04 02:41:00","0");
INSERT INTO give_item VALUES("26","115","115","bus","office","Returnable","high","1","2022-06-01 21:48:18","fghfhsfdg","2022-06-18 03:51:00","0");
INSERT INTO give_item VALUES("27","115","115","laptop","Clean material","Returnable","high","100","2022-06-01 22:04:06","RETSGFXB","2022-06-04 15:06:00","0");
INSERT INTO give_item VALUES("28","115","115","laptop","office material","Consumable","moderate","100","2022-06-01 22:04:35","THGB","2022-06-01 16:04:00","0");
INSERT INTO give_item VALUES("29","115","115","laptop","Security Material","Consumable","moderate","3","2022-06-12 08:37:03","sc","2022-06-11 14:39:00","0");



DROP TABLE item_order;

CREATE TABLE `item_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `req_id` int(11) NOT NULL,
  `emp_id` int(100) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_type` varchar(100) NOT NULL,
  `item_category` varchar(100) NOT NULL,
  `quality` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `orderd_date` datetime NOT NULL,
  `aprove` int(11) NOT NULL,
  `give` int(11) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `emp_id` (`emp_id`),
  KEY `req_id` (`req_id`),
  CONSTRAINT `item_order_ibfk_1` FOREIGN KEY (`req_id`) REFERENCES `item_request` (`re_id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4;

INSERT INTO item_order VALUES("35","8","115","laptop","office material","Disposable","moderate","3","2022-05-21 13:13:30","1","1");
INSERT INTO item_order VALUES("36","9","115","laptop","office material","Returnable","high","4","2022-04-21 13:13:31","1","1");
INSERT INTO item_order VALUES("37","10","115","bus","Clean material","Returnable","moderate","6","2022-05-21 13:13:32","1","1");
INSERT INTO item_order VALUES("38","11","115","laptop","Security Material","Consumable","moderate","3","2022-05-21 13:13:33","1","1");
INSERT INTO item_order VALUES("39","12","115","laptop","Security Material","Consumable","moderate","1","2022-06-21 13:13:38","1","0");
INSERT INTO item_order VALUES("57","9","115","laptop","office material","Returnable","high","3","2022-06-09 09:43:50","1","1");
INSERT INTO item_order VALUES("58","11","115","laptop","Security Material","Consumable","moderate","2","2022-06-09 09:43:51","1","1");
INSERT INTO item_order VALUES("59","30","115","bus","Car","Returnable","high","3","2022-06-09 09:49:51","1","0");



DROP TABLE item_request;

CREATE TABLE `item_request` (
  `re_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(50) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_type` text NOT NULL,
  `item_category` varchar(100) NOT NULL,
  `item_quality` varchar(100) NOT NULL,
  `item_quantity` varchar(100) NOT NULL,
  `message` varchar(100) NOT NULL,
  `re_date` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `ordered` int(11) NOT NULL,
  PRIMARY KEY (`re_id`),
  KEY `emp_id` (`emp_id`),
  CONSTRAINT `item_request_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;

INSERT INTO item_request VALUES("8","115","laptop","office material","Disposable","moderate","3","we","2022-05-19 14:10:59","1","1");
INSERT INTO item_request VALUES("9","115","laptop","office material","Returnable","high","4","dfsgfszg","2022-08-21 13:08:20","1","1");
INSERT INTO item_request VALUES("10","115","bus","Clean material","Returnable","moderate","6","fgvf","2022-05-21 12:09:24","1","1");
INSERT INTO item_request VALUES("11","115","laptop","Security Material","Consumable","moderate","3","dfsfds","2022-05-21 10:09:48","1","1");
INSERT INTO item_request VALUES("12","115","laptop","Security Material","Consumable","moderate","1","jm b","2022-05-21 13:10:59","1","1");
INSERT INTO item_request VALUES("13","115","laptop","water Material","Disposable","moderate","12","ytehg","2022-05-21 13:27:06","1","1");
INSERT INTO item_request VALUES("14","115","laptop","Security Material","Disposable","low","4","..hklhj","2022-05-21 13:28:07","1","1");
INSERT INTO item_request VALUES("20","115","laptop","office material","Returnable","high","100","uygvhjg","2022-05-28 08:21:30","1","1");
INSERT INTO item_request VALUES("21","115","laptop","office material","Consumable","moderate","100","yhdh","2022-05-28 08:23:34","1","1");
INSERT INTO item_request VALUES("26","115","laptop","Clean material","Returnable","high","100","jfghk","2022-05-28 08:38:23","1","1");
INSERT INTO item_request VALUES("27","115","bus","office","Returnable","high","4","jdfhjh","2022-05-28 11:25:01","1","1");
INSERT INTO item_request VALUES("28","115","bus","Car","Returnable","high","1","tyhgfgjfjg","2022-06-01 11:32:31","1","1");
INSERT INTO item_request VALUES("29","115","bus","office","Returnable","high","2","gnbxfgbhdfg","2022-06-01 21:46:01","1","1");
INSERT INTO item_request VALUES("30","115","bus","Car","Returnable","high","10","uyyy","2022-06-09 09:43:13","1","1");



DROP TABLE request;

CREATE TABLE `request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `service` varchar(100) NOT NULL,
  `message` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_fore` (`user_id`),
  CONSTRAINT `user_id_fore` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;




DROP TABLE serv_request;

CREATE TABLE `serv_request` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `req_service` varchar(100) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `req_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `view` int(11) NOT NULL,
  PRIMARY KEY (`s_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `serv_request_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4;

INSERT INTO serv_request VALUES("21","19","technician","ddjfdf
fjdfjlfgdhg ","2022-05-17 14:22:53","1");
INSERT INTO serv_request VALUES("22","19","security","fgbdfzfyt","2022-05-17 14:35:14","1");
INSERT INTO serv_request VALUES("23","19","clealiness","dsfdf","2022-05-17 15:01:15","1");
INSERT INTO serv_request VALUES("25","19","technician","hi","2022-06-07 01:12:21","0");
INSERT INTO serv_request VALUES("26","19","technician","hi","2022-06-07 01:10:51","0");
INSERT INTO serv_request VALUES("27","19","security","hi","2022-05-19 13:33:21","1");
INSERT INTO serv_request VALUES("28","19","security","hgnbghdnh","2022-05-29 00:40:34","1");
INSERT INTO serv_request VALUES("29","19","security","1","2022-06-07 02:05:02","1");
INSERT INTO serv_request VALUES("30","19","security","2","2022-05-31 12:02:46","1");
INSERT INTO serv_request VALUES("31","19","clealiness","3","2022-05-28 00:00:00","0");
INSERT INTO serv_request VALUES("32","19","security","4","2022-06-07 02:07:39","1");
INSERT INTO serv_request VALUES("33","19","security","gfjgh","2022-05-28 20:58:18","0");



DROP TABLE serv_responce;

CREATE TABLE `serv_responce` (
  `res_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL,
  `requ_by` int(11) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `res_date` datetime NOT NULL,
  `schedule` datetime NOT NULL,
  `view` int(11) NOT NULL,
  PRIMARY KEY (`res_id`),
  KEY `emp_id` (`emp_id`),
  KEY `serv_responce_ibfk_1` (`requ_by`),
  CONSTRAINT `serv_responce_ibfk_1` FOREIGN KEY (`requ_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4;

INSERT INTO serv_responce VALUES("56","115","19","g","2022-05-17 14:59:46","2022-05-17 14:59:46","1");
INSERT INTO serv_responce VALUES("60","115","19","holl","2022-05-19 13:34:10","2022-05-19 13:34:10","1");
INSERT INTO serv_responce VALUES("61","116","19","sd","2022-05-21 21:34:39","2022-05-21 21:34:39","1");
INSERT INTO serv_responce VALUES("62","115","19","ryd","2022-05-29 09:40:34","2022-05-29 09:40:34","1");
INSERT INTO serv_responce VALUES("64","115","19","452346tfger","2022-06-07 11:05:02","2022-06-07 11:05:02","0");
INSERT INTO serv_responce VALUES("65","115","19","yh","2022-06-07 11:07:39","2022-06-07 11:07:39","0");



DROP TABLE stock;

CREATE TABLE `stock` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_code` varchar(100) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_type` varchar(100) NOT NULL,
  `item_category` varchar(100) NOT NULL,
  `item_model` varchar(100) NOT NULL,
  `item_quality` varchar(100) NOT NULL,
  `item_quantity` int(100) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

INSERT INTO stock VALUES("7","12","bus","office material","high","12/euw","high","22","1");
INSERT INTO stock VALUES("9","21","laptop","Computer","Disposable","56fggh","Moderate","163","1");
INSERT INTO stock VALUES("11","4345","bus","Car","Returnable","56fggh","Moderate","2","0");



DROP TABLE uaccount;

CREATE TABLE `uaccount` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `lastlogin` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4;

INSERT INTO uaccount VALUES("37","19","user1","user1","1","2022-05-17 14:08:12");



DROP TABLE user;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(50) DEFAULT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `age` int(11) NOT NULL,
  `gmail` varchar(100) NOT NULL,
  `phone` int(11) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `subcity` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

INSERT INTO user VALUES("19","","Balem","yematewu","Haylu","m","34","k@gmail.com","960035866","Ethiopia","wrsf","1");



