<?php

    class DB{
        public $dblink;
        // 构造函数
        function __construct($dbconfig)
        {
            //第一步：连接到数据库
            $this->dblink = new mysqli(
                $dbconfig['host'], 
                $dbconfig['username'], 
                $dbconfig['passwd'], 
                $dbconfig['database'], 
                $dbconfig['port']
            );
            //第二步：设置编码
            $this->dblink->query('SET NAMES UTF8');
        }

        function  insertData($tname, $data){
            $key = $value = [];
            foreach ($data as $k => $v) {
                array_push($key, $k);
                array_push($value, '"'.$v.'"');
            }
            $sql = 'INSERT INTO '.$tname.'('.implode(',', $key).') VALUES ('.implode(',', $value).')';
            return $this->dblink->query($sql);
        }

        function delData($tname, $where=1){
            $sql = 'DELETE FROM '.$tname.' WHERE ' . $where;
            return $this->dblink->query($sql);
        }

        function  updateData($tname, $data, $where=1){
            $d = [];
            foreach ($data as $key => $value) {
                array_push($d, $key . '= "' . $value . '"');
            }
            $sql = 'UPDATE '.$tname.' SET '.implode(',', $d).' WHERE ' . $where;
            return $this->dblink->query($sql);
        }



    }