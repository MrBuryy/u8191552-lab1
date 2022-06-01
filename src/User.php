<?php

include __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;

class User
{
    private int $id;
    private string $name;
    private string $email;
    private string $password;
    private DateTime $createDate;

    /**
     * Constructor
     *
     * Сreation time is set by default
     *
     * @param int $id - Id of user
     * @param string $name - Name of user
     * @param string $email - Email of user
     * @param string $password - Password of user
     */
    public function __construct(int $id, string $name, string $email, string $password)
    {
        $this->setId($id);
        $this->setName($name);
        $this->setEmail($email);
        $this->setPassword($password);
        $this->setCreateDate();
    }


    /**
     * Getter for the id.
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Getter for the name.
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Getter for the email.
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Getter for the password.
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Getter for the createDate.
     * @return DateTime
     */
    public function getCreateDate(): DateTime
    {
        return $this->createDate;
    }


    /**
     * Setter for the id.
     * @param int @id
     * @return void
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * Setter for the name.
     * @param string @name
     * @return void
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * Setter for the email.
     * @param string @email
     * @return void
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * Setter for the password.
     * @param string @password
     * @return void
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * Setter for the creationDate.
     *
     * Setter is private and used only in Costruct.
     *
     * @return void
     */
    private function setCreateDate(): void
    {
        $this->createDate = new DateTime();
    }


    /**
     * ToString
     * @return string
     */
    function __toString(): string
    {
        return 'User{' .
            'id=' . $this->getId() .
            ', name=' . $this->getName() .
            ', email=' . $this->getEmail() .
            ', password=' . $this->getPassword() .
            ', createDate=' . $this->getCreateDate()->format('Y-m-d H:i:s').
            '}';
    }


    public static function loadValidatorMetadata(ClassMetadata $metadata)
     {
         $metadata->addPropertyConstraints("id", [
             new Assert\Length([
                 'min' => 7,
                 'max' => 10,
                 'minMessage' => 'User\'s id is too short. It should have {{ limit }} characters or more.',
                 'maxMessage' => 'User\'s id is too long. It should have {{ limit }} characters or less.'
         ]),
             new Assert\Positive([
                 'message' => 'User\'s id must be positive number.'
             ]),
             new Assert\NotBlank([
                 'message' => 'User\'s id can\'t be blank.'
             ]),
         ]);
         $metadata->addPropertyConstraints("name", [
             new  Assert\Length([
                 'min' => 2,
                 'max' => 20,
                 'minMessage' => 'User\'s name is too short. It should have {{ limit }} characters or more.',
                 'maxMessage' => 'User\'s name is too long. It should have {{ limit }} characters or less.'
             ]),
             new Assert\Regex([
                 'pattern' => '/\d/',
                 'match'   => false,
                 'message' => 'User\'s name cannot contain a number',
             ]),
             new Assert\NotBlank([
                 'message' => 'User\'s name can\'t be blank.'
             ]),
         ]);
         $metadata->addPropertyConstraints("email",[
             new Assert\Email([
                 'message' => 'The email "{{ value }}" is not a valid email.',
             ]),
             new Assert\NotBlank([
                 'message' => 'User\'s email can\'t be blank.'
             ]),
         ]);
         $metadata->addPropertyConstraints("password",[
             new  Assert\Length([
                'min' => 8,
                'minMessage' => 'The password is too short. It should have {{ limit }} characters or more.',
            ]),
             new Assert\NotBlank([
                 'message' => 'User\'s password can\'t be blank.'
             ]),
         ]);

     }
}