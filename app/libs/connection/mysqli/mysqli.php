<?php

class Connection
{
    public $conn = [
        'host'=>DB_HOST,
        'user'=>DB_USER,
        'pwd'=>DB_PASS,
        'db'=>DB_NAME
    ];

    public function connect()
    {
        $info = $this->conn;
        $_SESSION['conn'] = mysqli_connect($info['host'],$info['user'],$info['pwd']);
    }
    public function getDB() {

        return $this->conn['db'];
    }

    public function disconnect(){mysqli_close();}
}

class MySQLiConnection
{
    public function select($sql)
    {
        $query_data = $this->get($sql);
        $result = $this->advanceKeyArray($query_data);
        return $result;
    }
    public function insert($table, $data)
    {
        ksort($data);
        $field_names = implode('`, `', array_keys($data));
        $field_values = implode("', '", array_values($data));

        $querystr = "INSERT INTO $table (`$field_names`) VALUES ('$field_values')";
        $this->set($querystr);
    }
    public function update($table, $data, $where)
    {
        ksort($data);
        
        $field_details = NULL;
        foreach ($data as $key => $value) {
            $field_details .= "`$key`='$value',";
        }

        $field_details = rtrim($field_details, ", ");
        $querystr = "UPDATE $table SET $field_details WHERE $where";
        $this->set($querystr);
    }
    public function delete($table, $where, $limit = 1)
    {
        $querystr = "DELETE FROM $table WHERE $where LIMIT $limit";
        $this->set($querystr);
    }
    private function get($query_string)
    {
        $data_array = array();
        $query = mysqli_query($_SESSION['conn'], $query_string) or die(mysqli_error($_SESSION['conn']));

        if(mysqli_num_rows($query)>=1)
        {
            while($row = mysqli_fetch_array($query)){
                array_push($data_array,$row);
            }
            return $data_array;
        }
    }
    private function set($query_string,$type=null)
    {
        mysqli_query($_SESSION['conn'], $query_string);

        if($type==1){
            return mysqli_insert_id($_SESSION['conn']);
        }
    }
    private function advanceKeyArray($array)
    {
        $final_array = array();

        if($array > 0)
        {
            for($x=0;$x<count($array);$x++)
            {
                $tmp_array = array();
                foreach($array[$x] as $key=> $val)
                {
                    if(!is_integer($key))
                    {$tmp_array[$key] = $val;}
                }
                array_push($final_array,$tmp_array);
            }
        }
        
        return $final_array;
    }
}

// class MySQLiConnection extends MainQuery
// {
//     public function __construct()
//     {
//         $this->query = new MainQuery();
//     }
//     public function select($sql)
//     {
//         $query_data = $this->query->get($sql);
//         $result = $this->query->advanceKeyArray($query_data);
//         return $result;
//     }
//     public function insert($table, $data)
//     {
//         ksort($data);
//         $field_names = implode('`, `', array_keys($data));
//         $field_values = implode("', '", array_values($data));

//         $querystr = "INSERT INTO $table (`$field_names`) VALUES ('$field_values')";
//         $this->query->set($querystr);
//     }
//     public function update($table, $data, $where)
//     {
//         ksort($data);
        
//         $field_details = NULL;
//         foreach ($data as $key => $value) {
//             $field_details .= "`$key`='$value',";
//         }

//         $field_details = rtrim($field_details, ", ");
//         $querystr = "UPDATE $table SET $field_details WHERE $where";
//         $this->query->set($querystr);
//     }
//     public function delete($table, $where, $limit = 1)
//     {
//         $querystr = "DELETE FROM $table WHERE $where LIMIT $limit";
//         $this->query->set($querystr);
//     }
// }