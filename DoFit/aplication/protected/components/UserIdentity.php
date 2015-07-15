<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
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
	  
	  $usuario = Usuario::model()->findByAttributes(array('email' => $this->username));
		if($usuario == null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif(md5($this->password) != $usuario->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
		{
			$this->_id=$usuario->id_usuario;
			$this->setState("email",$usuario->email);
			$this->errorCode=self::ERROR_NONE;
		}
		return !$this->errorCode;
	}


    public function valid()
    {
        $usuario = Usuario::model()->findByAttributes(array('email' => $this->username));

        if ($usuario->id_estado == 0)
            $this->errorCode = self::ERROR_USERNAME_INACTIVE;
        else
            $this->errorCode = self::ERROR_NONE;

        return !$this->errorCode;
    }

    public function getId()
    {
        return $this->_id;
    }
}