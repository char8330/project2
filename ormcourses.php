<?php

namespace Model;

class Ormcourses extends \Orm\Model
{
	protected static $_properties = array('courseID', 'courseName', 'courseNumber', 'numOfAssignments');
	protected static $_table_name = 'courses';
	protected static $_primary_key = array('courseID');
}
