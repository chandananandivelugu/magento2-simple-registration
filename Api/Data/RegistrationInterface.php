<?php
/**
 * Show simple registration form in front end and admin grid
 * Copyright (C) 2019 chandana
 * 
 * This file is part of Test/Simpleregistration.
 * 
 * Test/Simpleregistration is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

namespace Test\Simpleregistration\Api\Data;

interface RegistrationInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{

    const FIRSTNAME = 'firstname';
    const EMAIL = 'email';
    const LASTNAME = 'lastname';
    const REGISTRATION_ID = 'registration_id';
    const PHONE = 'phone';

    /**
     * Get registration_id
     * @return string|null
     */
    public function getRegistrationId();

    /**
     * Set registration_id
     * @param string $registrationId
     * @return \Test\Simpleregistration\Api\Data\RegistrationInterface
     */
    public function setRegistrationId($registrationId);

    /**
     * Get firstname
     * @return string|null
     */
    public function getFirstname();

    /**
     * Set firstname
     * @param string $firstname
     * @return \Test\Simpleregistration\Api\Data\RegistrationInterface
     */
    public function setFirstname($firstname);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Test\Simpleregistration\Api\Data\RegistrationExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \Test\Simpleregistration\Api\Data\RegistrationExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Test\Simpleregistration\Api\Data\RegistrationExtensionInterface $extensionAttributes
    );

    /**
     * Get lastname
     * @return string|null
     */
    public function getLastname();

    /**
     * Set lastname
     * @param string $lastname
     * @return \Test\Simpleregistration\Api\Data\RegistrationInterface
     */
    public function setLastname($lastname);

    /**
     * Get email
     * @return string|null
     */
    public function getEmail();

    /**
     * Set email
     * @param string $email
     * @return \Test\Simpleregistration\Api\Data\RegistrationInterface
     */
    public function setEmail($email);

    /**
     * Get phone
     * @return string|null
     */
    public function getPhone();

    /**
     * Set phone
     * @param string $phone
     * @return \Test\Simpleregistration\Api\Data\RegistrationInterface
     */
    public function setPhone($phone);
}
