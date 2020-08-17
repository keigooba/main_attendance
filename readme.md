# Name

"attendance" is a laravel application that records going to work and leaving work.

# DEMO

You can know at a glance when employees come and go. (Can be used instead of a time card)

https://xd.adobe.com/view/1448ddac-01c6-454d-86d5-25df977580d4-411b/

This is an image created with adobe.
All you have to do is press the user name and press going or leaving. You can operate it intuitively.

# Features

I use docker, aws and circleci.

Use AWS in the production environment and docker in the local environment. Also use circleci.

Attendance used [main_attendance] file(https://github.com/keigooba/main_attendance) and docker file.

# Requirement

* laravel 7.24(latest)
* PHP7.3-apache
* mysql5.7.29

# Installation

https://qiita.com/sano1202/items/963c4677f14790863b67/

See above article.

```bash
composer create-project "laravel/laravel" main_attendance
```

# Usage

Create a file with an appropriate name and create a docker file and a main_attendance(https://github.com/keigooba/main_attendance) file.

```bash
docker-compose up --build -d
docker exec -it main_attendance bash
sh startup.sh
```

This will run the migration and seeding and register the table and records.

# Note

In the production environment, please refer to the following article to create an instance.（Also set circleci）

https://noumenon-th.net/programming/2020/05/02/circleci-laravel-ec2-deploy/

# Author

keigooba
Independent
* Twitter : https://twitter.com/hx_kei

# License

"atteandance" is under [MIT license](https://en.wikipedia.org/wiki/MIT_License).

Let's enjoy the work with sharpness!

Thank you!
