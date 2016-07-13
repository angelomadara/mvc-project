<?php

/**
*
*/
class DBRAW {
	private static $_instance = null;
	private $_pdo, 
			$_query, 
			$_error = false, 
			$_results, 
			$_count = 0;
	// table variables
	public 	$_fields = ' *';
	public 	$_table = ''; 
	public 	$_where = [];
	public 	$_toCompare = [];
	public 	$_conditinalOperator = '';
	public 	$_join = [];
	public 	$_joinField1 = [];
	public 	$_joinOperator = [];
	public 	$_joinField2 = [];

	private function __construct(){
		try{
			$this->_pdo = new PDO('mysql:host='.Config::get('mysql/host').';dbname='.Config::get('mysql/name'),Config::get('mysql/user'),Config::get('mysql/pass'), array(PDO::ATTR_PERSISTENT => true));
			$this->_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->_pdo->exec('set names utf8');
			// echo "Connected";
		}catch(PDOException $e){
			die($e->getMessage());
			// echo $e->getMessage();
		}
	}

	protected static function ready(){
		if(!isset(self::$_instance)){
			self::$_instance = new DBRAW();
		}
		return self::$_instance;
	}

	// the table
	public function select($table){
		self::ready()->_table = $table;
		// $this->_table = $table;
		return self::ready();
	}

	// the field
	public function fields($fields=[]){
		// for fields
		if(!count($fields)){
			$this->_fields = " *";
		}else{
			$x = 1;
			$values = '';
			foreach ( $fields as $field ) {
				$values .= $field;
				if($x < count($fields)) {
					$values .= ', ';
				}
				$x++;
			}
			$this->_fields = $values;
		}
		return self::ready();
	}

	// where clause
	public function where($field,$operator,$toCompare){
		$operators = ['=','>','<','>=','<=','!=','LIKE'];
		$sql = "";
		if(in_array($operator, $operators)){
			$sql = " {$field} {$operator} ?";
			// self::ready()->_where[] = $sql;
			// self::ready()->_toCompare[] = $toCompare;
			$this->_where[] = $sql;
			$this->_toCompare[] = $toCompare;
			return self::ready();
		}
		return false;
	}

	// clause operator
	public function operator($operator){
		$operator = strtoupper(strtolower($operator));
		$operators = ["AND","OR"];
		if(in_array($operator, $operators)){
			// self::ready()->_conditinalOperator[] = ' '.$operator;
			$this->_conditinalOperator[] = ' '.$operator;
			return self::ready();
		}
		return false;
	}

	// join tables
	public function innerjoin($table,$f1,$op,$f2){
		$this->_join[] = 'INNER JOIN '.$table;
		$this->_joinField1[] = $f1;
		$this->_joinOperator[] = $op;
		$this->_joinField2[] = $f2;
		return self::ready();
	}

	public function leftjoin($table,$f1,$op,$f2){
		$this->_join[] = 'LEFT JOIN '.$table;
		$this->_joinField1[] = $f1;
		$this->_joinOperator[] = $op;
		$this->_joinField2[] = $f2;
		return self::ready();
	}

	public function rightjoin($table,$f1,$op,$f2){
		$this->_join[] = 'RIGHT JOIN '.$table;
		$this->_joinField1[] = $f1;
		$this->_joinOperator[] = $op;
		$this->_joinField2[] = $f2;
		return self::ready();
	}

	// results
	public function fetch(){
		return $this->getResults(0);
	}

	public function fetchAll(){
		return $this->getResults(1);
	}

	// another method
	public function getResults($settings){
		$toCompare 	= $this->_toCompare;
		// if where method is present
		$where = "";
		if(count($this->_where)){
			$where .= "WHERE";
			$andor = "";
			foreach ($this->_where as $key => $value) {
				if(isset($this->_conditinalOperator[$key])) $andor = $this->_conditinalOperator[$key];
				else $andor = "";
				$where .= $value.$andor;
			}
		}
		// if join method is present
		$innerjoin = "";
		if(count($this->_join)){
			// $innerjoin .= " ";
			foreach ($this->_join as $key => $value) {
				$innerjoin .= $value." ON ".$this->_joinField1[$key].' '.$this->_joinOperator[$key].' '.$this->_joinField2[$key].' ';
			}
		}

		// return static::ready();
		$sql = "SELECT ".$this->_fields." FROM ".$this->_table.' '.$innerjoin.$where;

		if($settings == 0){
			return $this->raw($sql,$toCompare)[0];
		}else{
			return $this->raw($sql,$toCompare);
		}
	}

	// the query
	public function raw($sql,$params = []){
		// $this->_error = false;
		self::ready()->_error = false;

		// if($this->_query = $this->_pdo->prepare($sql)){
		if(self::ready()->_query = self::ready()->_pdo->prepare($sql)){
			
			$x = 1;
			if(count($params)){
				foreach ($params as $param) {
					$this->_query->bindValue($x,$param);
					$x++;
				}
			}

			// if( $this->_query->execute() ){
			if( self::ready()->_query->execute() ){
				// $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
				// $this->_count 	= $this->_query->rowCount();
				self::ready()->_results = self::ready()->_query->fetchAll(PDO::FETCH_OBJ);
				self::ready()->_count 	= self::ready()->_query->rowCount();
			}else{
				$this->_error = true;
			}

		}

		// return $this;
		return self::ready()->_results;
	}
}
