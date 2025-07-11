<?php
Class Controller{
    private $db;
    function __construct($conn){
        $this->db = $conn;
    }

    function getDepartments(){
        try{
            $sql = "SELECT * FROM departments";
            $result = $this->db->query($sql);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    function insert($fname,$lname,$salary,$dept_id){
        try{
            $sql = "INSERT INTO employees(fname,lname,salary,department_id) VALUES (:fname,:lname,:salary,:department_id)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":fname",$fname);
            $stmt->bindParam(":lname",$lname);
            $stmt->bindParam(":salary",$salary);
            $stmt->bindParam(":department_id",$dept_id);
            $stmt->execute();
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    function getEmployees(){
        try{
            $sql = "SELECT * FROM employees a INNER JOIN departments b ON a.department_id = b.department_id ORDER BY a.emp_id";
            $result = $this->db->query($sql);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    function getDataEmployees($id){
        try{
            $sql = "SELECT * FROM employees WHERE emp_id=:emp_id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam("emp_id",$id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    function delete($id){
        try{
            $sql = "DELETE FROM employees WHERE emp_id=:emp_id"; 
            $stmt =$this->db->prepare($sql);
            $stmt->bindParam("emp_id",$id);
            $stmt->execute();
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    function updateData($id,$fname,$lname,$salary,$dept_id){
        try{
            $sql = "UPDATE employees SET fname=:fname,lname=:lname,salary=:salary,department_id=:department_id WHERE emp_id=:emp_id"; 
            $stmt =$this->db->prepare($sql);
            $stmt->bindParam("emp_id",$id);
            $stmt->bindParam(":fname",$fname);
            $stmt->bindParam(":lname",$lname);
            $stmt->bindParam(":salary",$salary);
            $stmt->bindParam(":department_id",$dept_id);
            $stmt->execute();
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
}
?>