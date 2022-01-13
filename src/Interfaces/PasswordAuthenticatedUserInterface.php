<?php

namespace Symfony\Component\Security\Core\User;

interface PasswordAuthenticatedUserInterface{

    /** Return hashed password for authenticate the User
     * @return string|null (null if password not set or erased)
     */
    public function getPassword(): ?string;

}