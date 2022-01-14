PRAGMA foreign_keys=OFF;
BEGIN TRANSACTION;
DELETE FROM sqlite_sequence;

-- DROP TABLE IF EXISTS `people`;
-- 
-- Here's some sql to create a table
-- CREATE TABLE `people`
-- (
--   id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
--   first_name TEXT NOT NULL,
--   last_name TEXT NOT NULL,
--   email text NOT NULL UNIQUE
-- );
-- 
-- Here's some sql to add data to the table
-- INSERT INTO "people" VALUES(1, "George", "Bush", "gbush@gmail.com");
-- INSERT INTO "people" VALUES(2, "Barack", "Obama", "bobama@gmail.com");
-- INSERT INTO "people" VALUES(3, "Donald", "Trump", "dtrump@gmail.com");

COMMIT;
