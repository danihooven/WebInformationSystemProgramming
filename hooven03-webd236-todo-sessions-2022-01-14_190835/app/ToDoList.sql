PRAGMA foreign_keys=OFF;
BEGIN TRANSACTION;
DROP TABLE IF EXISTS `user`;
DROP TABLE IF EXISTS `todo`;

CREATE TABLE `user` (
  -- Note that storing passwords in plaintext like this is very, very bad.
  -- But we'll address that issue later.
  id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  email TEXT UNIQUE NOT NULL,
  password TEXT NOT NULL,
  firstName TEXT NOT NULL,
  lastName TEXT NOT NULL
);
INSERT INTO "user" VALUES(1,'nobody@nowhere.com','v@larM0rghul1s','Arya','Stark');
INSERT INTO "user" VALUES(2,'ironborn@pyke.com','!r0nBorn','Theon','Greyjoy');
INSERT INTO "user" VALUES(3,'alwayspayshisdebts@casterlyrock.com','th3Imp','Tyrion','Lannister');
INSERT INTO "user" VALUES(4,'todd.whittaker@franklin.edu','NicePassword','Todd','Whittaker');

CREATE TABLE `todo` (
  description VARCHAR(50) NOT NULL,
  done INTEGER NOT NULL,
  id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  user_id INTEGER NOT NULL REFERENCES user(id) ON DELETE CASCADE
);

INSERT INTO "todo" VALUES('Prepare a model 1 architecture example',0,2,4);
INSERT INTO "todo" VALUES('Teach class on Wednesday, 7:30 PM EST.',1,5,4);
INSERT INTO "todo" VALUES('Prepare a model 2 architecture example',1,6,4);
INSERT INTO "todo" VALUES('Get this sample app working on Glitch',1,8,4);
INSERT INTO "todo" VALUES('Another thing to do. Great.',0,11,4);
INSERT INTO "todo" VALUES('Defeat the Waif.',0,12,1);
INSERT INTO "todo" VALUES('Make a list of people to assassinate.',1,13,1);
INSERT INTO "todo" VALUES('Become nobody.',1,14,1);
INSERT INTO "todo" VALUES('Betray the Starks',1,15,2);
INSERT INTO "todo" VALUES('Rule Winterfell poorly',1,16,2);
INSERT INTO "todo" VALUES('Be tortured by Ramsay Bolton.',1,17,2);
INSERT INTO "todo" VALUES('Escape from Ramsay Bolton',0,18,2);
INSERT INTO "todo" VALUES('Be debauched',1,19,3);
INSERT INTO "todo" VALUES('Win the Battle of Blackwater.',1,20,3);
INSERT INTO "todo" VALUES('Kill my father.',1,21,3);
INSERT INTO "todo" VALUES('Run away to find Danerys Targarian.',1,22,3);
INSERT INTO "todo" VALUES('Betray my best friend',0,23,3);
INSERT INTO "todo" VALUES('Suggest a new king.',0,24,3);

DELETE FROM sqlite_sequence;
INSERT INTO "sqlite_sequence" VALUES('todo',24);
INSERT INTO "sqlite_sequence" VALUES('user',5);
COMMIT;
