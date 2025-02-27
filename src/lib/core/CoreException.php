<?php defined('SCRIPTLOG') || die("Direct access not permitted");
/**
 * CoreException Class extends Exception implements ICoreThrowable
 *
 * @category  Core Class
 * @link      https://secure.php.net/manual/en/language.exceptions.php#91159
 * @see       https://www.php.net/manual/en/language.exceptions.extending.php
 * @version   1.0
 * @since     Since Release 1.0
 *
 */
class CoreException extends Exception implements ICoreThrowable
{
  
protected $message = 'Unknown Exception';

public function __construct($message = null, $code = 0, Exception $previous = null)
{

  ( isset($code) ) ? $this->getCode() : 0;

  if (!$message) {

    throw new $this('Unknown'.get_class($this));
    
  }

  parent::__construct($message, $code, $previous);

  if (!is_null($previous)) {

   $this->previous = $previous;

  }

}

public function __toString()
{
  return get_class($this) . "'{$this->message}' in {$this->getFile()}({$this->getLine()})\n"
                            . "{$this->getTraceAsString()}";
}
  
}