# Utilisez une image de base (par exemple, Python)
FROM python:alpine

# Installez les dépendances nécessaires
RUN pip install flask gunicorn redis

# Copiez le code source dans le conteneur
COPY . /src

# Définissez le répertoire de travail
WORKDIR /src

# Commande à exécuter lorsque le conteneur démarre
CMD ["gunicorn", "--bind", "0.0.0.0:5000", "--workers", "10", "Calc_Age:app"]


