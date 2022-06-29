<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple newsletter</title>
    <style>
        *{
            margin: 0 auto;
            padding-top: 5px;
        }
        body{
            background-color: aquamarine;
            max-width: 1000px;
        }
        
        #logo{
            width: 100%;
            height: auto;
            background-color: white;
        }
        #logo img{
            max-width: 30%;
            padding-left: 35%;
            overflow: hidden;
            
        }
        #wrapper .banner{
            width: 100%;
        }
        .banner img{
            width: 100%;
            overflow: hidden;
        }
        .one-col{
            width: 100%;
            height: auto;
            line-height: 30px;
            background-color: white;
        }
        footer{
            width: 100%;
            height: auto;
            background: yellowgreen;
        }
        #contact{
            list-style-type: none;
            line-height: 20px;
        }
        
        .button-right{
            height: 45px;
            width: min-content;
            /*margin-left: 10%;*/
            display: flex;   
        }
        .button-right input{
            height: 100%;
            width: 100%;
            outline: none;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            font-weight: 500;
            letter-spacing: 1px;
            background: #83a4ff;
        }
        .button-right input:hover{
            background: rgb(247, 150, 150);
        }

        
    </style>
</head>
<body>
    <div id="wrapper">
        <header>
            <div id="logo" >
                <img src="./images/Logo-GFC-Pharma.jpg" alt="">
            </div>
        </header>
        <div class="banner" >
            <img src="./images/médecine-bannière-de-pharmacie-médicaments-et-fond-pilules-illustration-vecteur-125966392.jpg" alt="">
        </div>
    </div>
    <div class="one-col">
        <h1></h1>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
            Etiam nec odio nisl. Ut vehicula vel dui eget imperdiet. 
            Pellentesque bibendum vitae mi non aliquet. 
            Curabitur tempus interdum odio id rhoncus. 
            Pellentesque habitant morbi tristique senectus et 
            netus et malesuada fames ac turpis egestas. Mauris id 
            auctor quam. Cras pellentesque dictum augue, 
            ac hendrerit erat gravida suscipit. 
            Aenean lacinia vulputate nibh. Duis ex arcu, 
            consectetur nec lorem nec, sodales malesuada risus. 
        </p>
    </div>
    <footer>
        <ul id="contact">
            <li>1 PROMENADE DU BELVEDERE - 77200 - Torcy</li>
            <li>gfcpharma.coop@gmail.com</li>
            <li>TEL : +33 0 00 00 00 00</li>
            <li>FAX : +33 0 00 00 00 00</li>
        </ul>
    </footer>
    <div class="button-right">
        <input type="submit" placeholder="Modifier" value="Se désinscrire">
    </div>
</body>
</html>