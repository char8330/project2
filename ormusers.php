<?php
namespace Model;
class ormusers extends \Orm\Model
{
	protected static $_properties = array('username', 'email', 'PassHash', 'secretKey'); //TODO: ADD attraction
	protected static $_table_name = 'users';
	protected static $_primary_key = array('username');
}
