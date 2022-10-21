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
create table t_user(
	F_user_id int AUTO_INCREMENT,
	user_name VARCHAR(20),
	password VARCHAR(255),
	e_mail VARCHAR(255),
	tell int(12),
	dredit_num int(15),
	PRIMARY KEY (F_user_id)	
);
```

### create_user_edit
編集情報格納
```
create table t_user_edit(
	edit_id int(5),
	F_user_id  int(5),
	temp_cd int(4),
	title VARCHAR(255),
	img_data json,
	content_data json,
	PRIMARY KEY (edit_id),
    FOREIGN KEY t_user_edit(F_user_id) REFERENCES t_user(F_user_id)
);
```

### t_user_gift
ギフト情報の格納
```
create table t_user_gift(
	gift_id INT(5),
	F_user_id INT(5),
	gift_cd VARCHAR(20),
	send_username VARCHAR(20),
	count INT(2),
	FOREIGN KEY t_user_gift(F_user_id) REFERENCES t_user(F_user_id)
);
```