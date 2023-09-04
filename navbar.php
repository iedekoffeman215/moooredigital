<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/e617e93306.js" crossorigin="anonymous"></script>
    <title>Home</title>
</head>
<body>

 
       <nav>
       <div class="container ">
            <h1 class="zwaan"><?php if($pagina == 'actievelanden'){echo 'Actieve landen';}else if ($pagina == 'landtoevoegen'){echo 'Land toevoegen';}?></h1>
            <div class="menu">
              <a class="<?php if($pagina == 'actievelanden'){echo 'is-active';}?>" href="index.php">Actieve landen</a>
              <a class="<?php if($pagina == 'landtoevoegen'){echo 'is-active';}?>" href="home.php">Land toevoegen</a>
             
            </div>
        <button class="hamburger">
          <span></span>
          <span></span>
          <span></span>
        </button>

        <div class="menu-dropdown">
        <a class="<?php if($page == 'dashboard'){echo 'is-active';}?>" href="home.php">Urenregistratie</a>
       <a class="<?php if($page == 'klanten'){echo 'is-active';}?>" href="klanten.php">Klanten overzicht</a>
       <a class="<?php if($page == 'accounts'){echo 'is-active';}?>" href="accountoverzicht.php">Accounts overzicht</a>
        <a class="<?php if($page == 'urenoverzicht'){echo 'is-active';}?>" href="urenoverzicht.php">Urenoverzicht</a>
        <a class="logout" href="logout.php"><i class="fa-solid fa-right-from-bracket" style="color: #ffffff;"></i></a>
</div>
      
       </div>
      </nav>



      <style>
  :root {
    --primary: #7a1a3a;
    --light: #EEEEEE;
    --dark: #1b2136;
  }
  
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Fira Sans', sans-serif
  }
  


  .container {
    max-width: 1280px;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }
  
  
  nav {
    display: block;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 100;
    background-color: var(--dark);
    padding: 30px 32px;
    border-bottom: 3px solid black;
  
  }
  
.menu-dropdown a.is-active {
  color: var(--primary);
}

  .menu-dropdown {
  display: none;
  position: absolute;
  top: 100%;
  left: 0;
  right: 0;
  background-color: var(--dark);
}

  .menu-dropdown a {
  display: block;
  color: white;
  font-size: 24px;
  font-weight: bold;
  margin: 16px 0;
  text-align: center;
  }

  .hamburger {
    display: block;
    position: relative;
    z-index: 1;
    user-select: none;
    appearance: none;
    border:none;
    background: none;
    outline: none;
    cursor: pointer;
  }
  


  h1 {
    color: white;
    font-size: 25px;
    font-weight: 900;
    letter-spacing: 2px;
    text-transform: uppercase;
  }
  
  .hamburger span {
    display: block;
    width: 33px;
    height: 4px;
    margin-bottom: 5px;
    position: relative;
    background-color: var(--light);
    border-radius: 6px;
    z-index: 1;
    transform-origin: 0 0;
    transition: 0.4s;
  }

  .menu-dropdown.is-active {
  display: block;
  text-align: center;
  color: var(--primary);
}
  
  .hamburger:hover span:nth-child(2){
    transform: translateX(10px);
    background-color: var(--primary);
  
  }
  
  .hamburger.is-active span:nth-child(1) {
    transform: translate(0px, -2px) rotate(45deg);
  }
  
  .hamburger.is-active span:nth-child(2) {
  opacity: 0;
  transform: translateX(15px);
  }
  
  .hamburger.is-active span:nth-child(3) {
    transform: translate(-3px, 3px) rotate(-45deg);
  
  }
  
  .hamburger.is-active:hover span {
    background-color: var(--primary);
  }
  
.werken {
    color: rgb(156, 40, 40);
}
  
  .menu {
    display: none;
    flex: 1 1 0%;
    justify-content: flex-end;
    margin: 0 -16px;
    
  
  }
  
  
  .menu a {
    color: white;
    margin: 0 16px;
    font-weight: 600;
    text-decoration: none;
    transition: 0.4s;
    padding: 12px 18px;
    
  }

 


/*  .wrapper {
    display: flex;
    width: 1275px;
    height: 88vh;
    background-color: #ffffff;
    margin: 0 auto;
    margin-top: 100px;
    justify-content: center;

}*/

  .menu a.is-active {
    background-color: var(--primary);
    border-radius: 99px;
  }
  
  .menu a.is-active, .menu a:hover {
    background-color: var(--primary);
    border-radius: 99px;
  }
  
  @media (min-width: 1057px) {
    .hamburger {
      display: none;
    }
  
    .menu {
      display: flex;
    }

    .menu-dropdown.is-active{
      display: none;
    }


  }
  



.zwaan {
  border-bottom: 2px solid #ffffff;
}

      </style>
     
      
      <script src="../"></script>

</body>
</html>