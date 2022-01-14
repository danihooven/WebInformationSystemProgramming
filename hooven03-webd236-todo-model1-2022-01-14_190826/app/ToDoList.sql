PRAGMA foreign_keys=OFF;
BEGIN TRANSACTION;
CREATE TABLE "todo" (
  description VARCHAR(50) NOT NULL,
  done INTEGER NOT NULL,
  id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT
);
INSERT INTO "todo" VALUES('Prepare a model 1 architecture example',0,2);
INSERT INTO "todo" VALUES('Teach class on Wednesday, 7:30 PM EST.',0,5);
INSERT INTO "todo" VALUES('Prepare a model 2 architecture example',0,6);
INSERT INTO "todo" VALUES('Get this sample app working on Glitch',0,8);
DELETE FROM sqlite_sequence;
INSERT INTO "sqlite_sequence" VALUES('todo',10);
COMMIT;