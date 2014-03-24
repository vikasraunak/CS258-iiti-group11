#IIT Indore Alumni Website
###CS 258 Software Engineering Project Group 11
Spring Semester, 2013  
Instructor: Dr. A. Srivastava  
Project Client: Dr. I. A. Palani, IIT Indore

###CS258-iiti-group11
- Darshan Tejani
- Deeksha Thadi
- Kartikeya Upasani
- Vikas Raunak

#TO DO
- Front end design using bootstrap
- Check for potential security breaches like XSS or SQLInjection
- Add Name as search parameter while searching Alumni Database
- Add photo to profile. 
- Add 'Request To Institute' functionality
- Add 'Friend Profile' and 'Friend Request' functionality
- Add 'Notification' functionality
- Add 'Events' functionality
- Add 'Forums' functionality
- Add 'Admin Panel' that comprises of:
	* Creation of batch usernames and passwords when batch passes
	* Approve password reset requests
	* Approving public posts

#Setting up files on local machine
- Download .zip from GitHub repository and extract files into DocumentRoot of Apache Server (or the appropriate folder as per your local server configuration)
- Copy contents of sqlquery.txt and run query on MySQL server to create the required database table.
- Edit $mysql_hostname, $mysql_user, $mysql_password, $mysql_database, $table variables found in the first few lines of connection.php to match your MySQL DB configuration. 
- Run register.php from browser (Eg: localhost/register.php) and create login credentials. 
- Run index.php from browser.

