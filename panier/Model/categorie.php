<?php
    class categorie
    {   
        
        private $idc_categorie;
        private $type;
		private $nbrepost;
      
        

        function __construct($idc_categorie, $type, $nbrepost){
			$this->idc_categorie=$idc_categorie;
			$this->type=$type;
		
			$this->nbrepost=$nbrepost;
			

		}

        function setidc_categorie(string $idc_categorie){
			$this->idc_categorie=$idc_categorie;
		}
        function settype(string $type){
			$this->type=$type;
		}
      
        function setnbrepost(string $nbrepost){
			$this->nbrepost=$nbrepost;
		}
        

        function getidc_categorie(){
			return $this->idc_categorie;
		}
        function gettype(){
			return $this->type;
		}
      
        function getnbrepost(){
			return $this->nbrepost;
		}
        

        
    }
    

?>