#!/usr/bin/env python

from flask import Flask, send_file
import os

app = Flask(__name)

@app.route("/")
def index():
    # Définir le chemin du fichier HTML
    html_file = "WelcomeING3.html"

    # Vérifier si le fichier existe
    if os.path.exists(html_file):
        # Utiliser Flask pour renvoyer le fichier HTML
        return send_file(html_file)
    else:
        # Afficher un message d'erreur si le fichier n'existe pas
        return "Fichier HTML introuvable", 404

if __name__ == "__main__":
    app.run(host="0.0.0.0")

