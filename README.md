# Le **Bus** vous attend avec **Messenger**
#### Introduction au composant Symfony Messenger
  
[Voir les slides](https://docs.google.com/presentation/d/1Sln4EJODLy64PhGzkH6ThbJGTEk_VPpgHVi_-jUfEwY/edit?usp=sharing)

![Messenger](https://github.com/alxvgt/afup-symfony-messenger/raw/master/symfony-messenger.jpg)

#### Pré-requis
- Environnement avec Docker 1.13.0+ et Docker-compose
##### Lancer le projet
- Récupérer le projet : `git clone https://github.com/alxvgt/afup-symfony-messenger.git`
- `cd afup-symfony-messenger`
- Lancer les containers : `bash docker/start.sh`
- Se connecter au container du projet : `bash docker/connect.sh afup-messenger`
- Lancer l'application de démo : `php app.php`
- Lancer un worker de démo : `php worker.php`

