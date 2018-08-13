<?php
$config = [
    'Templates'=>[
        'adminForm' => [
            'formStart' => '<form class="form-horizontal" {{attrs}}>',
            'label' => '<label class="form-control-label" {{attrs}}>{{text}}</label>',
            'input' => '{{hint}}<input name ="{{name}}" type="{{type}}" class="form-control" {{attrs}} >',		
						
						'optgroup' => '<optgroup label="{{label}}"{{attrs}}>{{content}}</optgroup>', 
           'select' => '<div class="form-group {{required}}" form-type="{{type}}">
           	
          <div class="col-md-12 col-sm-9 col-xs-12">
           	 <label class="control-label" {{attrs}}>{{label}}</label>
           <select class="form-control" name="{{name}}"{{attrs}}>{{content}}</select></div></div>',
					
					
					    'formGroup' => '<div class="col-md-12 col-sm-12 col-xs-12">{{label}}{{input}} </div>',
					    
            'inputContainer' => '<div class="form-group {{required}}" form-type="{{type}}">
                       
                       
                         {{content}}
                       
                      </div>',
                  
					
					 
            'checkContainer' => '',
					'button'=>'<div class="form-group">
                        <div class="col-md-12 col-sm-9 col-xs-12"><button type="{{type}}" {{attrs}}>{{text}}</button></div></div>',
					'textarea' => '{{label}}<textarea name ="{{name}}" type="{{type}}" class="form-control" {{attrs}} >{{value}}</textarea>',		
				],
			
				
        'frontForm' => [
            'formStart' => '<form class="form-horizontal" {{attrs}}>',
            'label' => '<label class="control-label col-md-2 col-sm-3 col-xs-12" {{attrs}}>{{text}}</label>',
            'input' => '<input name ="{{name}}" type="{{type}}" class="form-control"  {{attrs}} >',		
						 'textarea' => '<textarea name ="{{name}}" type="{{type}}" class="form-control" {{attrs}} >{{value}}</textarea>',		
            'select' => '<select name="{{name}}"{{attrs}} class="form-control">{{content}}</select>',
					    'formGroup' => '{{input}}',
            'inputContainer' => '{{content}}',
            'checkContainer' => '',
					'button'=>'<button type="{{type}}" {{attrs}}>{{text}}</button>'					
				]
    ]
];
