<?php  
 
class BlogM{
    // table fields  
    private $id_blog=null;  
    private $objet=null;  
    private $date=null;  
    private $description=null; 
    // message string  
      
    // constructor set default value  
    function __construct($objet, $date, $description)  
    {  
        
			$this->objet=$objet;
			$this->date=$date;
			$this->description=$description; 
    }  

    function getId_blog(){
        return $this->id_blog;
    }
    function getObjet(){
        return $this->objet;
    }
    function getdate(){
        return $this->date;
    }
    function getDescription(){
        return $this->description;
    }
    
    function setId_blog(string $id_blog){
        $this->id_blog=$id_blog;
    }
    function setObject(string $objet){
        $this->objet=$objet;
    }
    function setNb_etoile(string $date){
        $this->date=$date;
    }
    function setDescription(string $description){
        $this->description=$description;
    }
    
}  
?> 