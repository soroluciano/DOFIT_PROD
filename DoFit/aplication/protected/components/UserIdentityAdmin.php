<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentityAdmin extends CUserIdentity
{
	private $_id;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
	     $admin = Admin::model()->findByAttributes(array('usuario' => $this->username));
		if($admin == null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif(md5($this->password) != $admin->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
		{
            $this->setState("usuario",$admin->usuario);
			$this->errorCode=self::ERROR_NONE;
		}
		return !$this->errorCode;
	}


    public function getId()
    {
        return $this->_id;
    }
}