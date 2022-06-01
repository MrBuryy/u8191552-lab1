<?php


include __DIR__ . '/User.php';

class Comment
{
    private User $user;  
    private string $text;

    /**
     * Constructor
     *
     * @param User $user - Author of comment
     * @param string $text - Text of comment
     */
    public function __construct(User $user, string $text)
    {
        $this->setUser($user);
        $this->setText($text);
    }


    /**
     * Getter for the user.
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * Getter for the text.
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }


    /**
     * Setter for the user.
     * @param User @user
     * @return void
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    /**
     * Setter for the text.
     * @param string @text
     * @return void
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }


    /**
     * ToString
     * @return string
     */
    function __toString(): string
    {
        return 'Comment{' .
            'user=' . $this->getUser() .
            ', text=' . $this->getText() .
            '}';
    }
}


?>