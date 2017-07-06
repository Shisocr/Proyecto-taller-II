//Iniciamos con un sesion_start() que no quiere decir que hayamos iniciado secion sino que si hay sesion la iniciara y si no hay pasara a un segundo plano hasta que se entre en esta pagina con sesion.

<?php session_start();?>
   
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/css/style.css"/>
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/7.0.0/normalize.css">
    <title>Document</title>
</head>
<body>
   <header>
    <nav class="nav-content">
      <div class="nav-logo">
        <a href="index.html">
          <img src="https://image.ibb.co/k3aB2a/Captura_de_pantalla_2017_05_25_a_las_8_15_36_p_m.png" alt=""/>
        </a>
      </div>
     <div style= font-family:arial class="nav-menu">
        <a style= "color:#fff" href="index.html"> Inicio </a>
        <a style= "color:#fff" href="donar.html"> Quiero donar</a>
        <a style= "color:#fff" href="hogar.html"> Dar Hogar</a>
        <a style= "color:#fff" href="register.html"> Registrarse</a>
      </div>
<!--Creamos una etiqueta p que diga bienvenido y hacemos un echo con php de la vairable session con nombre name-->

        <p>Bienvenido, <?php echo $_SESSION['name'] ?></p>
      </div>
      <div class="clear"></div>
    </nav>
  </header>
  <section class="section">
    <div class="section-content">
      <div class="section-content-form">
        <?php
	//Aqui pedimos a la bbdd que nos traiga la informacion y en este casi le hacemos un fetchAll en el modo Array asociativo.

            include('php/core.php');
            $db = new PDOconnect;
            $query = $db->queryList("SELECT `ID`, `user_name`, `user_lastname`, `user_birthdate`, `user_sex`, `user_email`, `user_telephone`, `user_login`, `user_password`, `user_register` FROM `ia_users` ", array( ));
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
                                    
            
            ?>
            <table >
	            <tbody><!-- se crea el cuerpo de la tabla -->
	            <?php //En esta sentencia for hacemos un bucle para que recorra result en cada nivel del array recordamos array(array(['clave']=>'valor',['clave']=>'valor'),array(['clave']=>'valor',['clave']=>'valor')); e incrementamos en cada vuelta que de.

                    for($i=0;$i<=$result[$i];$i++){
                        echo '<tr>
                                <td>'.$result[$i]['ID'].'</td>
                                <td>'.$result[$i]['user_name'].'</td>
                                <td>'.$result[$i]['user_lastname'].'</td>
                                <td>'.$result[$i]['user_login'].'</td>
                                <td>'.$result[$i]['user_register'].'</td>
                            </tr>';
                        
                    }
                    ?>
                </tbody>
            </table>
      </div>
    </div>
  </section>
  <footer>
     <div style= "background-color: darkblue;" class="foot-menu">
        <a style= "color:#fff" href="index.html"> Inicio </a>
        <a style= "color:#fff" href="donar.html"> Quiero donar</a>
        <a style= "color:#fff" href="hogar.html"> Dar Hogar</a>
        <a style= "color:#fff" href="register.html"> Registrarse</a>
      </div>
  </footer>   
</body>
</html>
