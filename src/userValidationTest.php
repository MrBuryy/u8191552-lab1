<?php

include __DIR__ . "/../vendor/autoload.php";
include __DIR__ . "/User.php";


use Symfony\Component\Validator\ValidatorBuilder;
echo '11111111111111111111111111111111111111111111111<br>';
/**
 * Function prints information about
 * validation of User
 * @param User $user
 * @return void
*/
function validateUser(User $user) {
    $validator = (new ValidatorBuilder())->addMethodMapping('loadValidatorMetadata')->getValidator();
    echo '11111111111111111111111111111111111111111111111<br>';
    $errors = $validator->validate($user);
    echo '11111111111111111111111111111111111111111111111<br>';
    if(count($errors) > 0) {
        foreach ($errors as $error) {
            echo $error."<br>";
        }
    }
}


$newUser = new User((int)null, "", "", "");
validateUser($newUser);
echo '<br>';

$newUser = new User(0, "e", "erg@", "qq");
validateUser($newUser);
echo '<br>';

$newUser = new User(-2334, "wrrrr1gw", "bwegp@weg", "13rwrgwr");
validateUser($newUser);
echo '<br>';

$newUser = new User(5, "wrgwrgrgwrg", "weg@wrg.", "2wgw");
validateUser($newUser);
echo '<br>';

$newUser = new User(123456789, "ergegergerhg", "ergg@ergerg.com", "132t2g2g22");
validateUser($newUser);
echo '<br>';
