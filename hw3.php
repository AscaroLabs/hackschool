<?php
/*
Напишите класс User, в котором примените свойства и константы на своё усмотрение, 
но не менее 2 к каждому. Используйте разные области видимости. Напишите интерфейс 
Human, который класс User должен реализовать. В интерфейсе примените не менее 2 методов. 
Напишите абстрактный класс Client, в котором разместите минимум 1 абстрактный и 1 обычный 
методы. В классе User обязательно должны присутствовать конструктор и деструктор. 
Использовать пустое наполнение методов не допускается. В каждом методе должна быть 
хотя бы 1 операция, связанная с классами, объектами, интерфейсами и свойствами либо константами
*/

interface Human{
    public function get_height():int;
    public function get_eyecolor(): string;
}


abstract class Client{
    abstract public function get_type():?string;
    public static function type_info():string {
        return "A - blue eyes\nB - brown eyes\nC - green eyes\n\n1 -> height >=200\n2 -> 180 < height < 200\n3 -> height <= 180";
    }
}


class User extends Client implements Human{

    private $id;
    private $height;
    private $eyecolor;

    function __construct(int $id = 0, $height = 175, $eyecolor = "brown"){
        $this->id = $id;
        $this->height = $height;
        $this->eyecolor = $eyecolor;
    }

    public function get_type():?string {
        $type = "";

        switch ($this->eyecolor) {
            case "blue":
                $type .= 'A';
                break;
            case "brown":
                $type .= 'B';
                break;
            case "green":
                $type .= 'C';
                break;
            default:
                return NULL;
        }

        if ($this->height >= 200) {
            $type .= '1';
        } elseif ($this->height > 180) {
            $type .= '2';
        } elseif ($this->height >= 0) {
            $type .= '3';
        } else {
            return NULL;
        }

        return $type;
    }

    public function get_height():int {
        return $this->height;
    }

    public function get_eyecolor():string {
        return $this->eyecolor;
    }

    public function get_id():int {
        return $this->id;
    }

    function __destructor() {
        echo "User #".strval($this->id)." (type ".$this->get_type().") destructed!\n";
    }
}

$user0 = new User();
$user1 = new User(1,185,"green");
$user3 = new User(3,144,"blue");

$users = array($user0, $user1, $user3);
foreach ($users as $user){
    echo "User #".strval($user->get_id())."\n";
    echo "Height: ".strval($user->get_height())."\n";
    echo "Eye color: ".strval($user->get_eyecolor())."\n";
    echo "Type: ".strval($user->get_type())."\n";
    echo "====================================\n";
}
echo strval(User::type_info())."\n";

/*
Output:

User #0
Height: 175
Eye color: brown
Type: B3
====================================
User #1
Height: 185
Eye color: green
Type: C2
====================================
User #3
Height: 144
Eye color: blue
Type: A3
====================================
A - blue eyes
B - brown eyes
C - green eyes

1 -> height >=200
2 -> 180 < height < 200
3 -> height <= 180


*/

?>