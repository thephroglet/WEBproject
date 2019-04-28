<?PHP
include "../config.php";
class LivraisonC {
function afficherLivraison ($livraison){
		echo "Nom: ".$livraison->getNom()."<br>";
		echo "Prénom: ".$livraison->getPrenom()."<br>";
		echo "Numéro de téléphone: ".$livraison->getNum_tel()."<br>";
		echo "adresse: ".$livraison->getAdresse()."<br>";
        echo "codepos: ".$livraison->getCodepos()."<br>";
	}

	function ajouterLivraison($livraison){
		$sql="insert into livraison (nom,prenom,num_tel,adresse,codepos) values (:nom,:prenom,:num_tel,:adresse,:codepos)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);

        $nom=$livraison->getNom();
        $prenom=$livraison->getPrenom();
        $num_tel=$livraison->getNum_tel();
        $adresse=$livraison->getAdresse();
		$codepos=$livraison->getCodepos();
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':num_tel',$num_tel);
		$req->bindValue(':adresse',$adresse);
		$req->bindValue(':codepos',$codepos);
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherLivraisons(){
		//$sql="SElECT * From livraison e inner join formationphp.livraison a on e.num_tel= a.num_tel";
		$sql="SElECT * From livraison";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerLivraison($num_tel){
		$sql="DELETE FROM livraison where num_tel=+:num_tel";
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
	function modifierLivraison($livraison,$num_tel){
		$sql="UPDATE livraison SET nom=:nom,prenom=:prenom,num_tel=:num_teln,adresse=:adresse,codepos=:codepos WHERE num_tel=:num_tel";
		
		$db = config::getConnexion();
		//$db->sadressetribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
        $nom=$livraison->getNom();
        $prenom=$livraison->getPrenom();
		$num_teln=$livraison->getNum_tel();
        $adresse=$livraison->getAdresse();
        $codepos=$livraison->getCodepos();
		$datas = array(':nom'=>$nom,':prenom'=>$prenom, ':num_teln'=>$num_teln, ':num_tel'=>$num_tel, ':adresse'=>$adresse,':codepos'=>$codepos);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':num_teln',$num_teln);
		$req->bindValue(':num_tel',$num_tel);
		$req->bindValue(':adresse',$adresse);
		$req->bindValue(':codepos',$codepos);
		
		
            $s=$req->execute();
			
           // header('Location: modifierLivraison.html');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recupererLivraison($num_tel){
		$sql="SELECT * from livraison where num_tel=$num_tel";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function rechercherListeLivraisons($num_tel){
		$sql="SELECT * from livraison where num_tel=$num_tel";
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