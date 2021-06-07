<header>
        <nav class="navbar navbar-expand-lg">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-content" aria-controls="navbar-content" aria-expanded="false" aria-label="toggle-navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
          <div class="collapse navbar-collapse" id="navbar-content">
            <ul class="navbar-nav" id="listGlobal">
              <li class="nav-item">
                <a class="nav-link" href="/">Accueil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">A Propos</a>
              </li>
              <li class="nav-item" id="listConnecter">
                <div class="nav-link" id="connecter">Se connecter</div>
              </li>
              <li class="nav-item" id="listInscription">
                <div class="nav-link" id="Inscription">Inscription</div>
              </li>
            </ul>
          </div>
        </nav>
    <div class="box">
        <div class="box-1"></div>
        <div class="box-2"></div>
      </div>
</header>

    <h1>Micro Messenger App</h1>
   <div class="container">
      <div class="messages"  id="id">
        <div id ="Ecrire" >Ecrire....</div>
        <div id ="recu" >msg recu</div>
      </div>
      <div class="input">
         <input type="text" placeholder="Type message here!" id="msgInput" />
         <div class="emoji-btn open">&#128578;	
            <div class="emoji-popup"><div class="emoji-wrapper">
              </div></div>
         </div>
         <button id="btn">Send</button>
      </div>
   </div>

      <!-- popin -->
   <div id="myModal" class="modal">

   <!-- Modal content -->
   <div class="modal-content" id="popup">
   <span class="close">&times;</span>
   </div>

   </div>

   <!----Liste Connecte User --->
   <div id="listeMembre"></div>

   