**Projet :**

_En tant qu'étudiant, je veux :_

    -pouvoir émarger à l'aide de ma carte étudiant le matin et le soir

    -avoir une confirmation visuelle que l'émargement s'est bien passé

_En tant qu'employé du pôle suivi, je veux :_

    -pouvoir m'authentifier en utilisant mes logins de l'ETNA sur une plateforme admin.

    -avoir accès à l'historique des émargements.

    -pouvoir facilement visualiser la liste des étudiants en retard ou absents par jour.

    -avoir accès à l'historique d'assiduité d'un étudiant particulier.

    -pouvoir donner un statut "justifié" à certains retards ou absences.
**Technologies utilisées:**

    - React Native.
    - Expo.
    - Laravel.
    - Mysql.
    -Postman.

# Laravel (page Admin)

_**Migrations & Models**:_

    -php artisan make:model  --migration -> Commande pour créer le model et la migration appelés . (Etudiants |    Employes | Historiques)

    -app/model -> pour créer les models.

    -database/migration -> pour créer les migrations.

    -php artisan migrate -> Envoyer les migrations.

    -php artisan migrate:refresh -> Relancer les migrations pour obtenir les mises à jours.
 _**Routes:**_


Afin de déterminer nos routes , nous créeons nos routes dans le fichier api.php et web.php. Et nous implémentons les routes demandées dans le sujet avec la bonne synthaxe pour chacune d'entre elles ainsi que le bon type que ce soit "GET, POST, DELETE, et PUT" :
Route::{method}('/{path}', [{name}Controller::class, 'function']);
(Les mots en italique sont à personnaliser pour chaques routes)


Chacunes des routes se rapportent à une fonction dans le controller auquel elle fait appel :
function {nom de la fonction}() {
    code
}
(Nous pouvons tester nos routes à l'aide du logiciel "Postman")

_**Controllers:**_


Mise en place des fichiers Controllers avec la commande :
php artisan make:controller {name}


Chaques Routes précédemment misent en place dans le fichier route à sa propre fonction dans la classe correspondante.


Exemple :

```Route::post('/Etudiants', [EtudiantController::class, 'getEtudiant']);```

Fait appel à : La fonction 'Etudiants' de la classe 'EtudiantController'

_**1. EmployéController:**_

**Authentification:**

    - Cette requête nous permet de s'inscrire grâce à la fonction 'Authentification' dans notre 'EmployéController'.Elle passe par une route de type POST pour laquelle il faut fournir (email et password) de notre utilisateur.
    - Dans le cas ou nous oublions de renseigner une des information requise ou une des information rentrée serait éronnée un message d'erreur 'le nom d'utilisateur ou le mot de passe est incorrect, veuillez reessayer'.

_**2. EtudiantController:**_

Dans ces Controllers nous avons plusieurs fonction :

```Route::get('/search',[EtudiantController::class, 'search'])->name('search.etudiant');```

-  Pour la barre de recherche

```Route::get('/generate', [PdfController::class, 'generatePDF'])->name('generate');```

-  Pour génerer un pdf.

```Route::get('/etudiant/{login}',[EtudiantController::class, 'index3']);```

-  Pour afficher la page détail d'un étudiant.

```Route::get('admin',[EtudiantController::class, 'show']);```

-  Pour  afficher la table etudiants.


_**Seeder**:_

    Nous avons creé les seeders dans 'database/seeders':ils nous permets d'ajouter des éléments dans la base de données.

_**1. EmployéSeeder:**_

Pour enregistrer les emails et les passwords des Employes de l'Etna dans la table 'Employes'.

_**1. EtudiantSeeder:**_

Pour enregister les logins et les ids des etudiants de l'Etna dans la base de données.

# API(Laravel)

```Route::put('emargement/{id}', [App\Http\Controllers\EtudiantController::class, 'changeStatus']);```

-  Elle permet de modifier le statut de l'etudiant qui etait de base 'absent' une fois scanner sa carte grâce à la fonction « changeStatus » qui se situe dans EtudiantController. 
-  On utilise une route de type PUT.
-  Si tous se passe bien la fonction modifie le statut en "present" ou "retard"  cela depend  du temps  du scannemant de la carte .
-   Elle retourne les données sous forme Json.

# Front

Nous avons utilisé du React Native et Expo:

-Nous avons creé un Dossier ```Screens.js``` qui contient les deux page de notre app:

_**Home.js**_

     Nous pouvons dire que cette page est la page d'acceuille de notre app ,elle contient un button "Scanner" qui est 
     diregé vers la page "Scanner.js".

_**Scanner.js**_
     
     Nous avons dans cette page la barre pour scanner le Qr code et stocker les données dans des variables pour les utiliser après .
     Pour faire cela nous avons  ```importer { BarCodeScanner } from "expo-barcode-scanner";```

#  Liaison Front API

-  Pour lier le front et l'api nous avons utilisé la fonction "Fetch" qui prend comme paramètre notre Adress IP et le nom de la route: 

             fetch(`http://172.16.28.87:8000/api/emargement/${idd}`,{

                method: 'PUT',

                headers: {

                Accept: 'application/json',

                'Content-Type': 'application/json'

                },

                body: JSON.stringify({

                    status: 'present',

                })

    
