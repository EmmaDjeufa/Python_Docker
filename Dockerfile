# Utilisez une image de base (par exemple, Python)
FROM python:3.8

# Installez les dépendances
RUN pip install flask gunicorn redis

# Copiez le code source dans le conteneur
COPY . /src

# Définissez le répertoire de travail
WORKDIR /src

# Commande par défaut à exécuter lorsque le conteneur démarre
CMD ["gunicorn", "--bind", "0.0.0.0:5000", "Calc_Age:app"]

