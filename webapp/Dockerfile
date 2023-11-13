FROM ubuntu:18.04

LABEL MAINTAINER="kamgaingrodrigue3@gmail.com"

RUN apt-get update

RUN DEBIAN_FRONTEND=noninteractive apt-get install -y nginx git

EXPOSE 81

RUN rm -rf /var/www/html/*

ADD static-website-example/ /var/www/html/

# RUN git clone https://github.com/Rodriguez001/static-website-example.git /var/www/html/

ENTRYPOINT ["nginx", "-g", "daemon off;"]  
