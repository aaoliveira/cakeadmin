# Plugin Admin for CakePHP

## Goal 

To control user access to application. It controls access to each action of each controller.
The setting are recorded in a table. 

Also have a menu what display to users only the controllers that they have access.

Now with encript BCryit to enhance application security.


## Requirements

Dont use table names with: users, groups or privileges. If you already have tables with this names, you need to make adaptations.

Require CakePHP 2.x


## Steps:

- Download: https://github.com/ribafs/cakeadmin

- Demo Online: http://ribafs.net.br/admin_demo

- Make download, rename folder to Admin and copy the folder Admin to app/Plugin
  
If using Linux give correct permission to Apache user in folder Admin

- Import for your database the script accesscontrol.sql, which contains the tables users, groups, and privileges

- If your application is not an application of tests, it is recommended a complete backup of your application (all files and all the bank) before continuing

- Add to app/Config/bootstrap.php:

CakePlugin::load('Admin', array('bootstrap' => false, 'routes' => true));

- Copy the files below to your application:

cake.admin.css to app/webroot/css

menutopo.ctp e menutopo_admin.ctp para	app/View/Elements

admin.ctp 	app/View/Layouts


- Edit your layout default app/View/Layouts/default.ctp and add the line below, after line <div id="header">:

		<?php echo $this->element('menutopo');?>

More upper change the generic CSS to admin:

		echo $this->Html->css('cake.admin');

WARNING: Add all yours controllers to app/View/Elements/menutopo.ctp:

		echo $this->Html->link(__('Funcionários'), array('plugin'=>null,'controller'=>'funcionarios','action'=>'index'));

Sample for Funcionarios controller.


## Add Users
<pre>
login - admin	
senha - admin
grupo - admins

login - manager
senha - manager
grupo - managers
</pre>
Access and add:

http://localhost/posts/users


## Add to AppController.php:

WARNING: Adjust the name of posts controller to your application.

	public $components = array(
		'Session','Admin.AccessControl',
		'Auth' => array(
		    'loginRedirect' => array('plugin'=>null,'controller' => 'posts', 'action' => 'index'),
		    'logoutRedirect' => array('plugin'=>'admin','controller' => 'users', 'action' => 'login'),
			'loginAction'    => '/admin/users/login',
			'authError' 	=> 'Faça login antes!',
		    'authorize' => array('Controller')
		)
	);

	public function beforeFilter(){

		parent::beforeFilter();

		$this->set('title_for_app','Meu Aplicativo');
		$this->set('title_for_admin','Administração do Aplicativo');
		$this->set('loggedyes','Logado como');
		$this->set('loggedno','Não logado!');

		$this->set('current_user', $this->Auth->user());
		$user = $this->Auth->user('username');
		if($user == 'admin'){
			$this->layout = 'admin';
		}

		$controller=$this->params['controller'];
		$action=$this->params['action']; 

		$denied='Acesso Negado!';//Access Denied
		$privilege = 'Privilégio não Cadastrado!';//Privilege not Registered

        $this->Auth->allow('login', 'logout');

		if($action != 'login' && $action != 'logout'){
			if($this->AccessControl->go($controller,$action)==true){	
				$this->Session->setFlash(__($denied));							
				$this->redirect(array('plugin'=>'admin','controller' => 'users', 'action' => 'login'));	
			}else{
				if($this->AccessControl->msg == 'priv'){
					$this->Session->setFlash(__($privilege));
				}
			}
		}
		// To register all privileges to your controllers uncommente the line below. 
		// $this->AccessControl->tables($controller);

		// Then make login on application and verify all actions registereds to group "managers".
		// Then uncomment again. Make your adjusts in actions, if your action names are other than default names
	} 

	public function isAuthorized($user) {
		return true;
	}


## READY

Now you can test. go to:

http://localhost/posts

And try to access add or edit actions, for example.


## Registering Permissions

For default only users logged in have access to application.
This version already has registered all permissions for users, groups, and privileges (all only for admins).

The new is that it also registers automatically on the first access, all permissions for all your tables with content, owned by group managers, ie, all members of the group admins and of the group managers have access.
If you want to change the current permissions, visit as admin:
http://localhost/yourapp/privileges

Be careful not to forget any privilege. Those who forget or leave out will allow access to any user.

Log in as admin and register all actions whose access you want to become restricted.
Note that the permissions for the controllers Users, Groups and Privileges are already registered and all give access only to the admin. Change it sees fit.
Just register now permissions of your application tables, tables of contents:

http://localhost/posts/privileges

Be careful not to overlook any privilege. Those who forget or leave out will allow access without login.


## License

This component is distributed under the same CakePHP license, which is the MIT license.


