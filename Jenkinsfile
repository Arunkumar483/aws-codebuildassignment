node{
    stage('Clone repository') {
        checkout scm
    }

    stage ('build sql image') {
        sh "docker build -t mysqldockimage ./mysqlcon"
    }

    stage ('build php image') {
        sh "docker build -t phpimage --no-cache ./phpapp"
    }

    stage ('create docker network') {
        sh "docker network create mynetwork || true" 
    }

    stage ('run sql container') {
        sh "(( docker stop mysqlcontainer || true )) && docker run --name mysqlcontainer -d -p 6033:3306 --network mynetwork --rm mysqldockimage"
    }

    stage ('run php container') {
        sh "(( docker stop phpcontainer || true )) && docker run --name phpcontainer -d -p 80:80 --network mynetwork --rm phpimage"
    }

}
