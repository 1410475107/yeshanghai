<?
    // phpinfo();

?>


<?

$arr = [1, 2, 3];
$b = 10;
var_dump($b);

echo '<hr>';

echo gettype($b);


echo '<hr>';
var_dump(isset($b));


foreach ($arr as $key => $value) {
    echo '<hr>' . $value;
}

$student = ['name' => '1', 'gender' => 2];
foreach ($student as $key => $value) {
    echo '<hr>' . $key . '
        
        <p>
        <br>

        ';
}


echo json_encode($student);

$obj = '{"name":"1","gender":2}';
var_dump(json_decode($obj, true));



$mydb = new mysqli('localhost', 'root', 'root', 'shanghai1807', 3306);
$mydb->query('SET NAMES UTF8');
$result = $mydb->query('SELECT * FROm students WHERE 1');


echo '<hr>';
var_dump($result);
echo '<hr>';
echo '<pre>';
print_r($result->fetch_all());
echo '</pre>';


echo '<hr>';
  class Person 
  {
      public  $name;
      public $age;
      public function __construct($name, $age)
      {
          $this->name = $name;
          $this->age = $age;
      }

      public function getName()
      {
            return $this->name;
      }

      public function __get($arg)
      {
          return $this->$arg;
      }

      public function __destruct()
      {
         echo '执行';   
      }
  }

  $p1 = new Person('张三', 23);
  echo $p1->getName();

  echo $p1->__get('age');
  $p1->name = '李四';
  echo $p1->name;






  

?>