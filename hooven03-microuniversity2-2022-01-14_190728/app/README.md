# WEBD 236 Model 2 Starter

This project is a good place to start using the MVC framework developed in WEBD 236.

## Helpful Hints
  - The database is called 'database.db3' and it can be reset using the 'database.sql' file. Anything you want to always have in the database should be put in SQL in the 'database.sql' file.
  - You should never hard-code a URL with the name or IP address of your machine.  We won’t be using your machine when we test it.  Also, you should not hard-code a directory name in your application.  It should run as [http://somename.glitch.me/index](http://somename.glitch.me/index).
  - The videos about the MVC framework in the course can help
  - To keep data in forms, you will need to echo out the content of variables within tags.  For example, you may have something that looks similar to this:
  
    `<input type='text' name='title' id='title' value='{{$title}}' />`

    Of course, you need to make sure that the variable `$title` has some content in it from the last post.
    
  - Remember that every operation that writes to the database should be followed by a redirect whereas every ‘get’ (generally) should be followed by a forward (i.e. a template render). 
