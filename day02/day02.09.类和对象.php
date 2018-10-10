<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>php学习</title>
</head>
<body>
    <?php
        //字典里面对人类的定义
    class Person
    {
        //定义属性
        protected $name;
        public $gender;
        public $age;
        //构造函数：对属性进行初始化
        public function __construct($name1, $gender1, $age1)
        {
            $this->name = $name1;
            $this->gender = $gender1;
            $this->age = $age1;
        }
        //定义方法
        public function say()
        {
            echo '我是' . $this->name . '，今年' . $this->age . '岁了';
        }
        public function sleep()
        {
            echo '我休息了';
        }

        //声明周期结束：析构函数 释放资源
        // public function __destruct()
        // {
        //     echo '我的工作完成了';
        // }
    }

    class Teacher extends Person {
        public $course;
        public function __construct($name1, $gender1, $age1, $course)
        {
            //显示的调用父级构造函数
            parent::__construct($name1, $gender1, $age1);
            //个性化的一些属性
            $this->course = $course;
        }
        //方法的重载
        public function myCourse()
        {
            echo '我是' . $this->name . '，我上的课是' . $this->course;;
        }
    }


    class Student extends Person{
        
    }


    //产生一个人
    $p1 = new Person('胡文文', 2, 20);
    $p1->age=21;
    $p1->say();
    echo '<hr>';
    $p2 = new Person('汤平', 1, 21);
    // $p2->name;
    $p2->say();

    echo '<hr>';
    //创建一个老师
    $t1 = new Teacher('鲁老师', 1, 30, 'PHP');
    // echo $t1->name;
    $t1->say();
    $t1->myCourse();






    ?>
</body>
</html>