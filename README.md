Status:<br />
It works, but there are still rough spots, most notably navigation and security issues.  It should run on a local server fine, but it's not ready for production yet.
<br /><br />
To install:<br />
<ol>
<li>copy files to your web server</li>
<li>create a database in mySQL (use "tinyCMS" to match config.php)</li>
<li>import "tinyCMS.sql" into new mySQL database (there are only 2 tables)</li>
<li>set up permissions for a user on this database </li>
<li>add username and password to config.php file </li>
<li>you may also need to change the database name in config.php if you picked a different one.</li>
<li>when you load the site you will see a blank front page, there are links to register or login, click register</li>
<li>the first user registered is the site administrator and gets to edit anything, don't delete this one! (Or if you do, you can insert a new user manually with a userID of 1)</li>
<li>you are redirected to a login page, login</li>
<li>from here you can add pages or edit your front page</li>
<li>additional users can be added using the register link</li>
</ol>
