<div id="top"></div>
<!--
*** Thanks for checking out the Best-README-Template. If you have a suggestion
*** that would make this better, please fork the repo and create a pull request
*** or simply open an issue with the tag "enhancement".
*** Don't forget to give the project a star!
*** Thanks again! Now go create something AMAZING! :D
-->



<!-- PROJECT SHIELDS -->
<!--
*** I'm using markdown "reference style" links for readability.
*** Reference links are enclosed in brackets [ ] instead of parentheses ( ).
*** See the bottom of this document for the declaration of the reference variables
*** for contributors-url, forks-url, etc. This is an optional, concise syntax you may use.
*** https://www.markdownguide.org/basic-syntax/#reference-style-links
-->
[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]
[![MIT License][license-shield]][license-url]
[![LinkedIn][linkedin-shield]][linkedin-url]



<!-- PROJECT LOGO -->
<br />
<div align="center">
  <a href="https://github.com/othneildrew/Best-README-Template">
    <img src="content/images/Logo-GFC-Pharma.jpg" alt="Logo" >
  </a>

  <h3 align="center">Best-README-Template</h3>

  <p align="center">
    An awesome README template to jumpstart your projects!
    <br />
    <a href="https://github.com/othneildrew/Best-README-Template"><strong>Explore the docs »</strong></a>
    <br />
    <br />
    <a href="https://github.com/othneildrew/Best-README-Template">View Demo</a>
    ·
    <a href="https://github.com/othneildrew/Best-README-Template/issues">Report Bug</a>
    ·
    <a href="https://github.com/othneildrew/Best-README-Template/issues">Request Feature</a>
  </p>
</div>



<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table des matières</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
    <li><a href="#roadmap">Roadmap</a></li>
    <li><a href="#contributing">Contributing</a></li>
    <li><a href="#license">License</a></li>
    <li><a href="#contact">Contact</a></li>
    <li><a href="#acknowledgments">Acknowledgments</a></li>
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## Informations


Voici un site Web d'information réalisé pour un groupement de Pharmaciens permettant de créer différents membres, les gérer, créer des newsletters, etc ...

Attention : Le système de mail ne fonctionne pas due à une récente mis à jour empêchant l'utilisation de PHPMailer.
Veuillez changer les fonctions de mails en utilisant un le système de Mail de votre hébergeur, celles-ci présentes dans le fichier "sendMails.inc.php" dans le dossier "includes"et sont utilisées dans les fichiers suivants
- membre-contr.class.php  ( ligne 75 )
- newsletter-contr.class.php ( ligne 66 ) 
- resetpassword-contr.class.php ( ligne 41 ) 
- contact.inc.php ( ligne 27 )

De nombreuses pages de membres ne sont obsolètes car elles ont servis de test, les prochains membres que vous créerez n'auront pas de problèmes.

<p align="right">(<a href="#top">back to top</a>)</p>

### Contributeurs

- Setha77 : Chef de Projet : https://github.com/Setha77
- dalek63 : Développeur Back-end :  https://github.com/dalek63     
- Gianny_Pny : Développeur Front-end : https://github.com/GiannyPontat

### Built With

Voici les différents langages, outils et librairies utilisés.

* [PHP](https://www.php.net/)
* [HTML/CSS](https://html.com/)
* [Javascript](https://www.javascript.com/)
* [MySql](https://www.mysql.com/fr/)
* [JQuery](https://jquery.com)

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- GETTING STARTED -->
## Getting Started

Voici un exemple expliquant comment mettre en place le site Web.

### Prérequis
Pour cet exemple, voici les outils nécessaires :
* php 
* phpMyAdmin
* mysql
* xampp

### Installation

Si vous utilisez git : 

1. Cloner le repo
   ```sh
   git clone https://github.com/dalek63/gfcpharma.git
   ```
2. N'oubliez pas de créer la base de données.

3. Configurez vos données dans le fichier "dbh.class.php" dans le dossier "classes".

4. Lancer votre serveur local avec Xampp.

5. Ecrire "localhost/gfcpharma" dans votre navigateur.

6. Changer les paragraphes et informations des pages publiques.

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- ROADMAP -->
## Amélirations possibles

- [ ] Changer les fonctions de Mail 
- [ ] Améliorer le CSS 
- [ ] Se renseigner sur des améliorations pour la sécurité
- [ ] Ajouter liens permettant de se dirirger vers des rubriques dans la page dans la page "gfc.php"
- [ ] Ajouter des fonctions en Ajax
- [ ] Améliorer les formats des images utilisées.

Contactez setha_hong77@hotmail.com par mail si vous avez des questions.

<p align="right">(<a href="#top">back to top</a>)</p>


<!-- LICENSE -->
## License

Distributed under the MIT License. See `LICENSE.txt` for more information.

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- CONTACT -->
## Contact

Chef de projet - setha_hong77@hotmail.com


Project Link: https://github.com/dalek63/gfcpharma

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- ACKNOWLEDGMENTS -->
## Acknowledgments

Use this space to list resources you find helpful and would like to give credit to. I've included a few of my favorites to kick things off!

* [Choose an Open Source License](https://choosealicense.com)
* [GitHub Emoji Cheat Sheet](https://www.webpagefx.com/tools/emoji-cheat-sheet)
* [Malven's Flexbox Cheatsheet](https://flexbox.malven.co/)
* [Malven's Grid Cheatsheet](https://grid.malven.co/)
* [Img Shields](https://shields.io)
* [GitHub Pages](https://pages.github.com)
* [Font Awesome](https://fontawesome.com)
* [React Icons](https://react-icons.github.io/react-icons/search)

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[contributors-shield]: https://img.shields.io/github/contributors/othneildrew/Best-README-Template.svg?style=for-the-badge
[contributors-url]: https://github.com/othneildrew/Best-README-Template/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/othneildrew/Best-README-Template.svg?style=for-the-badge
[forks-url]: https://github.com/othneildrew/Best-README-Template/network/members
[stars-shield]: https://img.shields.io/github/stars/othneildrew/Best-README-Template.svg?style=for-the-badge
[stars-url]: https://github.com/othneildrew/Best-README-Template/stargazers
[issues-shield]: https://img.shields.io/github/issues/othneildrew/Best-README-Template.svg?style=for-the-badge
[issues-url]: https://github.com/othneildrew/Best-README-Template/issues
[license-shield]: https://img.shields.io/github/license/othneildrew/Best-README-Template.svg?style=for-the-badge
[license-url]: https://github.com/othneildrew/Best-README-Template/blob/master/LICENSE.txt
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://linkedin.com/in/othneildrew
[product-screenshot]: images/screenshot.png