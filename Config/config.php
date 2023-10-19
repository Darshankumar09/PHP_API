<?php

class Config
{
    public $HOSTNAME = "127.0.0.1";
    public $USERNAME = "root";
    public $PASSWORD = "";
    public $DB_NAME = "xyz_pvt_ltd";
    public $connection_res;

    public function connect()
    {
        $this->connection_res = mysqli_connect($this->HOSTNAME, $this->USERNAME, $this->PASSWORD, $this->DB_NAME);
        return $this->connection_res;
    }

    public function insert($name, $post, $salary)
    {
        $this->connect();

        $query = "INSERT INTO employee_data(name, post, salary) VALUES ('$name', '$post', $salary);";

        $res = mysqli_query($this->connection_res, $query);
        return $res;
    }

    public function fetch_data()
    {
        $this->connect();

        $query = "SELECT *FROM employee_data;";

        $res = mysqli_query($this->connection_res, $query);
        return $res;
    }

    public function update($name, $post, $salary, $id)
    {
        $this->connect();

        $query = "UPDATE employee_data SET name='$name', post='$post', salary='$salary' WHERE id='$id';";

        $res = mysqli_query($this->connection_res, $query);
        return $res;
    }

    public function delete($id)
    {
        $this->connect();

        $query = "DELETE FROM employee_data WHERE id=$id;";

        $res = mysqli_query($this->connection_res, $query);
        return $res;
    }

}

?>