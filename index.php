<!--=============================================-->
<!--======Auteur Olivier BAKOU LONGO=============-->
<!--=============================================-->
<!DOCTYPE html>
<html>
<head>
	<title>Lancer un etat ireport en PHP</title>
</head>
<?php
//*****************Code d'appel de l'état ireport****************
 function jasperPDF($chemin){
   // if ($type==true) {
         exec("java -jar erpreport.jar ".$chemin,$output);
 
       $mach=str_replace('.jasper', '.pdf', $chemin);
        $output[0]=$mach;

 // $longueur = strlen($output[0]);
 // $machaine=substr($output[0], 5, $longueur);
     echo '<script>
     window.open("'.$mach.'", "_blank");
    </script>'; 
    return true;
  }
 //********Appel de la fonction jasperPDF pour afficher l'état
 if (isset($_POST['imprimer'])) {
 	jasperPDF('etatTest.jasper');
 }
//onclick="<? jasperPDF('etatTest.jasper');
?>
<body>
<form method="post">
<h1>LANCER UN ETAT IREPORT EN PHP AVEC UNE BASE DE DONNEES MYSQL</h1>
<h5>Par Olivier BAKOU LONGO</h5><h5>Me conctacter par E-mail : <a href="mailto:olivierbakoulongo@gmail.com">olivierbakoulongo@gmail.com</a></h5>
Pour lancer un état sous ireport lié à la base de données, vous devez :
<ul>
	<li>Installer le JDK java 8 ou supérieur qu'utilise votre ireport</li>
	<li>Notez que si vous utiliser la plateforme linux, vous devez installer toutes les polices utilisées par vos états ireport</li>
	<li>Créer une base de données et exécuter le script de la base de données (bdtest.sql)</li>
	<li>dans le dossier source (SRC) qui se trouve dans ce package, préciser dans le fichier cheminbd.ini :
		<ul>
			<li>l'adresse IP de votre base de données [host=localhost]</li>
			<li>le nom de votre base de données MYSQL [bd=bdtest]</li>
			<li>l'utilisateur de votre base de données [user=root]</li>
			<li>et le mot de passe de votre base de données [mdp=]</li>
		</ul>
	<li>Si vous avez respecté toutes ces étapes, cliquez sur Lancer l'impression en PHP pour tester l'affichage de l'état : etatTest.jasper</li>
	</li>
</ul>
<p>Vous avez la possibilité de lancer l'impression directement avec le code PHP
ou lancer l'impression via javascript avec ajax</p>
<p>Notez que : le plugin prend en charge les paramètres.</p>
<p>Les paramètres définis sous ireport doivent être en string</p>
<p>Lors de l'appel de votre état paramétré, passez les paramètres en les espaçants</p>
<p>Exemple : sous ireport $P{param1}='bakou', sous php jasperPDF(monetat.jasper param1='bakou')</p>
<button name="imprimer" type="submit">Lancer l'impression en PHP</button>
<br>
<br>
<button name="" onclick="">Lancer l'impression en javascript</button>
</form>
</body>
</html>
