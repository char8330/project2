<?php

namespace Model;

class ormbrochure extends \Orm\Model
{
	protected static $_properties = array('id', 'user', 'quantity'); //, 'attraction'); //TODO: ADD attraction
	protected static $_table_name = 'brochure';
	protected static $_primary_key = array('id');
}
