# Timeslot Manager
A website application that can be used to view the availability of your team at hourly time-slots in the week.

# Changelog 2019-09-06
-Added individual passwords for each member  
-Added the ability to change the admin password from the default  
-Added the ability to change/reset member passwords  
-Enforced member name uniqueness, preventing two users from having the same name.  
-Fixed Bug on resetting errors where the wrong member was displayed in the success message.  
-Fixed bug which prevented the removing of a member.  
-Fixed a security leak where some tests remained in the finished product.  
-Fixed a bug where the queries would crash due to the table already being queried previously.  

# Installation
Requirements: Server running MySQL and PHP scripts, such as a XAMPP installation.
1. In your editor of choice, find and replace all of the mysql connection queries starting with "$conn_id" with your MySQL information.
2. Edit the values of "$admin" in setup/create_auth.php so that it contains your  default admin password. You may additionally alter this once the project is set up on one of the admin feature pages. ~I am expecting that your team is not unproductive enough to mess with other peoples' availability.~ Rather than taking the lazy path, I have added passwords to users. Passwords are set when adding a new member, or if you added members when resetting the timetable, you must set the passwords using the "reset member" feature. Members added using the "Reset All" feature will be given a default password, which can be found and changed in the variable $password in reset/index.php. If you wish for your entire team to use the same password, simply change this variable to your desired password. I may
make an admin feature on the site to change this default password in the next update.
3. Run the two PHP script files in the "setup" folder (create_table.php and create_auth.php) to create the MySQL tables neccessary. DO NOT keep these files on the server, as these reset the tables and may contain a serious security risk. (Optional - Change the names of the MYSQL tables to be more appropiate for your organisation.)
4. With the site now up and running, go to domain.com/reset, or using the menu "Admin -> Reset All" and enter the names of your team members, seperated by commas. enter the admin password and submit the members. With your members, go to Admin -> "Reset a Member" or to domain.com/resone, select the new members, and individually set their new password.
5. Each member should use the interactive timetable from the index page to select which timeslots that they are not available for a meeting. From experience, it is much easier to know when someone is not available, rather than trying to figure out when they are.
6. If someone messes up or their schedule changes, they can add additional times they are busy from the index page, or they can set the slots free again by going to domain.com/setfree, or using the menu "Set Free". This contains another interactive timetable, where users can select the times that they are free (If someone wished to use the manager so that everyone is assumed to be busy, and people then select the times they are free, simply select all the times on the index page for each member so that they are always busy, and then use the "Set Free" page so members can select when they are free).

7. Use the timetable on the bottom of the index page to view the availability for each timeslot. Click on a timeslot to view who is unavailable at that time.

8. (optional). Replace the title, logo and icon in "header.php" to that of your organisation.

9. (also optional) You can also choose to use the admin features to change the admin/member passwords, add new members, or remove members.
