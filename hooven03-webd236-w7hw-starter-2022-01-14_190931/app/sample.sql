PRAGMA foreign_keys=OFF;
BEGIN TRANSACTION;
DROP TABLE IF EXISTS `sample`;
asdfasdf
CREATE TABLE `sample` (
  id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  firstName TEXT NOT NULL,
  lastName TEXT NOT NULL
);

INSERT INTO "sample" VALUES(1,'Arya','Stark');
INSERT INTO "sample" VALUES(2,'Theon','Greyjoy');
INSERT INTO "sample" VALUES(3,'Tyrion','Lannister');

DELETE FROM sqlite_sequence;
INSERT INTO "sqlite_sequence" VALUES('sample',3);
COMMIT;