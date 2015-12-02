<?php
	//this function contain all the basic functions
	
	
	//FUNCTION FOR REDIRECTING THE PAGE
	function redirect_to( $location = NULL ) 
	{
		if ($location != NULL) 
		{
			header("Location: {$location}");
			exit;
		}
	}
	
	
	//function for the left side of the page to show menus
	function left_side_panel($menuname, $menulink)
	{
		$ret="";
		$ret.="<a href=\"";
		$ret.="{$menulink}";
		
		$ret.="\" style=\"position: relative;\" class=\"list-group-item\">
			<div style=\"margin-top: 0px; margin-right: 0px; text-align: center; width: 0px;\" class=\"h2 pull-left\">";
		
		// $ret.="";
		
		$ret.="</div>
			<h5 style=\"margin: 0px 0 0px; line-height: 0px;\" class=\"list-group-item-heading\">";
		
		$ret.="<b>{$menuname}</b>";
		
		$ret.="</h5></a>";
		return $ret;
	}
	
	
	
	//functions for problem statements to the statement pages
	//FUNCTION FOR problem name
	function fpro_name($string1)
	{
		$ret="";
		$ret.="<div class=\"h1\" style=\"text-align:center\">{$string1}</div>";
		return $ret;
	}
	
	//functions for the limits of the problems
	function flimit($tl, $ml)
	{
		$ret="";
		$ret.="<p class=\"small\" style=\"text-align:center\"><b>TIME LIMIT:</b> {$tl}s<br><b>MEMORY LIMIT:</b> {$ml}MB</p><br>";
		return $ret;
	}
	
	//function for printing problem description
	function fdes($des)
	{
		$ret="";
		$ret.="<div class=\"desc\">{$des}</div>";
		return $ret;
	}
	
	//function input constrains
	function finc($inc)
	{
		$ret="";
		$ret.="<div class=\"spec\"><h3>Input</h3><div class=\"spec-body\">{$inc}</div></div><br>";
		return $ret;
	}
	
	//function output constrains
	function foutc($outc)
	{
		$ret="";
		$ret.="<div class=\"spec\"><h3>Output</h3><div class=\"spec-body\">{$outc}</div></div>";
		return $ret;
	}
	
	//function input output constrain box
	function finoutcon($inc, $outc)
	{
		$r1 = finc($inc);
		$r2 = foutc($outc);
		$ret="";
		$ret.="<div class=\"specs\"><br>{$r1}{$r2}</div><br>";
		return $ret;
	}
	
	//function for sample input and output
	function fsaminout($samin,$samout)
	{
		$ret="";
		$ret.="<div class=\"samples\"><h3>Sample Input and Output</h3><table class=\"table-sample\"><thead><tr><th>Input</th></tr></thead><tbody><tr>
													<td class=\"sample-input\">{$samin}</td></tr></tbody></table><table class=\"table-sample\"><thead><tr><th>Output</th></tr></thead><tbody><tr>
													<td class=\"sample-output\">{$samout}</td></tr></tbody></table></div>";
		return $ret;
	}
	
	//function the whole problem
	function fpro($pro_name,$tl,$ml,$des,$inc,$outc,$samin,$samout )
	{
		$ret="";
		$pro_name = fpro_name($pro_name);
		$limit = flimit($tl, $ml);
		$des  = fdes($des);
		$inoutc = finoutcon($inc, $outc);
		$inouts = fsaminout($samin,$samout);
		$ret.="<div class=\"col-md-9 col-md-pull-0\">
						<div id=\"main\">
							<div class=\"panel panel-default panel-problem\">
								<div style=\"position: relative;\" class=\"panel-body\">{$pro_name}{$limit}{$des}{$inoutc}{$inouts}</div>
							</div></div>";
		return $ret;
	}
	
	
	
	//functions for the problem name area to the web pages
	function pro_link($pro_num, $pro_name)
	{
		$ret="";
		$ret.="<a href=\"";
		$ret.="problemstatements.php?pro_num=".urlencode($pro_num);
		
		$ret.="\" style=\"position: relative;\" class=\"list-group-item\">
			<div style=\"margin-top: 2px; margin-right: 16px; text-align: center; width: 28px;\" class=\"h2 pull-left\">";
		
		$ret.="{$pro_num}";
		
		$ret.="</div>
			<h4 style=\"margin: 5px 0 4px; line-height: 30px;\" class=\"list-group-item-heading\">";
		
		$ret.="{$pro_name}";
		
		$ret.="</h4></a>";
		return $ret;
	}
	
	
	//functions for the problem name area for the clarification page
	function pro_clar($pro_num, $pro_name)
	{
		$ret="";
		$ret.="<a href=\"";
		$ret.="clarifications.php?pro_num=".urlencode($pro_num);
		
		$ret.="\" style=\"position: relative;\" class=\"list-group-item\">
			<div style=\"margin-top: 2px; margin-right: 16px; text-align: center; width: 28px;\" class=\"h2 pull-left\">";
		
		$ret.="{$pro_num}";
		
		$ret.="</div>
			<h4 style=\"margin: 5px 0 4px; line-height: 30px;\" class=\"list-group-item-heading\">";
		
		$ret.="{$pro_name}";
		
		$ret.="</h4></a>";
		return $ret;
	}
	
	
	//functions for the problem name area for the clarification show page
	function pro_clar_show($pro_num, $pro_name)
	{
		$ret="";
		$ret.="<a href=\"";
		$ret.="";
		
		$ret.="\" style=\"position: relative;\" class=\"list-group-item\">
			<div style=\"margin-top: 2px; margin-right: 16px; text-align: center; width: 28px;\" class=\"h2 pull-left\">";
		
		$ret.="{$pro_num}";
		
		$ret.="</div>
			<h4 style=\"margin: 5px 0 4px; line-height: 30px;\" class=\"list-group-item-heading\">";
		
		$ret.="{$pro_name}";
		
		$ret.="</h4></a>";
		return $ret;
	}
	
	
	//functions for the problem name area to the web pages for the updating the problems area
	function pro_link_update($pro_num, $pro_name)
	{
		$ret="";
		$ret.="<a href=\"";
		$ret.="insertupdatepage.php?action=2&pro_num=".urlencode($pro_num);
		
		$ret.="\" style=\"position: relative;\" class=\"list-group-item\">
			<div style=\"margin-top: 2px; margin-right: 16px; text-align: center; width: 28px;\" class=\"h2 pull-left\">";
		
		$ret.="{$pro_num}";
		
		$ret.="</div>
			<h4 style=\"margin: 5px 0 4px; line-height: 30px;\" class=\"list-group-item-heading\">";
		
		$ret.="{$pro_name}";
		
		$ret.="</h4></a>";
		return $ret;
	}
	
	//functions for the problem delete area to the web pages
	function pro_del_link($pro_num, $pro_name)
	{
		$ret="";
		$ret.="<a href=\"";
		$ret.="problemdelete.php?pro_num=".urlencode($pro_num);
		
		$ret.="\" style=\"position: relative;\" class=\"list-group-item\">
			<div style=\"margin-top: 2px; margin-right: 16px; text-align: center; width: 28px;\" class=\"h2 pull-left\">";
		
		$ret.="{$pro_num}";
		
		$ret.="</div>
			<h4 style=\"margin: 5px 0 4px; line-height: 30px;\" class=\"list-group-item-heading\">";
		
		$ret.="{$pro_name}";
		
		$ret.="</h4></a>";
		return $ret;
	}
	
	//functions for the ADMIN ACTION area to the web pages
	function AD_AC($actionid, $actions)
	{
		$ret="";
		$ret.="<a href=\"";
		$ret.="adminactionperform.php?actionid=".urlencode($actionid);
		
		$ret.="\" style=\"position: relative;\" class=\"list-group-item\">
			<div style=\"margin-top: 2px; margin-right: 16px; text-align: center; width: 28px;\" class=\"h2 pull-left\">";
		
		$ret.="{$actionid}.";
		
		$ret.="</div>
			<h4 style=\"margin: 5px 0 4px; line-height: 30px;\" class=\"list-group-item-heading\">";
		
		$ret.="<b>{$actions}</b>";
		
		$ret.="</h4></a>";
		return $ret;
	}
	
	
	//function for registration page input fields
	function reg_fields()
	{
		$ret = "<div class=\"form-group\">
										<label for=\"inputroll\" class=\"control-label\">Student ID/ USERNAME:</label>
										<input id=\"inputroll\" type=\"int\" name=\"roll\" required class=\"form-control\">
									</div>
									<div class=\"form-group\">
										<label for=\"inputName\" class=\"control-label\">Name:</label>
										<input id=\"inputName\" type=\"text\" name=\"name\" required class=\"form-control\">
									</div>
									<div class=\"form-group\">
										<label for=\"inputPassword\" class=\"control-label\">Password:</label>
										<input id=\"inputPassword\" type=\"password\" name=\"password\" required class=\"form-control\">
									</div>
									<div class=\"form-group\">
										<label for=\"confirmPassword\" class=\"control-label\">Confirm Password:</label>
										<input id=\"confirmPassword\" type=\"password\" name=\"confirmpassword\" required class=\"form-control\">
									</div>
									<div class=\"form-group\">
											<label for=\"Usertype\" class=\"control-label\">Type of Using:</label><br>
											<input  type=\"radio\" name = \"usertype\" value=\"user\" checked>USER<br>
											<input 	type=\"radio\" name = \"usertype\" value=\"admin\">ADMIN	
									</div>
									<br>
									<div class=\"form-group\">
										<button type=\"submit\" data-loading-text=\"Registering..\" class=\"btn btn-primary\">REGISTER</button>
						
									</div> ";
		return $ret;
	}
	
	
	//functions for the registration page error showings
	function reg_errors($error)
	{
		$ret="";
							if($error==1)
								$ret.="<h3 style=\"text-align:center; color:red;\">Password and Confirm Password not matched!!</h3>";
							else if($error==2)
								$ret.= "<h3 style=\"text-align:center; color:red;\">Username and Password is same!!</h3>";
							else if($error==3)
								$ret.= "<h3 style=\"text-align:center; color:red;\">Password Length should be at least 6!!</h3>";
							else
								$ret.= "<h3 style=\"text-align:center; color:red;\">Recomplete the form!!</h3>";
		return $ret;
	}
	
	
	//function for the insertion and deletion of the problems
	function insert_update_fields($proid, $memlmt, $timelmt, $proname, $prodes, $proincon, $prooutcon, $proinsam, $prooutsam,$action)
	{
		$btntxt="";
		if($action==1)
			$btntxt.="INSERT";
		else
			$btntxt.="UPDATE";
			
		$ret = "					<div class=\"form-group\">
										<label for=\"inputproid\" class=\"control-label\">Problem ID:</label>
										<input id=\"inputproid\" type=\"text\" name=\"proid\" value = \"{$proid}\" required class=\"form-control\">
									</div>
									
									<div class=\"form-group\">
										<label for=\"inputmemlmt\" class=\"control-label\">Memory Limit:</label>
										<input id=\"inputmemlmt\" type=\"text\" name=\"memlmt\" value = \"{$memlmt}\" required class=\"form-control\">
									</div>
									
									<div class=\"form-group\">
										<label for=\"inputtimelmt\" class=\"control-label\">Time Limit:</label>
										<input id=\"inputtimelmt\" type=\"text\" name=\"timelmt\" value = \"{$timelmt}\" required class=\"form-control\">
									</div>
									
									<div class=\"form-group\">
										<label for=\"inputProName\" class=\"control-label\">Problem Name:</label>
										<input id=\"inputProName\" type=\"text\" name=\"proname\" value = \"{$proname}\" required class=\"form-control\">
									</div>
									
									<div class=\"form-group\">
										<label for=\"inputProDes\" class=\"control-label\">Problem Description:</label>
										<textarea id=\"inputProDes\" type=\"text\" name=\"prodes\" rows=\"10\" cols=\"300\" required class=\"form-control\">{$prodes}</textarea>
									</div>
									
									<div class=\"form-group\">
										<label for=\"inputProInCon\" class=\"control-label\">Problem Input Constraints:</label>
										<textarea id=\"inputProInCon\" type=\"text\" name=\"proincon\" rows=\"5\" cols=\"300\" required class=\"form-control\">{$proincon}</textarea>
									</div>
									
									<div class=\"form-group\">
										<label for=\"inputProOutCon\" class=\"control-label\">Problem Output Constraints:</label>
										<textarea id=\"inputProOutCon\" type=\"text\" name=\"prooutcon\" rows=\"5\" cols=\"300\" required class=\"form-control\">{$prooutcon}</textarea>
									</div>
									
									
									<div class=\"form-group\">
										<label for=\"inputProInSam\" class=\"control-label\">Sample Input:</label>
										<textarea id=\"inputProInSam\" type=\"text\" name=\"proinsam\" rows=\"5\" cols=\"300\" required class=\"form-control\">{$proinsam}</textarea>
									</div>
									
									<div class=\"form-group\">
										<label for=\"inputProOutSam\" class=\"control-label\">Sample Output:</label>
										<textarea id=\"inputProOutSam\" type=\"text\" name=\"prooutsam\" rows=\"5\" cols=\"300\" required class=\"form-control\">{$prooutsam}</textarea>
									</div>
									
									
									<br>
									<div class=\"form-group\">
										<button type=\"submit\" data-loading-text=\"Updating..\" class=\"btn btn-primary\">{$btntxt}</button>
						
									</div> ";
		return $ret;
	}
	
	//function for the insertion clarifications for the problems
	function clar_fields($proid, $clarid, $clar)
	{
		$btntxt="";
		$btntxt.="INSERT";
		$ret = "					<div class=\"form-group\">
										<label for=\"inputproid\" class=\"control-label\">Problem ID:</label>
										<input id=\"inputproid\" type=\"text\" name=\"proid\" value = \"{$proid}\" required class=\"form-control\">
									</div>
									
									<div class=\"form-group\">
										<label for=\"inputclarid\" class=\"control-label\">Clarifications ID:</label>
										<input id=\"inputclarid\" type=\"text\" name=\"clarid\" value = \"{$clarid}\" required class=\"form-control\">
									</div>
									
									<div class=\"form-group\">
										<label for=\"inputClar\" class=\"control-label\">Clarification:</label>
										<textarea id=\"inputClar\" type=\"text\" name=\"clar\" rows=\"5\" cols=\"300\" required class=\"form-control\">{$clar}</textarea>
									</div>
									
									
									
									<br>
									<div class=\"form-group\">
										<button type=\"submit\" data-loading-text=\"Inserting..\" class=\"btn btn-primary\">{$btntxt}</button>
						
									</div> ";
		return $ret;
	}
	
	
?>