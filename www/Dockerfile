#FROM python:alpine
#RUN pip install flask
#RUN pip install gunicorn
#RUN pip install redis
#COPY . /src
#WORKDIR /src
#CMD gunicorn --bind 0.0.0.0:5000 --workers 10 counter:app
#EXPOSE 5000
# Utilisez une image Ubuntu
FROM ubuntu:20.04

# Mise à jour du système
RUN apt-get update

# Installation d'Apache
RUN apt-get install -y apache2

# Copiez votre page HTML dans le répertoire du serveur web d'Apache
COPY WelcomeING3.html /www/html/

# Exposez le port 80 pour Apache
EXPOSE 80

# Commande pour démarrer Apache en mode démon
CMD ["apache2ctl", "-D", "FOREGROUND"]
