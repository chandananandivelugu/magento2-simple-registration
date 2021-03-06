<?php
namespace Test\Simpleregistration\Model\Data;

use Test\Simpleregistration\Api\Data\RegistrationInterface;

class Registration extends \Magento\Framework\Api\AbstractExtensibleObject implements RegistrationInterface
{

    /**
     * Get registration_id
     * @return string|null
     */
    public function getRegistrationId()
    {
        return $this->_get(self::REGISTRATION_ID);
    }

    /**
     * Set registration_id
     * @param string $registrationId
     * @return \Test\Simpleregistration\Api\Data\RegistrationInterface
     */
    public function setRegistrationId($registrationId)
    {
        return $this->setData(self::REGISTRATION_ID, $registrationId);
    }

    /**
     * Get firstname
     * @return string|null
     */
    public function getFirstname()
    {
        return $this->_get(self::FIRSTNAME);
    }

    /**
     * Set firstname
     * @param string $firstname
     * @return \Test\Simpleregistration\Api\Data\RegistrationInterface
     */
    public function setFirstname($firstname)
    {
        return $this->setData(self::FIRSTNAME, $firstname);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Test\Simpleregistration\Api\Data\RegistrationExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param \Test\Simpleregistration\Api\Data\RegistrationExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Test\Simpleregistration\Api\Data\RegistrationExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

    /**
     * Get lastname
     * @return string|null
     */
    public function getLastname()
    {
        return $this->_get(self::LASTNAME);
    }

    /**
     * Set lastname
     * @param string $lastname
     * @return \Test\Simpleregistration\Api\Data\RegistrationInterface
     */
    public function setLastname($lastname)
    {
        return $this->setData(self::LASTNAME, $lastname);
    }

    /**
     * Get email
     * @return string|null
     */
    public function getEmail()
    {
        return $this->_get(self::EMAIL);
    }

    /**
     * Set email
     * @param string $email
     * @return \Test\Simpleregistration\Api\Data\RegistrationInterface
     */
    public function setEmail($email)
    {
        return $this->setData(self::EMAIL, $email);
    }

    /**
     * Get phone
     * @return string|null
     */
    public function getPhone()
    {
        return $this->_get(self::PHONE);
    }

    /**`    
     * Set phone
     * @param string $phone
     * @return \Test\Simpleregistration\Api\Data\RegistrationInterface
     */
    public function setPhone($phone)
    {
        return $this->setData(self::PHONE, $phone);
    }
}
