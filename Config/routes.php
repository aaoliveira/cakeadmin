<?php

	Router::connect('/login', array('plugin'=>'admin','controller' => 'users', 'action' => 'login'));
	Router::connect('/logout', array('plugin'=>'admin','controller' => 'users', 'action' => 'logout'));
	Router::connect('/users', array('plugin'=>'admin','controller' => 'users', 'action' => 'index'));
	Router::connect('/groups', array('plugin'=>'admin','controller' => 'groups', 'action' => 'index'));
	Router::connect('/privileges', array('plugin'=>'admin','controller' => 'privileges', 'action' => 'index'));

