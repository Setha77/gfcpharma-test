<?php
include_once '../classes/vue/membre-vue.class.php';
include_once '../classes/vue/labo-vue.class.php';
include_once '../classes/vue/newsletter-vue.class.php';
include_once '../classes/vue/historique-vue.class.php';
include_once 'functions.inc.php';

function affichetab(){
        
        $m = new Membrevue();

        $membres = $m->showMembres();
        


        for ($i = 0; $i < sizeof($membres); $i++){

        echo '
            <tr>
                            
                            <td>'.$membres[$i]['nom'].'</td>
                            <td>'.$membres[$i]['prenom'].'</td>
                            <td>'.$membres[$i]['email'].'</td>
                            <td>'.$membres[$i]['adresseP'].'</td>
                            <td>'.$membres[$i]['telP'].'</td>
                            <td>'.role($membres[$i]['isAdmin']).'</td>
                            <td>'.statut($membres[$i]['isActif']).'</td>
                            
                            <td>    
                                <form action="../includes/delete.inc.php?email=' . $membres[$i]['email'] . '" method="post" onsubmit="return confirm(`Etes vous sûr de vouloir supprimer ce compte ?`);">
                                    <button type="button" onclick="location.href=`../rubriques/editAdmin.php?email=' . $membres[$i]['email'] . '`"   ><i class="fa-solid fa-pen"></i></button>
                                
                                    <button class="poubelle" type="submit" name="delete" ><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
            </tr>
            ';
        }

}
function afficheMembres(){

            
    $m = new Membrevue();

    $membres = $m->showMembres();
    


    for ($i = 0; $i < sizeof($membres); $i++){
    
    if($membres[$i]["image"]==null){
        $img="images/1024px-Circle-icons-profile.svg.png";
    }
    else{
        $img='profile/'.$membres[$i]["image"];
    }
    if($membres[$i]["isActif"]==1){
    echo '        
        <div class="membres-top">
            <div class="banner-img"></div>
            <img src="../content/'.$img.'" alt="profile image" class="profile-image">
            <h1 class="name">'.$membres[$i]["prenom"].' '.$membres[$i]["nom"].'</h1>
            <a href="membres/'.$membres[$i]["fileid"].'.member.php"> <button class="btns">Détails</button> </a>
        </div>
    ';
    }

    }

}

function afficheLabos(){

            
    $l = new Labovue();

    $labos = $l->showLabos();
    


    for ($i = 0; $i < sizeof($labos); $i++){
    
    if($labos[$i]["logo"]==null){
        $img="images/1024px-Circle-icons-profile.svg.png";
    }else{
        $img='labo/'.$labos[$i]["logo"];
    }

    echo '        
        <div class="swiper-slide card">
            <div class="card-content">
                <div class="image">
                    <img src="../content/'.$img.'" alt="">
                </div>
                <div class="laboratoire">
                    <h1 class="name-labo">'.$labos[$i]["nom"].'</h1>
                </div>
            </div>
        </div>
    ';


                    

    }

}

function afficheTabLabo(){

    $l = new Labovue();

        $labo = $l->showLabos();
        


        for ($i = 0; $i < sizeof($labo); $i++){

        echo '
            <tr>
                            
                            <td>'.$labo[$i]['nom'].'</td>
                            <td><img src="../content/labo/'.$labo[$i]['logo'].'" height="150" width="200" ></td>
                            
                            <td>    
                                <form action="../includes/delete.inc.php?nom=' . $labo[$i]['nom'] . '" method="post" onsubmit="return confirm(`Etes vous sûr de vouloir supprimer ce partenaire ?`);">


                                    <button class="poubelle" type="submit" name="delete" ><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
            </tr>
            ';
        }
}


function afficheTabNews(){

    $n = new Newsvue();

        $news = $n->showNews();
        


    for ($i = 0; $i < sizeof($news); $i++){

        $author=$n->showAuthor($news[$i]['titre']);
        
        if($news[$i]['isValid']==0){

        

        echo '
            <tr>
                            
                            <td>'.$author[0]['prenom'].$author[0]['nom'].'</td>
                            <td>'.$news[$i]['titre'].'</td>
                            <td>'.$news[$i]['date'].'</td>
                            <td>'.visibility($news[$i]['isPublic']).'</td>

                            <td><button onclick="location.href=`../rubriques/newsletters/'.$news[$i]['fileid'].'.news.php`;"><i class="fa-solid fa-eye valid"></i></button></td>



                            <td>    
                                <form action="../includes/newsletter.inc.php?nom=' . $news[$i]['titre'] . '" method="post" onsubmit="return confirm(`Etes vous sûr de vouloir envoyer cette newsletter ?`);">                               
                                     <button type="submit" name="validate"><i class="fa-solid fa-square-check valid"></i></button>
                                </form>
                                <form action="../includes/newsletter.inc.php?nom=' . $news[$i]['titre'] . '" method="post" onsubmit="return confirm(`Etes vous sûr de vouloir supprimer cette newsletter ?`);">                        
                                    <button class="poubelle" type="submit" name="delete" ><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>


            </tr>
            ';
        }
    }

}


function affichetablogs(){
        
    $l = new Historiquevue();

    $logs = $l->showHistorique();
    


    for ($i = sizeof($logs)-1; $i >= 0; $i--){

    echo '
        <tr>             
                        <td>'.$logs[$i]['date'].'</td>
                        <td>'.$logs[$i]['action'].'</td>
                        <td>'.$logs[$i]['nom'].'</td>
                        <td>'.$logs[$i]['auteur'].'</td>
        </tr>
        ';
    }

}



        





