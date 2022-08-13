# TUGAS KULIAH PEMROGRAMAN WEB LANJUT
[web-work-assessment]

[NOTE][untuk pak akbar ::]
1. bisa buka di app/View/template_for_testing bagian dashboard
2. dan bisa buka di bussiness.md >>> untuk gambaran app ini mau kemana dan apa aja yang ditampilin 

# Note
.htaccess >> pakai punya nya orang, just make for routing can read again / rewrite in browser,

# How to run in local first way
# How to run in local
1. clone this project from github https://github.com/adexRepo/web-work-assessment.git
2. install composer if still not install composer https://getcomposer.org/Composer-Setup.exe
    this project just use 
    [a] // for unit test "require-dev": { "phpunit/phpunit": "9.5.18"}
    and
    [b]// for unit test "require": {"php": ">=8.0.0"},
3. go to terminal in this project run composer update
4. go to C:\xampp\apache\conf\httpd.conf and open that file
    [a.] find vhosts.conf >> uncomment this part "Include conf/extra/httpd-vhosts.conf"
    [b.] find "DocumentRoot C:\xampp\htdocs" (this is default if different path noproblem)
        change that path web-work-assessment file you used
        example : DocumentRoot "C:\development\github\web-work-assessment\public"
    [c.] change also below DocumentRoot "Directory C:\xampp\htdocs"
        example : Directory "C:\development\github\web-work-assessment\public"
        don't forget to use < >
5. go to C:\xampp\apache\conf\extra
    [a.] open  httpd-vhosts.conf file and add
        <VirtualHost *:80>
            ServerAdmin admin@web-work-assessment.local
            DocumentRoot "C:/development/github/web-work-assessment/public"
            ## DocumentRoot part depends on the place your project web-work-assessment path 
            ServerName php-mvc.local
            ErrorLog "logs/php-mvc.local-error.log"
            CustomLog "logs/php-mvc.local-access.log" common
        </VirtualHost>
6. go to C:\Windows\System32\drivers\etc
    [a.] open hosts and add
        $ Development
        127.0.0.1 php-mvc.local
    [b.] you can change php-mvc to web-work-assessment if you want 127.0.0.1 web-work-assessment.local
    [c.] but if you change that, step 5 you need to change all php-mvc to web-work-assessment also
7. just running
    [a]http://php-mvc.local/

[**]if you change step 5 and step 6 php-mvc to web-work-assessment you can open
    [a]http://web-work-assessment.local/  ## btw don't forget to open xampp run apache and mysql

# how to run in local second way
1. add ddl db and add composer also
2. if you using vs code, just open terminal that terminal go to public and run php -S localhost:8080
    but you must also need to run mysql in xampp
3. if you just want to using xampp for run web server,, yaa just run apache and mysql
    but you need to follow step 3 in first way (cara pertama diatas)
3. by default localhost:8080 just open in browser
4. for now this app just can open sign in and register, register already worked but sign in still procced


# How to see architecture.wsd
1. install chocholatey
2. install plantUML or run : choco install plantuml
3. in vs code install "PlantUML"
4. open architecture.wsd ,
5. right click and choose "Preview Current Diagram"
6. or alt+D in architecture.wsd 

* or open https://www.plantuml.com/plantuml/uml/SyfFKj2rKt3CoKnELR1Io4ZDoSa70000
copy paste content in architecture.wsd to that demo server

