<?php

namespace PradoDigital\Rackspace\Apps\Entity;

class Admin extends AbstractEntity
{
    private $adminId;

    private $allowSimultaneousLogins;

    private $email;

    private $enabled;

    private $locked;

    private $lastName;

    private $passwordExpiration;

    private $type;

    private $restrictedIps;

    /**
     * @return the $adminId
     */
    public function getAdminId()
    {
        return $this->adminId;
    }

    /**
     * @return the $allowSimultaneousLogins
     */
    public function getAllowSimultaneousLogins()
    {
        return $this->allowSimultaneousLogins;
    }

    /**
     * @return the $email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return the $enabled
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * @return the $locked
     */
    public function getLocked()
    {
        return $this->locked;
    }

    /**
     * @return the $lastName
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @return the $passwordExpiration
     */
    public function getPasswordExpiration()
    {
        return $this->passwordExpiration;
    }

    /**
     * @return the $type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return the $restrictedIps
     */
    public function getRestrictedIps()
    {
        return $this->restrictedIps;
    }

    /**
     * @param field_type $adminId
     */
    public function setAdminId($adminId)
    {
        $this->adminId = $adminId;
        return $this;
    }

    /**
     * @param field_type $allowSimultaneousLogins
     */
    public function setAllowSimultaneousLogins($allowSimultaneousLogins)
    {
        $this->allowSimultaneousLogins = (bool) $allowSimultaneousLogins;
        return $this;
    }

    /**
     * @param field_type $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @param field_type $enabled
     */
    public function setEnabled($enabled)
    {
        $this->enabled = (bool) $enabled;
        return $this;
    }

    /**
     * @param field_type $locked
     */
    public function setLocked($locked)
    {
        $this->locked = (bool) $locked;
        return $this;
    }

    /**
     * @param field_type $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @param field_type $passwordExpiration
     */
    public function setPasswordExpiration($passwordExpiration)
    {
        $this->passwordExpiration = $passwordExpiration;
        return $this;
    }

    /**
     * @param field_type $type
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @param array $restrictedIps
     */
    public function setRestrictedIps(array $restrictedIps)
    {
        $this->restrictedIps = $restrictedIps;
        return $this;
    }

}
