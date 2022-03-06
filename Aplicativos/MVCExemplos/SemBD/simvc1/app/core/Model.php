<?php

Class Model {

	protected $table;
	protected $pk;
	public $sql;

	function __construct()
	{
		$this->db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

		if( $this->db->connect_errno )
		{
			die('SQL Error (' . $this->db->connect_errno . ') ' . $this->db->connect_error);
		}
	}

	public static function select( $column )
	{
		$model = new static();
		$model->sql = "SELECT " . $column . " FROM " . $model->table;
		return $model;
	}

	public function where( $where )
	{
		$this->sql .= " WHERE " . $where;
		return $this;
	}

	public function orderBy( $column, $opr )
	{
		$this->sql .= " ORDER BY " . $column . " " . $opr;
		return $this;
	}

	public function get()
	{
		$result = $this->db->query( $this->sql );

		if( $this->db->error_list )
		{
			die('SQL Error (' . $this->db->errno . ') ' . $this->db->error);
		}

		while( $row = $result->fetch_assoc() )
		{
			$this->data[] = (object) $row;
		}

		return $this->data;
	}

	public function insert( $val )
	{
		$sql = "INSERT INTO " . $this->table;

		$type = "";

		$col = " (";

		$data = array();
		foreach ($val as $key => $value) {
			$col .= $key . ', ';

			if( is_string( $value ) )
			{
				$type .= 's';
			}
			else if( is_integer( $value ) )
			{
				$type .= 'i';
			}
			$data[] = $value;
		}

		$col = rtrim($col, ', ');
		$col .= ") ";

		$sql .= $col . 'VALUES (';

		$countVal = count($val);

		for( $i = 0; $i < $countVal; $i++ )
		{
			$sql .= '?, ';
		}

		$sql = rtrim($sql, ', ');
		$sql .= ')';

		array_unshift($data, $type);

		$stmt = $this->db->prepare( $sql );
		call_user_func_array(array($stmt, "bind_param"), Model::refValues($data));

		$stmt->execute();

		$this->stmt = $stmt;
	}

	public function update( $val, $where)
	{
		$sql = "UPDATE " . $this->table . " SET ";
		$type = "";
		$data = array();
		foreach($val as $key => $value)
		{
			$sql .= $key . "=" . "?, ";

			if( is_numeric( $value ) )
			{
				$type .= 'i';

			}
			else if( is_string( $value ) )
			{
				$type .= 's';
			}

			$data[] = $value;
		}

		$sql = rtrim($sql, ', ');

		$sql .= " WHERE " . $this->pk . "=?";


		if( is_numeric( $where ) )
		{
			$type .= 'i';

		}
		else if( is_string( $where ) )
		{
			$type .= 's';
		}

		$data[] = $where;
		array_unshift($data, $type);

		$stmt = $this->db->prepare( $sql );
		call_user_func_array(array($stmt, "bind_param"), Model::refValues($data));

		$stmt->execute();

		$this->stmt = $stmt;
	}

	public function delete( $id )
	{
		$sql = "DELETE FROM " . $this->table . " WHERE " . $this->pk . "='" . $id . "'";
		$stmt = $this->db->query( $sql );
	}

	private static function refValues($arr){
	    if (strnatcmp(phpversion(),'5.3') >= 0) //Reference is required for PHP 5.3+
	    {
	        $refs = array();
	        foreach($arr as $key => $value)
	            $refs[$key] = &$arr[$key];
	        return $refs;
	    }
	    return $arr;
	}

}