<ul class="actions"> 
	<?php 
	$group = $current_user['group_id'];
	$user=$current_user['username'];
	if(!$user) $user=$loggedno;

	if($user=='Não logado!'){
		echo $this->Html->link(__('Login'), '/login'); 
	}elseif($group == 1){
		echo $this->Html->link(__('Usuários'), '/users'); 
		echo $this->Html->link(__('Grupos'), '/groups'); 
		echo $this->Html->link(__('Privilégios'), '/privileges'); 
		echo '&nbsp;'.$this->Html->link(__('Posts'), array('plugin'=>null,'controller'=>'posts','action'=>'index')); 
		//echo $this->Html->link(__('Funcionários'), array('plugin'=>null,'controller'=>'funcionarios','action'=>'index'));
		echo '&nbsp;'.$this->Html->link(__('Logout'), array('plugin'=>'admin','controller'=>'users','action'=>'logout'));
	}
		echo '&nbsp;&nbsp;&nbsp;'.$loggedyes.': '. $user; 
	?>
</ul> 
