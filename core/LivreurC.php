<?PHP
include "../config.php";
class LivreurC {
function afficherLivreur ($livreur){
		echo "Nom: ".$livreur->getNom()."<br>";
		echo "Prénom: ".$livreur->getPrenom()."<br>";
		echo "Numéro de téléphone: ".$livreur->getNum_tel()."<br>";
		echo "Etat: ".$livreur->getEtat()."<br>";
        echo "Charge: ".$livreur->getCharge()."<br>";
	}

	function ajouterLivreur($livreur){
		$sql="insert into livreur (nom,prenom,num_tel,etat,charge) values (:nom,:prenom,:num_tel,:etat,:charge)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);

        $nom=$livreur->getNom();
        $prenom=$livreur->getPrenom();
        $num_tel=$livreur->getNum_tel();
        $etat=$livreur->getEtat();
		$charge=$livreur->getCharge();
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':num_tel',$num_tel);
		$req->bindValue(':etat',$etat);
		$req->bindValue(':charge',$charge);
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherLivreurs(){
		//$sql="SElECT * From livreur e inner join formationphp.livreur a on e.num_tel= a.num_tel";
		$sql="SElECT * From livreur";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerLivreur($num_tel){
		$sql="DELETE FROM livreur where num_tel=+:num_tel";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':num_tel',$num_tel);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierLivreur($livreur,$num_tel){
		$sql="UPDATE livreur SET nom=:nom,prenom=:prenom,num_tel=:num_teln,etat=:etat,charge=:charge WHERE num_tel=:num_tel";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
        $nom=$livreur->getNom();
        $prenom=$livreur->getPrenom();
		$num_teln=$livreur->getNum_tel();
        $etat=$livreur->getEtat();
        $charge=$livreur->getCharge();
		$datas = array(':nom'=>$nom,':prenom'=>$prenom, ':num_teln'=>$num_teln, ':num_tel'=>$num_tel, ':etat'=>$etat,':charge'=>$charge);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':num_teln',$num_teln);
		$req->bindValue(':num_tel',$num_tel);
		$req->bindValue(':etat',$etat);
		$req->bindValue(':charge',$charge);
		
		
            $s=$req->execute();
			
           // header('Location: modifcationLivreur.html');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recupererLivreur($num_tel){
		$sql="SELECT * from livreur where num_tel=$num_tel";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function rechercherListeLivreurs($num_tel){
		$sql="SELECT * from livreur where num_tel=$num_tel";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
}

?>