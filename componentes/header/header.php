<?php
if(!isset($_SESSION)) session_start();
?>

<link href="/icatalogo3/componentes/header/header.css" rel="stylesheet" />
<?php
if (isset($_SESSION["mensagem"])) {
?>
   <div class="mensagem">
      <?= $_SESSION["mensagem"]; ?>
   </div>
   <script lang="javascript">
      setTimeout(() => {
          document.querySelector(".mensagem").style.display = "none";
      }, 4000);
   </script>
<?php  
   
   unset($_SESSION["mensagem"]);
}
?>
     
<header class="header">
   <figure>
       <img src="/icatalogo3/imgs/logo.png">
   </figure>
        <input type="search" placeholder="Pesquisar" />
        <?php
        if (!isset($_SESSION["usuarioId"])) {
        ?>
        <nav>
           <ul>
               <a id="menu-admin">Administrador</a>
           </ul>
        </nav>
        <div class="container-login" id="container-login">
        <h1>Fazer login</h1>
        <form  method="POST" action="/icatalogo3/componentes/header/acoesLogin.php">
            <input type="hidden" name="acao" value="login" />
            <input type="text" name="usuario" placeholder="Usuário" />
            <input type="password" name="senha" placeholder="Senha" />
            <button>Entrar</button>
        </form>
    </div>
    <?php
    } else {
       
    ?>
      <nav>
        <ul>
          <a id="menu-admin" onclick="logout()">Sair</a>
        </ul>
      </nav>
      <form id="form-logout"form method="POST" style= "display: none" action="/icatalogo3/componentes/header/acoesLogin.php">
       <input type="hidden" name="acao" value="logout" />
      </form>
      <?php
    }
    ?>
</header>
<script lang="javascript">
function logout(){
    document.querySelector("#form-logout").submit();
}
    
    document.querySelector("#menu-admin").addEventListener("click", toggleLogin);
    //função do evento do click
    function toggleLogin() {
        let containerLogin = document.querySelector("#container-login");
        let formContainer = document.querySelector("#container-login > form");
        let h1Container = document.querySelector("#container-login > h1");
        //mostramos se o container estiver oculto
        if (containerLogin.style.opacity == 0) {
            formContainer.style.display = "flex";
            h1Container.style.display = "block";
            containerLogin.style.opacity = 1;
            containerLogin.style.height = "200px";
        } else {
            //se não, ocultamos
            formContainer.style.display = "none";
            h1Container.style.display = "none";
            containerLogin.style.opacity = 0;
            containerLogin.style.height = "0px";
        }
    }
</script>