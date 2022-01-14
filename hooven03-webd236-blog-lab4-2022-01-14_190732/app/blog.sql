PRAGMA foreign_keys=OFF;
BEGIN TRANSACTION;
DROP TABLE IF EXISTS `comment`;
DROP TABLE IF EXISTS `user`;
DROP TABLE IF EXISTS `post`;

CREATE TABLE `comment`(
  comment_id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  datestamp DATETIME NOT NULL,
  user_id INTEGER NOT NULL REFERENCES user(user_id) ON DELETE CASCADE,
  post_id INTEGER NOT NULL REFERENCES post(post_id) ON DELETE CASCADE,
  text VARCHAR(255) NOT NULL
);


CREATE TABLE `user` (
  -- Note that storing passwords in plaintext like this is very, very bad.
  -- But we'll address that issue later.
  user_id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  email TEXT UNIQUE NOT NULL,
  password TEXT NOT NULL,
  firstName TEXT NOT NULL,
  lastName TEXT NOT NULL,
  picture TEXT DEFAULT 'https://cdn.glitch.com/130421ae-cda6-4f98-b47f-944660b8b3b2%2Faccount-circle.svg?v=1625107595576',
  bio TEXT
);
INSERT INTO "user" VALUES(1,'nobody@nowhere.com','v@larM0rghul1s','Arya','Stark', 'https://cdn.glitch.com/130421ae-cda6-4f98-b47f-944660b8b3b2%2Faccount-circle.svg?v=1625107595576', 'Amateur student. Typical writer. Bacon expert. Music buff. Lifelong internet guru. Award-winning alcohol practitioner.');
INSERT INTO "user" VALUES(2,'ironborn@pyke.com','!r0nBorn','Theon','Greyjoy', 'https://cdn.glitch.com/130421ae-cda6-4f98-b47f-944660b8b3b2%2Faccount-circle.svg?v=1625107595576', 'Avid music lover. Lifelong troublemaker. Entrepreneur. Passionate zombie fan. Creator.');
INSERT INTO "user" VALUES(3,'alwayspayshisdebts@casterlyrock.com','th3Imp','Tyrion','Lannister', 'https://cdn.glitch.com/130421ae-cda6-4f98-b47f-944660b8b3b2%2Faccount-circle.svg?v=1625107595576', 'Falls down a lot. Creator. Food fanatic. Twitter advocate. Web maven. Evil alcohol nerd.');
INSERT INTO "user" VALUES(4,'todd.whittaker@franklin.edu','NicePassword','Todd','Whittaker', 'https://cdn.glitch.com/130421ae-cda6-4f98-b47f-944660b8b3b2%2Faccount-circle.svg?v=1625107595576', 'Total internet ninja. Passionate web practitioner. Extreme coffee buff. Student. Avid entrepreneur.');

CREATE TABLE `post`
(
  post_id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  title VARCHAR(255) NOT NULL,
  content TEXT NOT NULL,
  datestamp DATETIME NOT NULL,
  tags VARCHAR(255) NOT NULL,
  user_id INTEGER NOT NULL REFERENCES user(user_id) ON DELETE CASCADE
);
INSERT INTO "post" VALUES(1,'A first blog post','The emergence and growth of blogs in the late 1990s coincided with the advent of web publishing tools that facilitated the posting of content by non-technical users who did not have much experience with HTML or computer programming. Previously, a knowledge of such technologies as HTML and File Transfer Protocol had been required to publish content on the Web, and early Web users therefore tended to be hackers and computer enthusiasts. In the 2010s, the majority are interactive Web 2.0 websites, allowing visitors to leave online comments, and it is this interactivity that distinguishes them from other static websites.[2] In that sense, blogging can be seen as a form of social networking service. Indeed, bloggers do not only produce content to post on their blogs, but also often build social relations with their readers and other bloggers.[3] However, there are high-readership blogs which do not allow comments.

From: https://en.wikipedia.org/wiki/Blog','2019-06-10 09:15:00','first boring',1);


INSERT INTO "post" VALUES(2,'A second blog post','A blog (a truncation of "weblog")[1] is a discussion or informational website published on the World Wide Web consisting of discrete, often informal diary-style text entries (posts). Posts are typically displayed in reverse chronological order, so that the most recent post appears first, at the top of the web page. Until 2009, blogs were usually the work of a single individual,[citation needed] occasionally of a small group, and often covered a single subject or topic. In the 2010s, "multi-author blogs" (MABs) emerged, featuring the writing of multiple authors and sometimes professionally edited. MABs from newspapers, other media outlets, universities, think tanks, advocacy groups, and similar institutions account for an increasing quantity of blog traffic. The rise of Twitter and other "microblogging" systems helps integrate MABs and single-author blogs into the news media. Blog can also be used as a verb, meaning to maintain or add content to a blog.

From https://en.wikipedia.org/wiki/Blog','2019-06-10 12:15:00','second wikipedia',2);


INSERT INTO "post" VALUES(3,'Lorem Ipsum','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc maximus ex a massa luctus posuere. Nullam iaculis nibh ut dui posuere feugiat. Quisque consectetur a nisl at dictum. Suspendisse feugiat erat neque, et scelerisque libero ultrices ut. Duis lobortis felis at lorem scelerisque iaculis. Quisque sit amet quam eget tellus sodales finibus nec quis enim. Nunc nulla leo, hendrerit sed est vel, porttitor sollicitudin massa. Aenean porta mi pharetra vulputate consequat. Donec eget tincidunt nisl. Suspendisse potenti. Ut nisi enim, commodo sit amet nibh ac, laoreet blandit urna.

Phasellus eu tortor ac sapien lobortis dictum imperdiet sed lectus. Integer feugiat urna bibendum lacus consequat fringilla. Maecenas a metus convallis, dictum felis at, tincidunt quam. Fusce non magna sit amet mi bibendum ullamcorper ut vel elit. Duis vitae congue diam. Quisque in ex sit amet elit tempor dapibus eget et dolor. Sed commodo risus eu nulla interdum, sit amet aliquet libero vulputate. Maecenas efficitur in nibh sed lacinia. Duis malesuada scelerisque odio, quis luctus ante egestas vel. Nunc in erat in dui mollis dignissim at id orci. Nullam tempor magna sed tellus iaculis, vitae bibendum nisi consequat. Fusce in dapibus metus. Nulla egestas ipsum nisi, at egestas purus lacinia non. Cras posuere magna sed elit luctus, id accumsan dolor volutpat.

Duis dui est, porta vitae nulla non, elementum luctus lectus. Etiam vel tristique leo. Sed molestie, ligula nec rutrum condimentum, purus velit commodo nibh, sed ornare augue turpis vitae est. Donec suscipit ex lorem, eu viverra nisl dapibus id. Integer dictum vestibulum neque nec dictum. Quisque nec auctor velit. Vestibulum commodo sem at pulvinar laoreet. Nulla vel augue elit. Morbi ut hendrerit turpis. Nullam turpis nibh, ultricies in tincidunt et, euismod non mi.

Sed non eleifend erat. Praesent eu egestas lacus, nec pellentesque ante. Nulla facilisi. Nulla ac tellus ornare, dictum urna nec, elementum velit. Phasellus non malesuada tortor, ac varius neque. Duis euismod velit ex, feugiat ultricies odio semper quis. In id malesuada dui. Aliquam id augue id lectus viverra bibendum eu sit amet sapien. Sed aliquet, dui ac pulvinar convallis, mauris odio sagittis erat, sit amet gravida ante risus quis sapien. Aliquam sapien lacus, faucibus vel blandit non, blandit non ex. In vitae feugiat ipsum. Donec venenatis metus odio, ut consectetur quam pretium in. Vestibulum viverra finibus hendrerit. Cras sem magna, vulputate id ex quis, porttitor pretium lectus.','2019-06-10 16:01:46 EDT','lipsum',3);


DELETE FROM sqlite_sequence;
INSERT INTO "sqlite_sequence" VALUES('post',3);
INSERT INTO "sqlite_sequence" VALUES('user',5);
COMMIT;
