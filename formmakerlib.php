<?php
function form_render($reqs,$app)
{
	if(is_array($reqs) and (count($reqs)>0) )
	{
        $action='';	
        $action=$GLOBALS['SITE_URL'].'demo_application_result.php';	
        
        $target='';	
        //$target=' target="_blank" ';

        //$form_method= 'GET';
        $form_method= 'POST';

		$form='';		
        $form.= '<form  id="msform" name="msform" class="mysticform-card" action="'.@$action.'"  method="'.@$form_method.'" '.@$target.' >
                <fieldset class="form-fieldset">';	

		foreach($reqs as $req)
		{
			if($req['type']=='text')
			{
				$form.= form_field_text($req);						
			}
			if($req['type']=='email')
			{
				$form.= form_field_text($req);						
			}
			elseif($req['type']=='date')
			{
				$form.= form_field_date($req);						
			}
			elseif($req['type']=='select')
			{
				$form.= form_field_dropdown($req);						
			}
			elseif($req['type']=='int')
			{
				$form.= form_field_int($req);						
			}
		}
		$form.= '<input type="hidden" name="mystic_app" value="'.@$app.'" />	';
        $form.= '<div class="group"><input type="submit" class="button" name="mystic_submit" value="Submit" >';
        
        $form.= '</fieldset></form>';
		
		
		$str=@$form;
			
		
		$final='';		
		$final.='<div class="mystic_app">';
		$final.=$str;
		$final.='</div>';
								
		return $final;
		
	}
	else
	{
		die("Invalid Form Requirements");
	}
}


function form_field_int($arr)
{
	if(strlen(@$arr['key'])>0)
	{
		$key=" name='".$arr['key']."' ";
    }
    else
    {
        return null;
    }
        
    $requiredmark= ( (@$arr['required']==true)?" <font color='red'>*</font>":''  ) ;
    $required= ( (@$arr['required'])?' required ':''  ) ;
    $label= ( (strlen(@$arr['label'])>0)?@$arr['label']:''  ) ;
    $description= ( (strlen(@$arr['description'])>0)?@$arr['description']:$label  ) ;
   
    $type=  (strlen(@$arr['type'])>0) ? @$arr['type'] : 'text'  ;
    $note= ( (strlen(@$arr['note'])>0)?@$arr['note']:''  ) ;
   
    
    $str='<div class="group" >
		<label class="label">'.@$label.' '.@$requiredmark.' </label>
		<input  type="number"  class="input " placeholder="'.ucfirst(@$description).'" '.@$key.' '.$required.'  data-toggle="tooltip"		data-trigger="hover" data-placement="top" data-title="'.@$description.'">';
		
	if(strlen(@$note)>1)
	{
	$str.='<p class="text-left"><small class="text-muted">'.@$note.'</small></p>';
	}
	$str.='	</div>';

    return $str;
    
}

function form_field_text($arr=array())
{
    if(strlen(@$arr['key'])>0)
	{
		$key=" name='".$arr['key']."' ";
    }
    else
    {
        return null;
    }
    
    $requiredmark= ( (@$arr['required']==true)?" <font color='red'>*</font>":''  ) ;
    $required= ( (@$arr['required'])?' required ':''  ) ;
    $label= ( (strlen(@$arr['label'])>0)?@$arr['label']:''  ) ;
    $description= ( (strlen(@$arr['description'])>0)?@$arr['description']:$label  ) ;
   
    $type=  (strlen(@$arr['type'])>0) ? @$arr['type'] : 'text'  ;
    $note= ( (strlen(@$arr['note'])>0)?@$arr['note']:''  ) ;
	
	if(strlen(@$arr['type'])>0)
    {
		$type=@$arr['type'];
		if($type=='number')
		{
			$type='int';
		}
	}
    else
    {
        $type='text';
	}
	
	$str='<div class="group" >
		<label class="label">'.@$label.' '.@$requiredmark.' </label>
		<input  type="'.@$type.'"  class="input" placeholder="'.ucfirst(@$description).'" '.@$key.' '.$required.' data-toggle="tooltip"		data-trigger="hover" data-placement="top" data-title="'.@$description.'">';
		
	if(strlen(@$note)>1)
	{
	$str.='<p class="text-left"><small class="text-muted">'.@$note.'</small></p>';
	}
	$str.='	</div>';

	return $str;

}

function form_field_date($arr=array())
{    	
    if(strlen(@$arr['key'])>0)
	{
		$key=" name='".$arr['key']."' ";
    }
    else
    {
        echo "Invalid Key provided";
        return 0;
	}
    
    $requiredmark= ( (@$arr['required']==true)?" <font color='red'>*</font>":''  ) ;
    $required= ( (@$arr['required'])?' required ':''  ) ;
    $label= ( (strlen(@$arr['label'])>0)?@$arr['label']:''  ) ; 
    $description= ( (strlen(@$arr['description'])>0)?@$arr['description']:$label  ) ;
    $note= ( (strlen(@$arr['note'])>0)?@$arr['note']:''  ) ;
	
	$str='<div class="group" >
		<label class="label">'.@$label.' '.@$requiredmark.' </label>

		<input type="date" class="input"  placeholder="'.ucfirst(@$placeholder).'" '.@$key.'  '.$required.' data-toggle="tooltip"     data-trigger="hover" data-placement="top" data-title="'.@$description.'"/>';
		
	if(strlen(@$note)>1)
	{
	$str.='<p class="text-left"><small class="text-muted">'.@$note.'</small></p>';
	}
	$str.='	</div>';

	return $str;

}

function form_field_dropdown($arr=array())
{   
    if(strlen(@$arr['key'])>0)
	{
		$key=" name='".$arr['key']."' ";
    }
    else
    {
        return null;
    }
    
	$requiredmark= ( (@$arr['required']==true)?" <font color='red'>*</font>":''  ) ;
    $required= ( (@$arr['required'])?' required ':''  ) ;
    $label= ( (strlen(@$arr['label'])>0)?@$arr['label']:''  ) ;
    $description= ( (strlen(@$arr['description'])>0)?@$arr['description']:$label  ) ;
    $type=  (strlen(@$arr['type'])>0) ? @$arr['type'] : 'text'  ;
    $note= ( (strlen(@$arr['note'])>0)?@$arr['note']:''  ) ;
	
	$str='
		<div class="group" >
			<label class="label" >'.$label.' '.$requiredmark.' </label>
			<select  class="input" '.@$key.'   data-toggle="tooltip" data-trigger="hover" data-placement="top"
			data-title="'.$description.'">
				<option value="" selected="" disabled=""   >Choose '.@$description.'</option>
				';
					if(is_array(@$arr['options']) and (count(@$arr['options'])>0))
					{
						foreach(@$arr['options'] as $key=>$val)
						{
							if(@$default==$key)
                            {
                                $selected=' selected="selected" ';
                            }
                            else
                            {
                                $selected ='';
                            }
                            $str.='<option value="'.$key.'"  '.$selected.'>'.$val.'</option>';       
						}
					}                    
	$str.='</select>';
	if(strlen(@$note)>1)
    {
        $str.='<p class="text-left"><small class="text-muted">'.$note.'</small></p>';
    }
	$str.='</div>';

	return $str;
}
?>