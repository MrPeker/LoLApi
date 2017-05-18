<?php
namespace Database\Databases\Lol;

class ChampionRow
{
  public $triton_champion_id = null,  $id = null,$name = null,$champ_key = null,$title = null,$description = null;
  public function all()
  {
    $array = [];if(is_array($this->id)) foreach ($this->id as $key => $value) { $array[$key]['id'] = $value; }; 
        if(is_array($this->name)) foreach ($this->name as $key => $value) { $array[$key]['name'] = $value; }; 
        if(is_array($this->champ_key)) foreach ($this->champ_key as $key => $value) { $array[$key]['champ_key'] = $value; }; 
        if(is_array($this->title)) foreach ($this->title as $key => $value) { $array[$key]['title'] = $value; }; 
        if(is_array($this->description)) foreach ($this->description as $key => $value) { $array[$key]['description'] = $value; }; 
        
    return $array;
  }
    
    
    public function select($index) 
    {      
        $classRow = new championRow();
        $classRow->triton_champion_id = $this->triton_champion_id;
$classRow->id = $this->id[$index]; 
        $classRow->name = $this->name[$index]; 
        $classRow->champ_key = $this->champ_key[$index]; 
        $classRow->title = $this->title[$index]; 
        $classRow->description = $this->description[$index]; 
        return $classRow;      
    }        
            
    public function first() 
    {   
        if(is_array($this->id)) 
        {        
            $rowClass = new ChampionRow();       
            $rowClass->triton_champion_id = $this->triton_champion_id;
            $rowClass->id =  $this->id[0]; 
            $rowClass->name =  $this->name[0]; 
            $rowClass->champ_key =  $this->champ_key[0]; 
            $rowClass->title =  $this->title[0]; 
            $rowClass->description =  $this->description[0]; 
            return $rowClass;   
        } 
        else 
        {
            return $this;
        }    
    }
            
    public function save() 
    {        
        $database = explode(DIRECTORY_SEPARATOR , __DIR__);
        $database = end($database);
        $table = explode(DIRECTORY_SEPARATOR, explode("Row" , __CLASS__)[0]);
        $table = end($table);
        $pdoConnection = $GLOBALS['Databases'][ucfirst($database)];        
        if(debug_backtrace()[0]['type'] == '->') 
        {             
            if(empty($this->triton_champion_id)) 
            {                
                $insertQueryString = "INSERT INTO " . $table . " SET ";    
                $insertValueArray = [];                 
                $args = [];
                $args['id'] =  $this->id;
                $args['name'] =  $this->name;
                $args['champ_key'] =  $this->champ_key;
                $args['title'] =  $this->title;
                $args['description'] =  $this->description;
                
                foreach($args as $funcArgKey => $funcArgValue) 
                {
                    if(!empty($funcArgValue)) 
                    {
                        $insertQueryString .= " " . $funcArgKey . "= ?,";
                        $insertValueArray[] = $funcArgValue;
                    }
                }
                $insertQueryString = rtrim($insertQueryString, ",");                
                $insertQuery = $pdoConnection->prepare($insertQueryString);
                $insert = $insertQuery->execute($insertValueArray);
                if($insert === true) 
                {
                    return array(true, $pdoConnection->lastInsertId());
                } 
                else 
                {
                    return array(false);
                }            
            } 
            else 
            {                          
                $insertQueryString = "UPDATE " . $table  . " SET";
                $insertValueArray = [];             
                $args = [];
                $args['id'] =  $this->id; 
                $args['name'] =  $this->name; 
                $args['champ_key'] =  $this->champ_key; 
                $args['title'] =  $this->title; 
                $args['description'] =  $this->description; 
                        
                foreach($args as $funcArgKey => $funcArgValue) 
                {
                    if(!empty($funcArgValue)) 
                    {
                        $insertQueryString .= " " . $funcArgKey . "= ?,";
                        $insertValueArray[] = $funcArgValue;
                    }
                }
    
                $insertQueryString = rtrim($insertQueryString, ",");
                $insertQueryString .= ' WHERE ' . $this->triton_champion_id[1] . ' = ' . $this->triton_champion_id[0];                
                $insertQuery = $pdoConnection->prepare($insertQueryString);
                $insert = $insertQuery->execute($insertValueArray);
                if($insert === true) 
                {
                    return array(true, $pdoConnection->lastInsertId());
                } 
                else 
                {
                    return array(false);
                }
            }
        }
    }
    
    public function delete() 
    {
        $database = explode(DIRECTORY_SEPARATOR , __DIR__);
        $database = end($database);
        $table = explode(DIRECTORY_SEPARATOR, explode("Row" , __CLASS__)[0]);
        $table = end($table);
        $pdoConnection = $GLOBALS['Databases'][ucfirst($database)];        
        $deleteQueryString = 'DELETE FROM  champion ';
        $deleteQueryString .= ' WHERE ' . $this->triton_champion_id[1] . ' = ' . $this->triton_champion_id[0];                
        $deleteQuery = $pdoConnection->prepare($deleteQueryString);
        $delete = $deleteQuery->execute();
        if($delete === true) {
            return array(true);
        } 
        else 
        {
            return array(false);
        }   
    }    
}