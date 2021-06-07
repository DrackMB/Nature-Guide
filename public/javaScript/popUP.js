/// --------------- popup -----------------

// Obtenir le modal
var modal = document.getElementById("myModal");

// Obtenez le bouton qui ouvre la modale connecter
var btnModelConnecter = document.getElementById("connecter");
// Obtenez le bouton qui ouvre la modale inscription
var btnModelInscription = document.getElementById("Inscription");

// Récupérer l’élément <span> qui ferme la modale
var span = document.getElementsByClassName("close")[0];

//  Récupérer l’élément <div> pour afficher le view
var content = document.getElementById("popup");

var emojibtn = document.querySelector('.emoji-btn');

var navbarElement = document.getElementById("listGlobal");
let connecterID = 0;
var z = 0 
var checkConnecter = 0 ;  
//


btnModelInscription.addEventListener("click",function(){
  modal.style.display = "block";
  var xhr = new XMLHttpRequest();
    //On initialise notre requête avec open()
    xhr.open("GET", "inscription", true);
    xhr.send();
    xhr.onload = function(){
    if (xhr.status == 200){
        var reponse = xhr.response;
        console.log(reponse);
        var element = document.createElement("div");
        element.classList.add("form-group");
        element.setAttribute("id", "content");
        element.innerHTML= reponse;
        content.appendChild(element);
        var btnInscrire = document.getElementById("inscrire"); 
        btnInscrire.addEventListener("click",inscrires);
        z= 2;
        checkConnecter = 1;
    } 
    else{
        console.log('Impossible de récupérer la demande Ajax !');
    }
    }
}) ;

// Lorsque l’utilisateur clique sur le bouton Connecter, ouvrez le modal
btnModelConnecter.addEventListener("click",function(){
  modal.style.display = "block";
  var xhr = new XMLHttpRequest();
    //On initialise notre requête avec open()
    xhr.open("GET", "connecter", true);
    xhr.send();
    xhr.onload = function(){
    if (xhr.status == 200){
        var reponse = xhr.response;
        console.log(reponse);
        var element = document.createElement("div");
        element.classList.add("form-group");
        element.setAttribute("id", "content");
        element.innerHTML= reponse;
        content.appendChild(element); 
        var btnConnecte = document.getElementById("connecterPopUP");
        btnConnecte.addEventListener("click",connecter);
        z =  1;
    } 
    else{
        console.log('Impossible de récupérer la demande Ajax !');
    }
    }
}) ;

// Lorsque l’utilisateur clique sur <span> (x), fermer le mode
span.addEventListener("click",function(){
    modal.style.display = "none";
    if(z == 1 ){
      document.getElementById("connecterPopUP").removeEventListener('click',connecter);
      document.getElementById("content").remove();
    }else if(z ==2 ){
      document.getElementById("inscrire").removeEventListener('click',inscrires);
      document.getElementById("content").remove();
    } 
}) ;

// Lorsque l’utilisateur clique n’importe où en dehors du modal, le ferme
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
    if(z == 1 ){
      document.getElementById("connecterPopUP").removeEventListener('click',connecter);
      document.getElementById("content").remove();
    }else if(z ==2 ){
      document.getElementById("inscrire").removeEventListener('click',inscrires);
      document.getElementById("content").remove();
    }
    
  }
}

// fucntion pour connecter au compte 
function connecter(){
    var pseudo = document.getElementById("pseudo");
    var motDePasse = document.getElementById("motDePasse");
    var tempsPseudo = pseudo.value;
    var tempsmotDePasse = motDePasse.value;
    var pagePost = "connecterMembre";
    //console.log(temp);
    var formDatas = new FormData();
    formDatas.append('pseudo',tempsPseudo );
    formDatas.append('motDePasse',tempsmotDePasse);
    var listConnecter = document.getElementById("listConnecter");
    var listInscription = document.getElementById("listInscription");
    // Appeler la fonction requetPost
    var xhr = new XMLHttpRequest();
    //On initialise notre requête avec open()
    xhr.open("POST", pagePost, true);
    xhr.send(formDatas);
    xhr.onload = function(){
    if (xhr.status == 200){
        var reponse = xhr.response;
        connecterID = reponse;
        if(connecterID>0){
          z=0;
          checkConnecter = 1 ;
          modal.style.display = "none";

          document.getElementById("content").remove();

          document.getElementById("listConnecter").remove();

          document.getElementById("listInscription").remove();

          var element = document.createElement("li");
          var elements = document.createElement("a");
          element.classList.add("nav-item");
          elements.classList.add("nav-link");
          elements.innerHTML="deconnecter";
          element.setAttribute("id", "listdeconnecter");
          element.appendChild(elements);
          navbarElement.appendChild(element); 

          var deconnecter = document.getElementById("listdeconnecter");
          deconnecter.addEventListener("click",function(){
            var page = "deconnecter";
            var xhr = new XMLHttpRequest();
            //On initialise notre requête avec open()
            xhr.open("GET", page, true);
            xhr.send();
            xhr.onload = function(){
            if (xhr.status == 200){
                var reponse = xhr.response;
                console.log(reponse);
                if(reponse > 0){
                  checkConnecter = 0;
                  document.getElementById("listdeconnecter").remove();
                  navbarElement.appendChild(listConnecter);
                  navbarElement.appendChild(listInscription);
                }
            } 
            else{
                console.log('Impossible de récupérer la demande Ajax !');
            }
            }
    }) ;
          
    } 
    else{
      console.log('Impossible de récupérer la demande Ajax !');
    } 
    }
    
}   
}


// pour inscrire
function inscrires(){
    var pseudo = document.getElementById("pseudoIN");
    var motDePasse = document.getElementById("motDePasseIN");
    var confirmationMotDePass= document.getElementById("confirmerMotDePasseIN");
    if(motDePasse.value == confirmationMotDePass.value ){
      var tempsPseudo = pseudo.value;
      var tempsmotDePasse = motDePasse.value;
      var pagePost = "inscriptionMembre";
      //console.log(temp);
      var formDatas = new FormData();
      formDatas.append('pseudo',tempsPseudo );
      formDatas.append('motDePasse',tempsmotDePasse);

      var listConnecter = document.getElementById("listConnecter");
      var listInscription = document.getElementById("listInscription");
      // Appeler la fonction requetPost
      var xhr = new XMLHttpRequest();
      //On initialise notre requête avec open()
      xhr.open("POST", pagePost, true);
    xhr.send(formDatas);
    xhr.onload = function(){
    if (xhr.status == 200){
        var reponse = xhr.response;
        connecterID = reponse;
        if(connecterID>0){
          z=0;
          checkConnecter = 1;

          modal.style.display = "none";

          document.getElementById("content").remove();

          document.getElementById("listConnecter").remove();

          document.getElementById("listInscription").remove();

          var element = document.createElement("li");
          var elements = document.createElement("div");
          element.classList.add("nav-item");
          elements.classList.add("nav-link");
          elements.innerHTML="deconnecter";
          element.setAttribute("id", "listdeconnecter");
          element.appendChild(elements);
          navbarElement.appendChild(element);

          var deconnecter = document.getElementById("listdeconnecter");
          deconnecter.addEventListener("click",function(){
            var page = "deconnecter";
            var xhr = new XMLHttpRequest();
            //On initialise notre requête avec open()
            xhr.open("GET", page, true);
            xhr.send();
            xhr.onload = function(){
            if (xhr.status == 200){
                var reponse = xhr.response;
                console.log(reponse);
                if(reponse > 0){
                  checkConnecter = 0;
                  document.getElementById("listdeconnecter").remove();
                  navbarElement.appendChild(listConnecter);
                  navbarElement.appendChild(listInscription);
                }
            } 
            else{
                console.log('Impossible de récupérer la demande Ajax !');
            }
            }
    }) ;
          
    } 
    
      }else{
        console.log('Impossible de récupérer la demande Ajax !');
      } 
      
  }
  }
}


// Vérifier si un utilisateur a connecté, si oui ont activé l'input et le button d'envoyer et emoji ....
setInterval(checkConnecters, 1);
function checkConnecters(){
  if(checkConnecter == 1){
     document.getElementById("btn").disabled = false;
     document.getElementById("msgInput").disabled= false;
     emojibtn.classList.remove("disabled");
  }
  else if(checkConnecter == 0){
     document.getElementById("btn").disabled = true;
     document.getElementById("msgInput").disabled= true;
     emojibtn.classList.add("disabled");
     emojibtn.classList.remove("open");
  }
}

  // update le champ LastAction dans le tableau membres
setInterval(updatLastAction, 1000);
function updatLastAction(){
  if(checkConnecter == 1){ 
    var URLpage = "updatLastAction";
    var xhr = new XMLHttpRequest();
    //On initialise notre requête avec open()
    xhr.open("POST", URLpage, true);
    xhr.send();
    xhr.onload = function(){
    if (xhr.status == 200){
        var reponse = xhr.response;
        console.log(reponse);  
    } 
    else{
        console.log('Impossible de récupérer la demande Ajax !');
  }
}
  }else console.log("No One Connected");
  

}


// Récupérer la liste des membres connecter
setInterval(getLastConnectedUser, 3000);
function getLastConnectedUser(){
  var URLpage = "userConnected";
  var xhr = new XMLHttpRequest();
    //On initialise notre requête avec open()
    xhr.open("GET", URLpage, true);
    xhr.send();
    xhr.onload = function(){
    if (xhr.status == 200){
        var reponse = xhr.response;
        console.log(reponse);
        var element = document.getElementById("listeMembre");
        element.innerHTML= reponse;
    } 
    else{
        console.log('Impossible de récupérer la demande Ajax !');
    }
    }
}


//document.addEventListener("DOMContentLoaded", ready);

  ready();
function ready(){
  var page = "checkConnected";
  var xhr = new XMLHttpRequest();
    //On initialise notre requête avec open()
    xhr.open("GET", page, true);
    xhr.send();
    xhr.onload = function(){
    if (xhr.status == 200){
        var reponse = xhr.response;
        console.log(reponse);
        if(reponse > 0){
          checkConnecter = 1; 
          var listConnecter = document.getElementById("listConnecter");
          var listInscription = document.getElementById("listInscription");

          document.getElementById("listConnecter").remove();

          document.getElementById("listInscription").remove();

          var element = document.createElement("li");
          var elements = document.createElement("div");
          element.classList.add("nav-item");
          elements.classList.add("nav-link");
          elements.innerHTML="deconnecter";
          element.setAttribute("id", "listdeconnecter");
          element.appendChild(elements);
          navbarElement.appendChild(element);
          
          var deconnecter = document.getElementById("listdeconnecter");
          deconnecter.addEventListener("click",function(){
            var page = "deconnecter";
            var xhr = new XMLHttpRequest();
            //On initialise notre requête avec open()
            xhr.open("GET", page, true);
            xhr.send();
            xhr.onload = function(){
            if (xhr.status == 200){
                var reponse = xhr.response;
                console.log(reponse);
                if(reponse > 0){
                  checkConnecter = 0;
                  document.getElementById("listdeconnecter").remove();
                  navbarElement.appendChild(listConnecter);
                  navbarElement.appendChild(listInscription);
                }
            } 
            else{
                console.log('Impossible de récupérer la demande Ajax !');
            }
            }
    }) ;
        }
    } 
    else{
        console.log('Impossible de récupérer la demande Ajax !');
    }
    }
}
