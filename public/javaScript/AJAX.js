





//--------------Requete GET : method GET  (récupérer les données d'une base de données)---------------
 function requetGET(URLpage){
    var xhr = new XMLHttpRequest();
    //On initialise notre requête avec open()
    xhr.open("GET", URLpage, true);
    xhr.send();
    xhr.onload = function(){
    if (xhr.status == 200){
        var reponse = xhr.response;
      // convertir la réponse string "Php" en JSON
      if(reponse!= 0){
        var json = JSON.parse(reponse);
        console.log(reponse);
        var element = document.createElement("div");
        element.innerHTML= json.message+" "+ json.date + " By "+ json.pseudo;
        element.classList.add('msgRight');
        messages.appendChild(element);
      }else console.log(reponse);
        
    } 
    else{
        console.log('Impossible de récupérer la demande Ajax !');
    }
    }
}
//--------------requete POST (envoyer les données aux base de données)---------------
 function requetPOST (URLpage,data){
    var xhr = new XMLHttpRequest();
    //On initialise notre requête avec open()
    xhr.open("POST", URLpage, true);
    xhr.send(data);
    xhr.onload = function(){
    if (xhr.status == 200){
        var reponse = xhr.response;
        console.log(reponse);
        return reponse;
    } 
    else{
        console.log('Impossible de récupérer la demande Ajax !');
    }
    
    }
}
// -----------------------------------------------------------------------------------------------------
// ------------------ Déclaration des variables ----------------------------------------------------
var btnEnvoyer = document.getElementById("btn");

var msg = document.getElementById("msgInput");

// initialisation de variable msgEcrire avec l'attribut de la balise qui le msg 'Ecrire ...'  
var msgEcrire = document.getElementById("Ecrire");


// initialisation de variable msgRecu avec l'attribut de la balise qui le msg 'msg recu'  
var msgRecu = document.getElementById("recu");

/// la balise des emogies
var msgEmoji = document.getElementsByClassName("emogi");

// la grand zone qui affiche tout les msg 
var messages = document.getElementById("id");

// variable temporaire
var temp ;

var emojibtn = document.querySelector('.emoji-btn');

var emojiwrapper = document.querySelector('.emoji-wrapper')


//------------------------------------------------------------------------------------------------------

  
  //------- Ajouter emojie à l'input --------
  for (var i=12;i<90;i++){
    var element = document.createElement("span");
          element.innerHTML= "&#"+1285+i+";";
          element.classList.add('emogi');
          emojiwrapper.appendChild(element); 
   }
  // ajouter un evenement a toutes les emojies 
  for(var i=0;i<msgEmoji.length;i++){
    msgEmoji[i].addEventListener("click", addEmoji);
    }
  // la focntion d'ajouter l emogies dans l'input
function addEmoji(){
  var temp2 = msg.value;
  var msgs =temp2+this.innerText;
  msg.value=msgs
} 

/*
le rôle de cette fonction de prendre le msg depuis input et 
envoyer avec fonction requetepost du paramètre page (page Php) et data (form Data)
*/  
//  si vous voulez modifer la date , voir le fichier "messages.php" est ajouter 3600 sec au times  
function setMsg(){
  var formData = new FormData();
  var pagePost = "messages";
    temp = msg.value;
    formData.append('msg',temp );
    // Appeler la fonction requetPost
    requetPOST (pagePost,formData);
}
/// cette function pour vérifier s'il y a quelque chose dans l'input, sinon masquer le msg 'Ecrire ....'.  
function verifierAff(){
  if(msg.value == ""){
      msgEcrire.style.display ="none";
    }
}
// appelle fonction verifieraffi 1 ms  
setInterval(verifierAff, 1);

//-------- envoyer MSG ---------------
/// lorsque écrire dans l'input il va afficher le msg écrire, et le msg recu va masquer
msg.addEventListener("keyup",function(){
  msgEcrire.style.display ="block";
  msgRecu.style.display ="none";
})
// lorsque appuyer sur entrer, masquer le msg écrivait et afficher recu puis en voyer msg au BD avec fonction setMsg
document.addEventListener("keydown", event => {
  if (event.isComposing || event.keyCode === 13) {
    setMsg();
    msgEcrire.style.display ="none";
    /// suprimer les valeurs dans input; 
    msg.value="";
    msgRecu.style.display ="block";
    // changer la valeur de X pour appeler à la fonction RequetGet 
  }
});
// Même chose lorsque clicker sur entrer
  btnEnvoyer.addEventListener("click",function(){
  setMsg();
  msgEcrire.style.display ="none";
  msg.value="";
  msgRecu.style.display ="block";
 });


// cette fonction pour recevoir le msg de BDD et afficher dans la grande zone de messenger
 function addMsgEcrant(){
   var pageGET = "affichermsg";   
   requetGET(pageGET);
 }
 /*
 cette function pour vérifier si la fonction requestpost a été appeler 
 ( c-à-d un nouveau msg a jouté au BDD), et appeler la fonction requestGet pour la récupérer .
 */   
 function aff(){
     addMsgEcrant(); 
 }
// la fonction aff va appeler toute 1 sec pour vérifier l'état de x et appeler la fonction Request Get 
   setInterval(aff, 2990);
// 
   getAllmsg();
   function getAllmsg(){
    var url = "affichermsg/type=all";   
    var xhr = new XMLHttpRequest();
    //On initialise notre requête avec open()
    xhr.open("GET", url, true);
    xhr.send();
    xhr.onload = function(){
    if (xhr.status == 200){
        var reponse = xhr.response;
      // convertir la réponse string "Php" en JSON
        var json = JSON.parse(reponse);
        console.log(json);
        for(var i=0;i<json.length;i++){
          var temp = json[i];
          var element = document.createElement("div");
          element.innerHTML= temp.message+" "+temp.date +" By "+temp.pseudo;
          element.classList.add('msgRight');
          messages.appendChild(element);
        }
      }    
    else{
        console.log('Impossible de récupérer la demande Ajax !');
    }
  }
}


   emojibtn.addEventListener('click', function(e){
    e.stopPropagation()
    this.classList.toggle('open')
 })
 document.body.addEventListener('click', function(){
    emojibtn.classList.remove('open')
 })


 



   


   















