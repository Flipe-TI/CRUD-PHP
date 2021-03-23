<?php
require_once 'config.php';
$PDO = conecta_bd();
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Read</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./style/css/style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.css" >
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.js" async defer></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.js" async defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.js" async defer></script>
        

    </head>
    <body class="body">
        <?php
            $stmt_count = $PDO->prepare("SELECT COUNT (name) FROM user");
            $stmt_count->execute();
            $stmt = $PDO->prepare("SELECT user.id_user, user.name, user.age, address_user.CEP, address_user.street, address_user.number, address_user.district, address_user.city, address_user.state FROM user, address_user where user.id_user = address_user.id_user ORDER BY user.id_user");
            $stmt->execute();
            $total = $stmt_count->fetchColumn();
        ?>
        <nav id='menu'>
            <input type='checkbox' id='responsive-menu'><label></label>
            <ul>
              <div class ='logo'><i class="fa fa-code fa-2x"></i></div>
              <li><a href='DEV.html'>Desenvolvedor</a></li>
              <li><a class='dropdown-arrow' href='#cadastrar'>CRUD</a>
                <ul class='sub-menus'>
                  <li><a href='form.html'>Create</a></li>
                  <li><a href='read.php'>Read</a></li>
                  <li><a href='formup.html'>Update</a></li>
                  <li><a href='formdel.html'>Delete</a></li>
                </ul>
              </li>
              <li><a href='#home'>Home</a></li>
              
            </ul>
        </nav>
        
        <div class="wave"><svg viewBox="0 0 2859 500" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path fill="rgba(255, 255, 255, 1)" d="M 0 200 C 165 200 165 353 330 353 L 330 353 L 330 0 L 0 0 Z" stroke-width="0"></path> <path fill="rgba(255, 255, 255, 1)" d="M 329 353 C 567 353 567 204 805 204 L 805 204 L 805 0 L 329 0 Z" stroke-width="0"></path> <path fill="rgba(255, 255, 255, 1)" d="M 804 204 C 1035.5 204 1035.5 321 1267 321 L 1267 321 L 1267 0 L 804 0 Z" stroke-width="0"></path><path fill="rgba(255, 255, 255, 1)" d="M 1266 321 C 1571 321 1571 189 1876 189 L 1876 189 L 1876 0 L 1266 0 Z" stroke-width="0"></path><path fill="rgba(255, 255, 255, 1)" d="M 1875 189 C 2099.5 189 2099.5 301 2324 301 L 2324 301 L 2324 0 L 1875 0 Z" stroke-width="0"></path><path fill="rgba(255, 255, 255, 1)" d="M 2323 301 C 2591 301 2591 200 2859 200 L 2859 200 L 2859 0 L 2323 0 Z" stroke-width="0"></path></svg></div>
        <div class="container">
            <div class="row">
              <div class="col">
                <table>
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Idade</th>
                        <th>CEP</th>
                        <th>Rua</th>
                        <th>Numero</th>
                        <th>Bairro</th>
                        <th>Cidade</th>
                        <th>UF</th>
                        
                    </th>
                    </thead>
                    <tbody>
                    <?php while ($resultado = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                        <tr>
                        <td><?php echo $resultado ['id_user'] ?></td>
                        <td><?php echo $resultado ['name'] ?></td>
                        <td><?php echo $resultado ['age'] ?></td>
                        <td><?php echo $resultado ['CEP'] ?></td>
                        <td><?php echo $resultado ['street'] ?></td>
                        <td><?php echo $resultado ['number'] ?></td>
                        <td><?php echo $resultado ['district'] ?></td>
                        <td><?php echo $resultado ['city'] ?></td>
                        <td><?php echo $resultado ['state'] ?></td>
                        
                    </tr>
                    <?php endwhile; ?>
                    </tbody>
                </table>     
            
              </div>
            </div>
        </div>

        <footer class="footer">
            <div class="containe-footer">
                <div class="d-flex justify-content-center">
                    <div class="col-md-4">
                        <h5 class="text-center"><i class="fa fa-code fa" style="border-radius: 100px;
                            padding: 5px; 
                            border: 3px solid #3E8CBB;"></i> Felipe Gabriel.</h5>
                        <ul class="nav justify-content-center">
                            <li class="nav-item"><a href="https://facebook.com" class="nav-link"><i class="fa fa-facebook-square fa-2x"></i></a></li>
                            <li class="nav-item"><a href="https://twitter.com" class="nav-link"><i class="fa fa-twitter-square fa-2x"></i></a></li>
                            <li class="nav-item"><a href="https://github.com/Flipe-TI" class="nav-link"><i class="fa fa-github-square fa-2x"></i></a></li>
                            <li class="nav-item"><a href="https://www.linkedin.com/in/felipe-silva-ti/" class="nav-link"><i class="fa fa-linkedin-square fa-2x"></i></a></li>
                        </ul>
                        <br>
                    </div>
                </div>
            </div>
        </footer>

        
    </body>
</html>