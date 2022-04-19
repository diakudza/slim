каркас для изучения slim фреймворка
###Запуск проекта

````bash script
docker network create --driver=bridge --subnet=192.168.40.0/24 --gateway=192.168.40.1 slim-net
docker-compose build 
docker-compose up -d
сomposer install
````
 Сервер будет доступен по localhost:81
 или поменяйте на нужный в файле docker-compose
