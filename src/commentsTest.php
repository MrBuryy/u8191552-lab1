<?php



include __DIR__ . '/Comment.php';


//Создаем пользователей до временной границы
$user1 = new User(12345678, "user_one", "email1@example.com", "123456789");
$user2 = new User(12345679, "user_two", "email2@example.com", "123456789");

//Немного ждем
sleep(20);

//Задаем временную границу
$border = DateTime::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s'));

//Немного ждем
sleep(20);

//Создаем пользователей после временной границы
$user3 = new User(12345671, "user_three", "email@example.com", "123456789");
$user4 = new User(12345673, "user_four", "email@example.com", "123456789");

echo $user1 . "<br>";
echo $user2 . "<br>";
echo $user3 . "<br>";
echo $user4 . "<br><br><br>";

//Создаем массив комментов
$comments[] = new Comment($user1, "comm1");
$comments[] = new Comment($user2, "comm2");
$comments[] = new Comment($user3, "comm3");
$comments[] = new Comment($user4, "comm4");

//Выведуться только комментарии user_three и user_four
foreach ($comments as $comment) {
    if ($comment->getUser()->getCreateDate() > $border) {
        echo $comment."<br>";
    }
}