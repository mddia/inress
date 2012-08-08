<?php
	ob_start();
	require('inc.config.php') ;

	$tab_jours = array('Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi');
	$tab_mois = array('Décembre', 'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre', );
	
	$orderId = $_GET['orderId'];
	$order = new order($pdo, 0, $orderId);
	$orderDetails = $order->getDetails();
?>

<style>
body { color:#3c5a76; font-size:12px; }

a:link {
color:#1277d7;
text-decoration:none;
}
a:visited {
color:#1277d7;
text-decoration:none;
}
a:hover {
color:#1277d7; /*cc0056*/
text-decoration:underline;
}
a:active {
color:#1277d7;
text-decoration:underline;
}
</style>

<br /><br /><br /><br />
<table style="width:765px;"><tr><td style="width:35px;"></td><td style="width:415px;">
<span style="font-size:11px; color:#3c5a76;">
<img src="http://medias.inrees.com/img/graphics/logos/logo-fact2.jpg" width="150" />
<br /><br /><br />

<strong>INREES</strong><br />
67 rue Saint-Jacques<br />
75005 PARIS<br />
FRANCE
<br /><br />
Email : <a style="color:#1277d7;text-decoration:none;" href="mailto:contact@inrees.com">contact@inrees.com</a><br />
Site : <a style="color:#1277d7;text-decoration:none;" target="_blank" href="http://www.inrees.com">www.inrees.com</a>
</span>
</td><td align="right" valign="top">


<br /><br />
<span style="font-size:11px; color:#3c5a76;"><strong>Date :</strong> <?php echo date("j, n, Y", $orderDetails['timestamp']);  ?><br />
<strong>Paiement :</strong> Carte Bancaire</span>
</td></tr></table>



<br /><br /><br />

<table style="width:765px;"><tr><td style="width:35px;"></td><td style="width:415px;color:white;">...</td><td>
<span style="font-size:14px; color:#3c5a76;"><strong>Client</strong>
<br /><br />

<?php
	echo $_GET['name'].' '.$_GET['firstName'].'<br />' ;
	echo $orderDetails['addresses'][0]['address1'].'<br />';
	echo $orderDetails['addresses'][0]['address2'].'<br />';
	echo $orderDetails['addresses'][0]['address3'].'<br />';
	echo '<br />'.$orderDetails['addresses'][0]['zipCode'].' '.$orderDetails['addresses'][0]['city'].'<br />';
	echo $orderDetails['addresses'][0]['country']['name'];
?>

</span></td></tr></table>



<br /><br /><br /><br /><br />


<table cellpadding="0" cellspacing="0" style="width:765px;"><tr><td style="width:35px;"></td><td style="width:455px;padding:10px;"><strong>Détails de la facture</strong></td><td style="width:350px;">
<span style="color:#666683;font-size:10px;">Montant en Euros (€)</span>
</td></tr></table><br />

<table cellpadding="0" cellspacing="0" style="width:765px;">

<?php
$sql = "SELECT * FROM in_boutiquecommandedetails, in_produitsdetails, in_produits WHERE produits_id = produitsdetails_idproduit AND produitsdetails_id = boutiquecommandedetails_idproduit AND boutiquecommandedetails_idcommande = '$id' ORDER BY boutiquecommandedetails_id ";
$result = mysql_query($sql);
while($row = mysql_fetch_assoc($result))
{
?>

<tr><td style="width:35px;"></td><td style="width:455px;border-top:1px solid black;padding:10px;">
<?php echo $row['produits_titre'] ; ?> (Quantité : <?php echo $row['boutiquecommandedetails_quantite'] ; ?>)<br />
</td><td style="border-top:1px solid black;width:350px;">
<?php echo substr($row['boutiquecommandedetails_prix'],0,-2).'.'.substr($row['boutiquecommandedetails_prix'],-2,2) ; ?>€
</td></tr>

<?php
}
?>



<tr><td style="width:35px;"></td><td style="width:420px;text-align:right;padding-top:12px;padding-right:35px;"><strong style="font-size:11px;">FRAIS DE PORT</strong></td><td style="border-top:3px solid #cccccc;width:350px;padding-top:7px;">
<strong style="font-size:11px;"><?php $fdpone = substr($fdp,0,-2) ; if(empty($fdpone)) { $fdpone = "0" ; } echo $fdpone.'.'.substr($fdp,-2,2) ; ?>€</strong>
</td></tr>


<tr><td style="width:35px;"></td><td style="width:420px;text-align:right;padding-top:12px;padding-right:35px;"><strong style="font-size:11px;">PRIX</strong></td><td style="border-top:3px solid #cccccc;width:350px;padding-top:7px;">
<strong style="font-size:11px;"><?php echo substr($prix,0,-2).'.'.substr($prix,-2,2) ; ?>€</strong>
</td></tr>


<tr><td style="width:35px;"></td><td style="width:420px;text-align:right;padding-top:12px;padding-right:35px;"><strong style="font-size:11px;">DONT TVA (2,10%)</strong></td><td style="border-top:3px solid #cccccc;width:250px;padding-top:7px;">
<strong style="font-size:11px;"><?php 
$sql = "SELECT SUM(boutiquecommandedetails_prix) as total FROM in_boutiquecommandedetails, in_produitsdetails, in_produits, in_tva WHERE tva_int = produits_tva AND produits_id = produitsdetails_idproduit AND produitsdetails_id = boutiquecommandedetails_idproduit AND boutiquecommandedetails_idcommande = '$id' AND tva_int = '210' ORDER BY boutiquecommandedetails_id ";
$result = mysql_query($sql);
while($row = mysql_fetch_assoc($result))
{
	$prix210 = $row['total'];
}

//echo $prix210.'--' ;
$prixtva210 = (($prix210 /100) - (($prix210 /100) / (10210 / 10000) )) ; echo round($prixtva210,2) ;

?>€</strong>
</td></tr>

<tr><td style="width:35px;"></td><td style="width:420px;text-align:right;padding-top:12px;padding-right:35px;"><strong style="font-size:11px;">DONT TVA (5,50%)</strong></td><td style="border-top:3px solid #cccccc;width:250px;padding-top:7px;">
<strong style="font-size:11px;"><?php 
$sql = "SELECT SUM(boutiquecommandedetails_prix) as total FROM in_boutiquecommandedetails, in_produitsdetails, in_produits, in_tva WHERE tva_int = produits_tva AND produits_id = produitsdetails_idproduit AND produitsdetails_id = boutiquecommandedetails_idproduit AND boutiquecommandedetails_idcommande = '$id' AND tva_int = '550' ORDER BY boutiquecommandedetails_id ";
$result = mysql_query($sql);
while($row = mysql_fetch_assoc($result))
{
	$prix55 = $row['total'];
}

$prixtva55 = (($prix55 /100) - (($prix55 /100) / (10550 / 10000) )) ; echo round($prixtva55,2) ;

?>€</strong>
</td></tr>

<tr><td style="width:35px;"></td><td style="width:420px;text-align:right;padding-top:12px;padding-right:35px;"><strong style="font-size:11px;">DONT TVA (19,60%)</strong></td><td style="border-top:3px solid #cccccc;width:250px;padding-top:7px;">
<strong style="font-size:11px;"><?php 
$sql = "SELECT SUM(boutiquecommandedetails_prix) as total FROM in_boutiquecommandedetails, in_produitsdetails, in_produits, in_tva WHERE tva_int = produits_tva AND produits_id = produitsdetails_idproduit AND produitsdetails_id = boutiquecommandedetails_idproduit AND boutiquecommandedetails_idcommande = '$id' AND tva_int = '1960' ORDER BY boutiquecommandedetails_id ";
$result = mysql_query($sql);
while($row = mysql_fetch_assoc($result))
{
	$prix1960 = $row['total'];
}

$prixtva1960 = (($prix1960 /100) - (($prix1960 /100) / (1196 / 1000) )) ; echo round($prixtva1960,2) ;

?>€</strong>
</td></tr>



<tr><td style="width:35px;"></td><td style="width:420px;text-align:right;padding-top:12px;padding-right:35px;"><strong style="font-size:11px;">PRIX HT</strong></td><td style="border-top:3px solid #cccccc;width:250px;padding-top:7px;">
<strong style="font-size:11px;"><?php $prixnormal = substr($prix,0,-2).'.'.substr($prix,-2,2) ; $prixht = $prixnormal - ($prixtva210 + $prixtva55 + $prixtva1960) ; echo round($prixht,2) ; ?>€</strong>
</td></tr>
</table>




<br /><br /><br />
<br /><br /><br /><br /><br />
<br /><br /><br />

<table style="width:765px;"><tr><td style="width:35px;"></td><td style="width:465px;">
<span style="font-size:11px; color:#3c5a76;">INREES SAS<br />529 179 582 R.C.S Paris</span>
</td><td>
</td></tr></table>



<?php
$content = ob_get_cleanLO4447

();
require_once('/home/inrees/www/includes/html2pdf/html2pdf-cartes.class.php');
$pdf = new HTML2PDF('P','A4','fr');
$pdf->WriteHTML($content, isset($_GET['vuehtml']));
$pdf->Output();
?>