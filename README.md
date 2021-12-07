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

---------------------------------------------------------------------------------------
building our code build and codepipeline for the project

**ECR REPOSITORY COFIGURATION

first ecr create repository 

name it and make global 

use linux x86 64 

then go to our github repository

clone it and edit our repository

add file and name it as buildspec.yml

refer buildspec.xml in repo

![image](https://user-images.githubusercontent.com/52123143/144964610-686eadb2-2782-41d6-861c-21a2de5cafb4.png)

**CODE BUILD CONFIGURATION

now go to code build 

create new build project

give a project name

give source as github

then
public repository 

environment select managed image

os ubuntu 

select standard

image standard 5.0

enable this flag for priviledge

create new service role

env variables la add dockerpass and dockeruser specify our credentials

buildspec leave it as such

then create build


**AFTER SUCCESSFULL  CREATION

give start build to ensure that codebuild is working correctly until now

if we get a error like this

![image](https://user-images.githubusercontent.com/52123143/144965278-dd21105d-6521-4fcb-8421-57396eb7c674.png)

u need to attach policies for the created service role


![image](https://user-images.githubusercontent.com/52123143/144965347-c590ae2c-b029-433c-8bab-9e0c78fb3dd2.png)

![image](https://user-images.githubusercontent.com/52123143/144965370-b888b0b9-064e-4fbb-9705-526dd45bf18c.png)

![image](https://user-images.githubusercontent.com/52123143/144965423-88c1d065-71ac-4f83-abb7-7b8f7a9fff59.png)

now initiate build again 

![image](https://user-images.githubusercontent.com/52123143/144965470-39ee9315-94f1-4b2d-8277-e186acc4f688.png)


now go to buildpipeline

**CODE PIPELINE CONFIGURATION

create pipeline

give pipeline name

create new service role


advanced

give defaults next

add source provider

github version 2

connect to github and give connection name then connect to github and authorize our github connection

install new app only selected repo and select our own repo and connect

![image](https://user-images.githubusercontent.com/52123143/144965759-a1327e37-61ce-49c3-a866-39e1c2d82a56.png)

branch name 

repository name

codepipeline default

select aws codebuild

and give project name

provide single build for build type

create pipeline.

![image](https://user-images.githubusercontent.com/52123143/144965967-5a822c31-1f2c-4f28-83fa-8baddb966bdf.png)

go to build details

NOW REFER  OUR ECR REPOSITORY AND VERIFY IF OUR PHP AND MYSQL IMAGES ARE PRESENT.



