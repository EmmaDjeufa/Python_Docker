from datetime import datetime

def calculer_age(date_naissance):
    # Convertir la chaîne de date en objet datetime
    date_format = "%Y-%m-%d"

    try:
        date_naissance = datetime.strptime(date_naissance, date_format)
    except ValueError:
        raise ValueError("Format de date incorrect. Assurez-vous d'utiliser le format YYYY-MM-DD.")

    # Obtenir la date actuelle
    date_actuelle = datetime.now()

    # Vérifier si la date de naissance est dans le futur
    if date_naissance > date_actuelle:
        raise ValueError("La date de naissance ne peut pas être dans le futur.")

    # Calculer la différence entre les deux dates
    difference = date_actuelle - date_naissance

    # Extraire l'année de la différence
    age = difference.days // 365

    return age

# Demander à l'utilisateur sa date de naissance
date_naissance_utilisateur = input("Entrez votre date de naissance (format YYYY-MM-DD) : ")

try:
    # Appeler la fonction pour calculer l'âge
    age_utilisateur = calculer_age(date_naissance_utilisateur)

    # Afficher l'âge
    print("Vous avez {} ans.".format(age_utilisateur))

except ValueError as e:
    print("Erreur :", e)

