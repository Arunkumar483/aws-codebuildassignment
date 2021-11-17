# dockerphpmysqlapplication

create network for setting communication between php and mysql containers


sudo docker network create #networkname#


first build mysql docker image


/mysql$ sudo docker build .


then run it and for testing purpose expose its port --rm will destroy container after it is stopped 


sudo docker run --name mysqlcontainer -p 6033:3306 --rm --network mynetwork 76e81e39cbd3


for testing if the mysqlcontainer is running u can access its cli by the following command


mysql -u root -p -P 6033 --protocol=TCP


now navigate to phpapp directory and build the phpimage


/phpapp$ sudo docker build .


then run the container and expose the port to 81 and specify the network as same as sqlcontainer


sudo docker run --name phpcontainer -p 81:80 --network mynetwork --rm ded2b4f59f5c


navigate to localhost:81 our phpmysql will be live on the server
