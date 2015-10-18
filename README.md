# About This Repository
This is my practice repository as I re-learn ZF2 from scratch following the SkeletonApp's Album tutorial.


# Running The App Yourself..
This app assumes that you are using Apache HTTPD server. Here are the steps:

1. Clone this app

    ```
    shell$> git clone https://github.com/juneym/zf2app-tutorial.git  /path/to/zf2app-tutorial

    shell$> cd /path/to/zf2app-tutorial

    shell$> composer install
    ```

2. Make some adjustment to the ```etc/httpd/vhost.conf``` file by setting the correct path for ```DocumentRoot``` and ```Directory``` directives.

3. Finally, once you're okay with the above adjustments, copy the vhost.conf to the appropriate directory (depends on the distrubution or OS that you're using)

4. Restart the ```httpd``` daemon

5. Ensure that MySQL is user. Connect to the MySQL server using an "admin" (or root) privileged user.

6. Create the required database, users and privileges
```
    shell$> mysql -u root -p

    mysql> CREATE DATABASE zf2app;
    mysql> GRANT ALL ON zf2app.* TO demouser@localhost IDENTIFIED BY 'demouserpass';

    shell$> mysql -u root -p zf2app < /path/to/zf2app-tutorial/data/db/zf2app.sql
```

7. Modify you machine's ```hosts``` file

```
    echo "some.ip.address   zf2app.vbox" >> /etc/hosts
```

8. Access the app on your browser  (http://zf2app.vbox/)

