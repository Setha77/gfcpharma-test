<?php
include_once 'classes/vue/newsletter-vue.class.php';

function afficheActu(){
        
        $n = new Newsvue();
    
        $news = $n->showNews();
        
        
    
        for ($i = sizeof($news)-1; $i >= 0; $i--){
            
            if ($news[$i]["isPublic"]==1 && $news[$i]["isValid"]==1){
                $img='newsletter/'.$news[$i]["img"];
                $titre=$news[$i]["titre"];
                $contenu=$news[$i]["contenu"];
                $path='rubriques/newsletters/'.$news[$i]["fileid"].'.news.php';
                break;
            }
            else{
                $img='images/im2.jpg';
                $titre='Bonjour';
                $contenu='Aucune Actualité !';
                $path='index.php';
            }
        }
    
        echo '
            <section class ="actualite-container" id="actualite">
            <div class="actualite-img">
                    <img src="content/'.$img.'" width="300" height="400" > </div>
                    <div class="actualite-text">
                        <span>Actualités</span>
                        <h2>'.$titre.'</h2>
                        <p>'.$contenu.'</p>
                        <a href="'.$path.'" class="btn">En savoir plus</a>
                    </div>
                </div> 
            </section>  
            ';
        
    
    }