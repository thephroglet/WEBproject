<?PHP
class Livraison{
	private $nom;
	private $prenom;
	private $num_tel;
	private $adresse;
	private $codepos;
	function __construct($nom,$prenom,$num_tel,$adresse,$codepos){
		$this->nom=$nom;
		$this->prenom=$prenom;
		$this->num_tel=$num_tel;
		$this->adresse=$adresse;
        $this->codepos=$codepos;
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
	function getAdresse(){
		return $this->adresse;
	}
    function getCodepos(){
        return $this->codepos;
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
	function setAdresse($adresse){
		$this->adresse=$adresse;
	}
    function setCodepos ($codepos){
        $this->codepos=$codepos;
    }
}

?>