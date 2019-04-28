<?PHP
class Livreur{
	private $nom;
	private $prenom;
	private $num_tel;
	private $etat;
	private $charge;
	function __construct($nom,$prenom,$num_tel,$etat,$charge){
		$this->nom=$nom;
		$this->prenom=$prenom;
		$this->num_tel=$num_tel;
		$this->etat=$etat;
        $this->charge=$charge;
	}

	function getNom(){
		return $this->nom;
	}
	function getPrenom(){
		return $this->prenom;
	}
	function getNum_tel(){
		return $this->num_tel;
	}
	function getEtat(){
		return $this->etat;
	}
    function getCharge(){
        return $this->charge;
    }
	function setNom($nom){
		$this->nom=$nom;
	}
	function setPrenom($prenom){
		$this->prenom=$prenom;
	}
	function setNum_tel($num_tel){
		$this->num_tel=$num_tel;
	}
	function setEtat($etat){
		$this->etat=$etat;
	}
    function setCharge ($charge){
        $this->charge=$charge;
    }
}

?>