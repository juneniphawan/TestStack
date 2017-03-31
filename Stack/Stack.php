<?php
    namespace Stack;
class Stack {
    public $con;
	
    public function __construct(){
	$this->con = mysqli_connect('localhost','root','june08','TestStack');
    }
		
    public function push(int $input_data){
	$pushSql = "INSERT INTO stack_data (value) VALUES ('$input_data')";
	mysqli_query($this->con, $pushSql);
	echo "Push:Index = ".$this->con->insert_id." Value = ".$input_data;
	}
		
    public function pop(){
	$popSql = "SELECT * FROM stack_data ORDER BY index_data DESC LIMIT 1";
	$result = mysqli_query($this->con, $popSql);
	if(mysqli_num_rows($result) > 0){
            $dbResult = mysqli_fetch_assoc($result);
            mysqli_query($this->con, "DELETE FROM stack_data ORDER BY index_data desc limit 1");
            echo "Pop:Index = ".$dbResult['index_data']." value = ".$dbResult['value'];
	}else{
            echo "หมดละ";
	}
    }
		
        public function special(int $index, int $data){
        $specialSql = "UPDATE stack_data SET index_data = ($index+1) WHERE index_data = $index";
        mysqli_query($this->con, $specialSql);
        } 
    }
?>
    
}
