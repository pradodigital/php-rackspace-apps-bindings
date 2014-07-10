<?php

namespace PradoDigital\Rackspace\Apps\Entity;

class Domain extends AbstractEntity
{
    private $name;

    private $accountNumber;

    private $serviceType;

    private $exchangeBaseMailboxSize;

    private $exchangeUsedStorage;

    private $exchangeTotalStorage;

    private $exchangeExtraStorage;

    private $exchangeMaxNumMailboxes;

    private $rsEmailBaseMailboxSize;

    private $rsEmailMaxNumberMailboxes;

    private $rsEmailExtraStorage;

    private $rsEmailUsedStorage;

    private $aliases;

    private $archivingServiceEnabled;

    private $publicFoldersEnabled;

    private $blackBerryMobileServiceEnabled;

    private $blackBerryLicenses;

    private $activeSyncMobileServiceEnabled;

    private $activeSyncLicenses;

    public function __construct()
    {
        $this->aliases = array();
    }

    /**
     * @return unknown
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return unknown
     */
    public function getAccountNumber()
    {
        return $this->accountNumber;
    }

    /**
     * @return unknown
     */
    public function getServiceType()
    {
        return $this->serviceType;
    }

    /**
     * @return unknown
     */
    public function getExchangeBaseMailboxSize()
    {
        return $this->exchangeBaseMailboxSize;
    }

    /**
     * @return unknown
     */
    public function getExchangeUsedStorage()
    {
        return $this->exchangeUsedStorage;
    }

    /**
     * @return unknown
     */
    public function getExchangeTotalStorage()
    {
        return $this->exchangeTotalStorage;
    }

    /**
     * @return unknown
     */
    public function getExchangeExtraStorage()
    {
        return $this->exchangeExtraStorage;
    }

    /**
     * @return unknown
     */
    public function getExchangeMaxNumMailboxes()
    {
        return $this->exchangeMaxNumMailboxes;
    }

    /**
     * @return unknown
     */
    public function getRsEmailBaseMailboxSize()
    {
        return $this->rsEmailBaseMailboxSize;
    }

    /**
     * @return unknown
     */
    public function getRsEmailMaxNumberMailboxes()
    {
        return $this->rsEmailMaxNumberMailboxes;
    }

    /**
     * @return unknown
     */
    public function getRsEmailExtraStorage()
    {
        return $this->rsEmailExtraStorage;
    }

    /**
     * @return unknown
     */
    public function getRsEmailUsedStorage()
    {
        return $this->rsEmailUsedStorage;
    }

    /**
     * @return unknown
     */
    public function getAliases()
    {
        return $this->aliases;
    }

    /**
     * @return unknown
     */
    public function getArchivingServiceEnabled()
    {
        return $this->archivingServiceEnabled;
    }

    /**
     * @return unknown
     */
    public function getPublicFoldersEnabled()
    {
        return $this->publicFoldersEnabled;
    }

    /**
     * @return unknown
     */
    public function getBlackBerryMobileServiceEnabled()
    {
        return $this->blackBerryMobileServiceEnabled;
    }

    /**
     * @return unknown
     */
    public function getBlackBerryLicenses()
    {
        return $this->blackBerryLicenses;
    }

    /**
     * @return unknown
     */
    public function getActiveSyncMobileServiceEnabled()
    {
        return $this->activeSyncMobileServiceEnabled;
    }

    /**
     * @return unknown
     */
    public function getActiveSyncLicenses()
    {
        return $this->activeSyncLicenses;
    }

    /**
     * @param field_type $name
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param field_type $accountNumber
     */
    public function setAccountNumber($accountNumber)
    {
        $this->accountNumber = $accountNumber;
        return $this;
    }

    /**
     * @param field_type $serviceType
     */
    public function setServiceType($serviceType)
    {
        $this->serviceType = $serviceType;
        return $this;
    }

    /**
     * @param field_type $exchangeBaseMailboxSize
     */
    public function setExchangeBaseMailboxSize($exchangeBaseMailboxSize)
    {
        $this->exchangeBaseMailboxSize = $exchangeBaseMailboxSize;
        return $this;
    }

    /**
     * @param field_type $exchangeUsedStorage
     */
    public function setExchangeUsedStorage($exchangeUsedStorage)
    {
        $this->exchangeUsedStorage = $exchangeUsedStorage;
        return $this;
    }

    /**
     * @param field_type $exchangeTotalStorage
     */
    public function setExchangeTotalStorage($exchangeTotalStorage)
    {
        $this->exchangeTotalStorage = $exchangeTotalStorage;
        return $this;
    }

    /**
     * @param field_type $exchangeExtraStorage
     */
    public function setExchangeExtraStorage($exchangeExtraStorage)
    {
        $this->exchangeExtraStorage = $exchangeExtraStorage;
        return $this;
    }

    /**
     * @param field_type $exchangeMaxNumMailboxes
     */
    public function setExchangeMaxNumMailboxes($exchangeMaxNumMailboxes)
    {
        $this->exchangeMaxNumMailboxes = $exchangeMaxNumMailboxes;
        return $this;
    }

    /**
     * @param field_type $rsEmailBaseMailboxSize
     */
    public function setRsEmailBaseMailboxSize($rsEmailBaseMailboxSize)
    {
        $this->rsEmailBaseMailboxSize = $rsEmailBaseMailboxSize;
        return $this;
    }

    /**
     * @param field_type $rsEmailMaxNumberMailboxes
     */
    public function setRsEmailMaxNumberMailboxes($rsEmailMaxNumberMailboxes)
    {
        $this->rsEmailMaxNumberMailboxes = $rsEmailMaxNumberMailboxes;
        return $this;
    }

    /**
     * @param field_type $rsEmailExtraStorage
     */
    public function setRsEmailExtraStorage($rsEmailExtraStorage)
    {
        $this->rsEmailExtraStorage = $rsEmailExtraStorage;
        return $this;
    }

    /**
     * @param field_type $rsEmailUsedStorage
     */
    public function setRsEmailUsedStorage($rsEmailUsedStorage)
    {
        $this->rsEmailUsedStorage = $rsEmailUsedStorage;
        return $this;
    }

    /**
     * @param field_type $aliases
     */
    public function setAliases($aliases)
    {
        $this->aliases = $aliases;
        return $this;
    }

    /**
     * @param field_type $archivingServiceEnabled
     */
    public function setArchivingServiceEnabled($archivingServiceEnabled)
    {
        $this->archivingServiceEnabled = $archivingServiceEnabled;
        return $this;
    }

    /**
     * @param field_type $publicFoldersEnabled
     */
    public function setPublicFoldersEnabled($publicFoldersEnabled)
    {
        $this->publicFoldersEnabled = $publicFoldersEnabled;
        return $this;
    }

    /**
     * @param field_type $blackBerryMobileServiceEnabled
     */
    public function setBlackBerryMobileServiceEnabled($blackBerryMobileServiceEnabled)
    {
        $this->blackBerryMobileServiceEnabled = $blackBerryMobileServiceEnabled;
        return $this;
    }

    /**
     * @param field_type $blackBerryLicenses
     */
    public function setBlackBerryLicenses($blackBerryLicenses)
    {
        $this->blackBerryLicenses = $blackBerryLicenses;
        return $this;
    }

    /**
     * @param field_type $activeSyncMobileServiceEnabled
     */
    public function setActiveSyncMobileServiceEnabled($activeSyncMobileServiceEnabled)
    {
        $this->activeSyncMobileServiceEnabled = $activeSyncMobileServiceEnabled;
        return $this;
    }

    /**
     * @param field_type $activeSyncLicenses
     */
    public function setActiveSyncLicenses($activeSyncLicenses)
    {
        $this->activeSyncLicenses = $activeSyncLicenses;
        return $this;
    }

}
