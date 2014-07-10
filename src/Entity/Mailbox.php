<?php

namespace PradoDigital\Rackspace\Apps\Entity;

use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class Mailbox extends AbstractEntity
{
    private $name;

    private $displayName;

    private $createdDate;

    private $currentUsage;

    private $contactInfo;

    private $emailAddressList;

    private $emailForwardingAddress;

    private $enabled;

    private $hasActiveSyncMobileService;

    private $hasBlackBerryMobileService;

    private $isHidden;

    private $isPublicFolderAdmin;

    private $lastLogin;

    private $samAccountName;

    private $size;

    private $visibleInRackspaceEmailCompanyDirectory;

    public function denormalize(DenormalizerInterface $denormalizer, $data, $format = null, array $context = array())
    {
        if (isset($data['createdDate'])) {
            $data['createdDate'] = new \DateTime($data['createdDate']);
        }

        if (isset($data['lastLogin'])) {
            $data['lastLogin'] = new \DateTime($data['lastLogin']);
        }

        return parent::denormalize($denormalizer, $data, $format);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * @return array
     */
    public function getContactInfo()
    {
        return $this->contactInfo;
    }

    /**
     * @return array
     */
    public function getEmailAddressList()
    {
        return $this->emailAddressList;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * @return string
     */
    public function getCurrentUsage()
    {
        return $this->currentUsage;
    }

    /**
     * @return unknown
     */
    public function getEmailForwardingAddress()
    {
        return $this->emailForwardingAddress;
    }

    /**
     * @return unknown
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * @return unknown
     */
    public function getHasActiveSyncMobileService()
    {
        return $this->hasActiveSyncMobileService;
    }

    /**
     * @return unknown
     */
    public function getHasBlackBerryMobileService()
    {
        return $this->hasBlackBerryMobileService;
    }

    /**
     * @return unknown
     */
    public function getIsHidden()
    {
        return $this->isHidden;
    }

    /**
     * @return unknown
     */
    public function getIsPublicFolderAdmin()
    {
        return $this->isPublicFolderAdmin;
    }

    /**
     * @return unknown
     */
    public function getLastLogin()
    {
        return $this->lastLogin;
    }

    /**
     * @return unknown
     */
    public function getSamAccountName()
    {
        return $this->samAccountName;
    }

    /**
     * @return unknown
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @return unknown
     */
    public function getVisibleInRackspaceEmailCompanyDirectory()
    {
        return $this->visibleInRackspaceEmailCompanyDirectory;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param string $displayName
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }

    /**
     * @param array $contactInfo
     */
    public function setContactInfo(array $contactInfo)
    {
        $this->contactInfo = $contactInfo;
        return $this;
    }

    /**
     * @param array $contactInfo
     */
    public function setEmailAddressList(array $emailAddressList)
    {
        $this->emailAddressList = $emailAddressList;
        return $this;
    }

    /**
     * @param \DateTime $createdDate
     */
    public function setCreatedDate(\DateTime $createdDate)
    {
        $this->createdDate = $createdDate;
        return $this;
    }

    /**
     * @param int $currentUsage
     */
    public function setCurrentUsage($currentUsage)
    {
        $this->currentUsage = intval($currentUsage);
        return $this;
    }

    /**
     * @param string $emailForwardingAddress
     */
    public function setEmailForwardingAddress($emailForwardingAddress)
    {
        $this->emailForwardingAddress = $emailForwardingAddress;
        return $this;
    }

    /**
     * @param bool $enabled
     */
    public function setEnabled($enabled)
    {
        $this->enabled = (bool) $enabled;
        return $this;
    }

    /**
     * @param bool $hasActiveSyncMobileService
     */
    public function setHasActiveSyncMobileService($hasActiveSyncMobileService)
    {
        $this->hasActiveSyncMobileService = (bool) $hasActiveSyncMobileService;
        return $this;
    }

    /**
     * @param bool $hasBlackBerryMobileService
     */
    public function setHasBlackBerryMobileService($hasBlackBerryMobileService)
    {
        $this->hasBlackBerryMobileService = (bool) $hasBlackBerryMobileService;
        return $this;
    }

    /**
     * @param bool $isHidden
     */
    public function setIsHidden($isHidden)
    {
        $this->isHidden = (bool) $isHidden;
        return $this;
    }

    /**
     * @param bool $isPublicFolderAdmin
     */
    public function setIsPublicFolderAdmin($isPublicFolderAdmin)
    {
        $this->isPublicFolderAdmin = (bool) $isPublicFolderAdmin;
        return $this;
    }

    /**
     * @param \DateTime $lastLogin
     */
    public function setLastLogin(\DateTime $lastLogin)
    {
        $this->lastLogin = $lastLogin;
        return $this;
    }

    /**
     * @param string $samAccountName
     */
    public function setSamAccountName($samAccountName)
    {
        $this->samAccountName = $samAccountName;
        return $this;
    }

    /**
     * @param int $size
     */
    public function setSize($size)
    {
        $this->size = intval($size);
        return $this;
    }

    /**
     * @param bool $visibleInRackspaceEmailCompanyDirectory
     */
    public function setVisibleInRackspaceEmailCompanyDirectory($visibleInRackspaceEmailCompanyDirectory)
    {
        $this->visibleInRackspaceEmailCompanyDirectory = (bool) $visibleInRackspaceEmailCompanyDirectory;
        return $this;
    }
}
