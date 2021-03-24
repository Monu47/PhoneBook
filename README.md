# PhoneBook
-Create a website that will store contact details

1) Navigate to /var/www/html directory

2) Clone git repository in html directory using-
   git clone https://github.com/Monu47/PhoneBook.git
  - If permission denied-
   sudo git clone https://github.com/Monu47/PhoneBook.git

# Creating Database
- There is a file "config.php" which contains username, password, servername, database name and dsn.
  - You can change details according to your user of mysql.
  - After this,
    IN "public" Folder there is a file "install.php" which create Database "contact" and table "users" in it.
    - To perform this, Go to following url-
       "http://localhost/PhoneBook/public/install.php"
  -Database will be created if everything went alright.
  
 # Running Website
 - Go to following url and explore website-
    "http://localhost/PhoneBook/public/create.php"
    
 # References-
1) https://phoenixnap.com/kb/how-to-install-lamp-stack-on-ubuntu
2) https://www.youtube.com/watch?v=TiUWN30EYQg
   

