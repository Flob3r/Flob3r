<?php


namespace Symfony\Component\Security\Core\User;

interface UserInterface{

    /** Get Role from the User */
    public function getRoles();

    /** Get Password from the User */
    public function getPassword();

    /** Get the salt used to hash password */
    public function getSalt();

    /** Removes data from the User */
    public function eraseCredentials();

    /** @return string */
    public function getUsername();

}