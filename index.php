<?php
/*



















*/

if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
{
    $url = "https";
}
else
{
    $url = "http"; 
}  
$url .= "://"; 
$url .= $_SERVER['HTTP_HOST']; 
$url .= $_SERVER['REQUEST_URI']; 

if($url == 'http://localhost/Site_Actigroup/' or $url == 'http://localhost/Site_Actigroup/index.php')
{
    header("Refresh:0; url=index.php?lang=en_US");  
}


session_start();

require('controllerFrontEnd.php');
require_once("Trad.php");






//première visite
if (!isset($_SESSION['visiteur'])){
    $_SESSION['visiteur'] = true;
    ajouterVisiteur();//ajouter un visiteur au nobre total des visiteurs
}
//les pages demandés
if (isset($_GET['page'])){
    if($_GET['page'] == 'qui-sommes-nous'){
        $produits = getProduits(); //c'est les noms des produits
        require('about.php');
    }
    elseif($_GET['page'] == 'governance'){
        $produits = getProduits();
        require('governance.php');
    }
    elseif($_GET['page'] == 'lesEntites'){
        $produits = getProduits();
        require('lesEntites.php');
    }
    elseif($_GET['page'] == 'histoire'){
        $produits = getProduits();
        require('histoire.php');
    }
    elseif($_GET['page'] == 'implantations'){
        $produits = getProduits();
        require('implantations.php');
    }
    //les actualités
    elseif($_GET['page'] == 'actualites'){
        if(isset($_GET['numeroPage'])){
            afficherActualites($_GET['numeroPage']);
        }
        else{
            afficherActualites(1);
        }
    }
    elseif($_GET['page'] == 'actualite-unique'){
        if(isset($_GET['id'])){
            afficherActualiteDetail($_GET['id']);
        }
        else{
            afficherActualites(1);
        }
    }
    //les événements
    elseif($_GET['page'] == 'evenements'){
        if(isset($_GET['numeroPage'])){
            afficherEvents($_GET['numeroPage']);
        }
        else{
            afficherEvents(1);
        }
    }
    elseif($_GET['page'] == 'solution-unique'){
        if(isset($_GET['id'])){
            afficherDetailsSolution($_GET['id']);
        }
        else{
            afficherAccueil();//si id n'est pas dans l URL on affiche l'accueil
        }
    }
    elseif($_GET['page'] == 'solutions'){
        $produits = getProduits();
        require('solutions/services.php');
    }

    //expertise
    //-ingénierie
    elseif($_GET['page'] == 'ingenierie'){
        $produits = getProduits();
        require('expertises/Ingenierie/ingenierie.php');
    }
    elseif($_GET['page'] == 'calculMecanique'){
        $produits = getProduits();
        require('expertises/Ingenierie/calculMecanique.php');
    }
    elseif($_GET['page'] == 'conceptionMecanique'){
        $produits = getProduits();
        require('expertises/Ingenierie/conceptionMecanique.php');
    }
    elseif($_GET['page'] == 'securiteErgonomie'){
        $produits = getProduits();
        require('expertises/Ingenierie/securiteErgonomie.php');
    }
    elseif($_GET['page'] == 'ACE'){
        $produits = getProduits();
        require('expertises/Ingenierie/ACE.php');
    }
    elseif($_GET['page'] == 'RC'){
        $produits = getProduits();
        require('expertises/Ingenierie/RC.php');
    }
    //-fabrication
    elseif($_GET['page'] == 'fabrication'){
        $produits = getProduits();
        require('expertises/fabrication/fabrication.php');
    }
    elseif($_GET['page'] == 'usinagePrecision'){
        $produits = getProduits();
        require('expertises/fabrication/usinagePrecision.php');
    }
    elseif($_GET['page'] == 'chaudronnerie'){
        $produits = getProduits();
        require('expertises/fabrication/chaudronnerie.php');
    }
    elseif($_GET['page'] == 'assemblage'){
        $produits = getProduits();
        require('expertises/fabrication/assemblage.php');
    }
    elseif($_GET['page'] == 'controleQualite'){
        $produits = getProduits();
        require('expertises/fabrication/controleQualite.php');
    }
    //autres
    elseif($_GET['page'] == 'conduiteProjet'){
        $produits = getProduits();
        require('expertises/conduiteProjet.php');
    }
    elseif($_GET['page'] == 'MCO'){
        $produits = getProduits();
        require('expertises/MCO.php');
    }
    elseif($_GET['page'] == 'rechercheDeveloppement'){
        $produits = getProduits();
        require('expertises/rechercheDeveloppement.php');
    }

    //réalisations 
    //tous les realisations
    elseif($_GET['page'] == 'realisations'){
        afficherRealisations();
    }
    //une seule réalisation
    elseif($_GET['page'] == 'realisation-unique'){
        if(isset($_GET['id'])){
            afficherDetailsRealisation($_GET['id']);
        }
        else{
            afficherRealisations();
        }
    }


    //-Engagement
    elseif($_GET['page'] == 'securite'){
        $produits = getProduits();
        require('engagements/securite.php');
    }
    elseif($_GET['page'] == 'qualite'){
        $produits = getProduits();
        require('engagements/qualite.php');
    }
    elseif($_GET['page'] == 'innovation'){
        $produits = getProduits();
        require('engagements/innovation.php');
    }
    elseif($_GET['page'] == 'responsabilite'){
        $produits = getProduits();
        require('engagements/responsabilite.php');
    }
    elseif($_GET['page'] == 'certifications'){
        $produits = getProduits();
        require('engagements/certifications.php');
    }

    //-carrière
    elseif($_GET['page'] == 'carriereActiGroup'){
        $produits = getProduits();
        require('carrieres/carriereActiGroup.php');
    }
    elseif($_GET['page'] == 'rejoindreNotreGroupe'){
        $produits = getProduits();
        require('carrieres/rejoindreNotreGroupe.php');
    }
    //offres d'emploi
    elseif($_GET['page'] == 'offresEmploi'){
        if(isset($_GET['numeroPage'])){
            afficherLesOffres($_GET['numeroPage']);//afficher les offres de cette page
        }
        else{
            afficherLesOffres(1);
        }
    }
    //details d'un offre d'emploi
    elseif($_GET['page'] == 'offreDetails'){
        if(isset($_GET['id'])){
            afficherDetailsOffre($_GET['id']);//afficher les deails de l'offre
        }
        else{
            afficherLesOffres(1);
        }
    }
    //----> candidature pour un offre donné
    //affichage formulaire
    elseif($_GET['page'] == 'postulerOffre'){
        if(isset($_GET['id'])){
            postulerPourOffre($_GET['id']);//postuler pour l'offre id
        }
        else{
            afficherLesOffres(1);
        }
    }
    //efectuer la candidature
    elseif($_GET['page'] == 'candidatureOffre'){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            ajouterCandidature($_POST['idOffre'],$_POST['civilite'],$_POST['prenom'],$_POST['nom'],$_POST['adress'],$_POST['telephone'],$_POST['email'],$_POST['mobilite'],$_POST['commentaire'],$_POST['g-recaptcha-response']);//postuler pour l'offre id_offre
        }
        else{
            afficherLesOffres(1);
        }        
    }
    //candidature spontanée
    elseif($_GET['page'] == 'candidatureSpontanee'){
        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['action']) && $_GET['action'] =='postuler'){
            ajouterCandidatureSpont($_POST['civilite'],$_POST['prenom'],$_POST['nom'],$_POST['adress'],$_POST['telephone'],$_POST['email'],$_POST['fonction'],$_POST['mobilite'],$_POST['commentaire'],$_POST['g-recaptcha-response']);
        }
        else{
            $produits = getProduits();
            $messageAfficheError = '';
            $messageAfficheSuccess = '';
            require('carrieres/candidatureSpontanee.php');
        }
    }
    //contact
    elseif($_GET['page'] == 'contact'){
        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['action']) && $_GET['action'] =='ajouterMessage'){
            ajouterMessage($_POST['name'],$_POST['email'],$_POST['subject'],$_POST['message'],$_POST['g-recaptcha-response']);
        }
        else{
            $produits = getProduits();
            $messageAfficheError = '';
            $messageAfficheSuccess = '';
            require('contact.php');
        }  
    }
    
    else{
        afficherAccueil(); //page d'accueil, si l'action n'est pas reconnue
    }
}
else{
    afficherAccueil(); //page d'accueil, si y a pas d'action
}