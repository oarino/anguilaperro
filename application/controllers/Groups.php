<?php

class Controllers_Groups
{

	public $content;
	public $request;
	
	public function __construct($request)
	{
		$this->request=$request;
	}
	
	public function indexAction($viewparams)
	{		
		$groups = new Model_Groups();

		if(isset($this->request['params']['idgroups'])) {
			$viewparams['group']=$groups->getGroup($this->request['params']['idgroups']);
		}
		
		$viewparams['groups']=$groups->getGroups();
		$this->content=renderView($this->request,$viewparams);
	}
	
	public function addGroupAction($viewparams)
	{
		$this->content=renderView($this->request,$viewparams);
	}
	
	public function addAction($viewparams)
	{
		$viewparams['textGrupo']='probando el addaction grupos';
		$this->request['action']='index';
		$this->content=renderView($this->request,$viewparams);
	}
	
	
	public function __destruct()
	{
		$layoutparams=array('content'=>$this->content, 'request'=>$this->request);
		echo renderLayout('backend', $layoutparams);
	}	
}