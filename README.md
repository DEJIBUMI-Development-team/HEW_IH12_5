# project-dejibumi repo
このプロジェクトはmysql, Apacheを用いて環境構築を行っている。


## How to create a Dejibumi DB and Table
以下にデータベース・テーブルの作成及び方法を記述する。

### create DB
- phpmyadminのページから、[dejibumidb]という名前でデータベースを作成

## create Table
データベースの構成上、ユーザ―情報を格納する[t_user]を先に作成する。

### create t_user
ユーザ―情報格納
```
CREATE TABLE `t_user` (
  `F_user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `e_mail` varchar(255) DEFAULT NULL,
  `tell` int(12) DEFAULT NULL,
  `dredit_num` int(15) DEFAULT NULL,
  PRIMARY KEY (`F_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4
```

### create_user_edit
編集情報格納
```
CREATE TABLE `t_user_edit` (
  `edit_id` int(5) NOT NULL AUTO_INCREMENT,
  `F_user_id` int(5) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`content_data`)),
  PRIMARY KEY (`edit_id`),
  KEY `t_user_edit` (`F_user_id`),
  CONSTRAINT `t_user_edit` FOREIGN KEY (`F_user_id`) REFERENCES `t_user` (`F_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4
```

### t_user_gift
ギフト情報の格納
```
CREATE TABLE `t_user_gift` (
  `gift_id` int(5) DEFAULT NULL,
  `F_user_id` int(5) DEFAULT NULL,
  `gift_cd` varchar(20) DEFAULT NULL,
  `send_username` varchar(20) DEFAULT NULL,
  `count` int(2) DEFAULT NULL,
  KEY `t_user_gift` (`F_user_id`),
  CONSTRAINT `t_user_gift` FOREIGN KEY (`F_user_id`) REFERENCES `t_user` (`F_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
```
### t_user_letter
でじぶみの格納
```
CREATE TABLE `t_user_letter` (
  `letter_id` int(5) NOT NULL AUTO_INCREMENT,
  `F_user_id` int(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `raw_data` mediumblob NOT NULL,
  PRIMARY KEY (`letter_id`),
  KEY `F_user_id` (`F_user_id`),
  CONSTRAINT `t_user_letter` FOREIGN KEY (`F_user_id`) REFERENCES `t_user` (`F_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4
```
