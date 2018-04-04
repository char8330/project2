<?php

namespace Model;

class ormtravel extends \Orm\Model
{
	protected static $_properties = array('id', 'user', 'comm'); //, 'attraction'); //TODO: ADD attraction col
	protected static $_table_name = 'comments';
	protected static $_primary_key = array('id');
}
