/*$(document).ready(function () {
    
    function fetchData() {
        let value = $("#recherche").val();

        if(value == ''){
            $('#table-head').css('display', 'none');

        }
        $.post("")
    }
})*/






function search(array, element){


    let bigelement = element.toUpperCase()

    let names = array.filter(el => el["nom"].toUpperCase().includes(bigelement))
    let surnames = array.filter(el => el["prenom"].toUpperCase().includes(bigelement))
    let emails = array.filter(el => el["email"].toUpperCase().includes(bigelement))

    
    results = names.concat(surnames).concat(emails);
  
    table = document.getElementById("table");
    tr = table.getElementsByTagName("tr");
    
    for (i = 0; i < tr.length; i++) {
        
        td = tr[i].getElementsByTagName("td")[0];

        
        if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(bigelement) > -1) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
        }
    }
}

function searchlabo(array, element){


    let bigelement = element.toUpperCase()

    let names = array.filter(el => el["nom"].toUpperCase().includes(bigelement))

    
    results = names
  
    table = document.getElementById("table");
    tr = table.getElementsByTagName("tr");
    
    for (i = 0; i < tr.length; i++) {
        
        td = tr[i].getElementsByTagName("td")[0];

        
        if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(bigelement) > -1) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
        }
    }
}


function searchlog(array, element){


    let bigelement = element.toUpperCase()

    let names = array.filter(el => el["auteur"].toUpperCase().includes(bigelement))

    
    results = names
  
    table = document.getElementById("table");
    tr = table.getElementsByTagName("tr");
    
    for (i = 0; i < tr.length; i++) {
        
        td = tr[i].getElementsByTagName("td")[3];

        
        if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(bigelement) > -1) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
        }
    }
}
/*
	//Ajout liste
	$('#ImprimerEtiquetteBoutonOTC').click(function() {
		$.ajax({                                      
		url: 'AndroidStock.php',
		type : 'GET',		  
		data: 'Commande=Etiquette&Operateur=Autre&Modele=OTC&CodeInterne='+$('#CodeInterne').text(), 
		cache    : false,
		dataType: 'html',  
		success: function(data)
		{
            alert data;
            $("#Message").text()="Message envoyé"
            $("#Message").show().delay(3000).fadeOut();
		} 
		});		
	});	

    //dans la page php
    if ($_GET['Commande']=="Etiquette") {
        //requette sql

        echo "Ok"
    }
    */