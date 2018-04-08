<?php

namespace Model;

class ormattraction extends \Orm\Model
{
	protected static $_properties = array('attID', 'firstName', 'descriptionName', 'img'); //, 'attraction'); //TODO: ADD attraction col
	protected static $_table_name = 'a';
	protected static $_primary_key = array('attID');
}
