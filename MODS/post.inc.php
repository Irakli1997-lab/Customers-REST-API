<?php 
class Post {
    private $conn;
    private $table = 'posts';
    public $id;
    public $firstName;
    public $lastName;
    public $birth;
    public $gender;
    public $country;
    public $address;
    public $position;
    public $date;
    public function __construct($db)
    {
      $this -> conn = $db;
    }
    public function read()
    {
        $query = 'SELECT id, firstName, lastName, birth, gender, country, address, position, date FROM customers';
        $stmt = $this -> conn -> prepare($query);
        $stmt -> execute();
        return $stmt;
    }
    public function single()
    {
        $query = 'SELECT id, firstName, lastName, birth, gender, country, address, position, date FROM customers WHERE id=? LIMIT 0,1';
        $stmt = $this -> conn -> prepare($query);
        $stmt -> bindParam(1, $this -> id);
        $stmt -> execute();
        $row = $stmt -> fetch(PDO::FETCH_ASSOC);
        $this -> First_Name = $row['firstName'];
        $this -> Last_Name = $row['lastName'];
        $this -> Date_of_Birth = $row['birth'];
        $this -> Gender = $row['gender'];
        $this -> Country = $row['country'];
        $this -> Address = $row['address'];
        $this -> Job_Position = $row['position'];
        $this -> Account_Date = $row['date'];
    }
    public function create()
    {
        $query = 'INSERT INTO customers SET firstName = :First_Name, lastName = :Last_Name, birth = :Date_of_Birth, gender = :Gender, country = :Country, address = :Address, position = :Job_Position';
        $stmt = $this -> conn -> prepare($query);
        $this -> First_Name = htmlspecialchars(strip_tags($this -> First_Name));
        $this -> Last_Name = htmlspecialchars(strip_tags($this -> Last_Name));
        $this -> Date_of_Birth = htmlspecialchars(strip_tags($this -> Date_of_Birth));
        $this -> Gender = htmlspecialchars(strip_tags($this -> Gender));
        $this -> Country = htmlspecialchars(strip_tags($this -> Country));
        $this -> Address = htmlspecialchars(strip_tags($this -> Address));
        $this -> Job_Position = htmlspecialchars(strip_tags($this -> Job_Position));
        $stmt -> bindParam(':First_Name', $this -> First_Name);
        $stmt -> bindParam(':Last_Name', $this -> Last_Name);
        $stmt -> bindParam(':Date_of_Birth', $this -> Date_of_Birth);
        $stmt -> bindParam(':Gender', $this -> Gender);
        $stmt -> bindParam(':Country', $this -> Country);
        $stmt -> bindParam(':Address', $this -> Address);
        $stmt -> bindParam(':Job_Position', $this -> Job_Position);
        if($stmt -> execute())
        {
          return true;
        }
        printf("Error: %s.\n", $stmt -> error);
        return false;
    }
    public function update()
    {
        $query = 'UPDATE customers SET firstName = :First_Name, lastName = :Last_Name, birth = :Date_of_Birth, gender = :Gender, country = :Country, address = :Address, position = :Job_Position WHERE id = :ID';
        $stmt = $this -> conn -> prepare($query);

        $this -> ID = htmlspecialchars(strip_tags($this -> ID));
        $this -> First_Name = htmlspecialchars(strip_tags($this -> First_Name));
        $this -> Last_Name = htmlspecialchars(strip_tags($this -> Last_Name));
        $this -> Date_of_Birth = htmlspecialchars(strip_tags($this -> Date_of_Birth));
        $this -> Gender = htmlspecialchars(strip_tags($this -> Gender));
        $this -> Country = htmlspecialchars(strip_tags($this -> Country));
        $this -> Address = htmlspecialchars(strip_tags($this -> Address));
        $this -> Job_Position = htmlspecialchars(strip_tags($this -> Job_Position));

        $stmt -> bindParam(':ID', $this  ->  ID);
        $stmt -> bindParam(':First_Name', $this -> First_Name);
        $stmt -> bindParam(':Last_Name', $this -> Last_Name);
        $stmt -> bindParam(':Date_of_Birth', $this -> Date_of_Birth);
        $stmt -> bindParam(':Gender', $this -> Gender);
        $stmt -> bindParam(':Country', $this -> Country);
        $stmt -> bindParam(':Address', $this -> Address);
        $stmt -> bindParam(':Job_Position', $this -> Job_Position);
        if($stmt -> execute())
        {
          return true;
        }
        printf("Error: %s.\n", $stmt  ->  error);
        return false;
    }
    public function delete()
    {
        $query = 'DELETE FROM customers WHERE id = :ID';
        $stmt = $this -> conn -> prepare($query);
        $this  ->  ID = htmlspecialchars(strip_tags($this  ->  ID));
        $stmt  ->  bindParam(':ID', $this  ->  ID); 
        if($stmt  ->  execute())
        {
          return true;
        }
        printf("Error: %s.\n", $stmt  ->  error);
        return false;
    }
}