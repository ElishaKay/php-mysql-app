To start the app simply 

a) create 2 sql databases locally
b) put a password in the 'database.php' file, "dropdown/db_connect.php" file, and "drag-and-drop/config.php" file.

c) Run this command on the db to add an 'item_order' column

query to add the 'item_order' column to client table.

ALTER TABLE client ADD item_order int(11) NOT NULL; 

The app uses MySQL, PHP, and Ajax.
