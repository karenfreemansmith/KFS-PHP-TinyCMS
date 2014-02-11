Status:
It works, but there are still rough spots, most notably navigation and security issues.  It should run on a local server fine, but it's not ready for production yet.

To install:
1. copy files to your web server
2. create a database in mySQL (use "tinyCMS" to match config.php)
3. import "tinyCMS.sql" into new mySQL database (there are only 2 tables)
4. set up permissions for a user on this database 
5. add username and password to config.php file 
6. you may also need to change the database name in config.php if you picked a different one.
7. when you load the site you will see a blank front page, there are links to register or login, click register
8. the first user registered is the site administrator and gets to edit anything, don't delete this one! (Or if you do, you can insert a new user manually with a userID of 1)
9. you are redirected to a login page, login
10. from here you can add pages or edit your front page
11. additional users can be added using the register link