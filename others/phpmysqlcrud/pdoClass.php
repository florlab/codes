<?php

class Database
{
    private $db_host = 'localhost';
    private $db_user = 'root';
    private $db_pass = '';
    private $db_name = 'blog';
    private $db_con;

    public function connect(){
        try{

            $this->db_con = new PDO("mysql:host={$this->db_host};dbname={$this->db_name}",$this->db_user,$this->db_pass);
            $this->db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function disconnect(){

    }

    public function select(){
        $stmt = $this->db_con->prepare("SELECT * FROM tbl_employees ORDER BY emp_id DESC");
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
             echo $row['emp_id'];
        }
    }

    public function insert(){
        try{
            $stmt = $this->db_con->prepare("INSERT INTO tbl_employees(column1,column2,column3) VALUES(:column1, :column2, :column3)");
            $stmt->bindParam(":column1", 'value1');
            $stmt->bindParam(":column2", 'value2');
            $stmt->bindParam(":column3", 'value2');

            if($stmt->execute())
            {
                echo "Successfully Added";
            }
            else{
                echo "Query Problem";
            }
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function update(){
        $stmt = $this->db_con->prepare("UPDATE tbl_employees SET column1=:column1, column2=:column2, column3=:column3 WHERE emp_id=:id");
        $stmt->bindParam(":column1", 'value1');
        $stmt->bindParam(":column2", 'value2');
        $stmt->bindParam(":column3", 'value2');
        $stmt->bindParam(":id", 1);

        if($stmt->execute())
        {
            echo "Successfully updated";
        }
        else{
            echo "Query Problem";
        }
    }

    public function edit(){
        $stmt=$this->db_con->prepare("SELECT * FROM tbl_employees WHERE emp_id=:id");
        $stmt->execute(array(':id'=>1));
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function delete(){
        $stmt=$this->db_con->prepare("DELETE FROM tbl_employees WHERE emp_id=:id");
        return $stmt->execute(array(':id'=>1));
    }
}
?>