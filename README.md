# Timeslot Manager
An application that can be used to view the availability of your team at certain time-slots in the week.

# Installation
1. In your editor of choice, find and replace all of the mysql connection queries starting with "$conn_id" with your MySQL information.
2. Edit the values of "$admin" and "$user" in setup/create_auth.php so that they contain your admin password and the user password. You may additionally alter this and the verification queries in the application so each user has a unique password. I am expecting that your team is not unproductive enough to mess with other peoples' availability. 
3. Run the two files in the "setup" folder to create the MySQL tables neccessary. DO NOT keep these files on the server, as these reset the tables. (Optional - Change the names of the tables to be more appropiate for your organisation.)
4. With the site now up and running, go to domain.com/reset, or using the menu "Admin -> Reset All" and enter the names of your team members, seperated by commas. enter the admin password and submit the members.
5. Each member should use the interactive timetable from the index page to select which timeslots that they are not available for a meeting. From experience, it is much easier to know when someone is not available, rather than trying to figure out when they are.
6. If someone messes up or their schedule changes, they can add additional times they are busy from the index page, or they can set the slots free again by going to domain.com/setfree, or using the menu "Set Free". This contains another interactive timetable, where users can select the times that they are free (If someone wished to use the manager so that everyone is assumed to be busy, and people then select the times they are free, simply select all the times on the index page for each member so that they are always busy, and then use the "Set Free" page so members can select when they are free).

7. Use the timetable on the bottom of the index page to view the availability for each timeslot. Click on a timeslot to view who is unavailable at that time.

8. (optional). Replace the title, logo and icon in "header.php" to that of your organisation.

