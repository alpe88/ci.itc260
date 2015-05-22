<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Navigation {

  var $menu = array();  //The array holding all navigation elements
	var $out; // The HTML string to be returned
	
	
	/*
	 * Render the top nav
	 */
	function __construct(){
		
	}

	function init($selected){
		$CI =& get_instance();
		
		$default_menu = array
		(
			1 => 	array(
				'text'		=> 	'Home',	
				'link'		=> 	base_url(),
				'show_condition'=>	1,
				'parent'	=>	0
			),
			2 => 	array(
				'text'		=> 	'About',	
				'link'		=> 	base_url() . 'about',
				'show_condition'=>	1,
				'parent'	=>	0
			),
			3 => 	array(
				'text'		=> 	'About Child Example 1',	
  			'link'		=> 	base_url() . 'test1',
				'show_condition'=>	1,
				'parent'	=>	2
			),
			4 => 	array(
  				'text'		=> 	'About Child Example 2',
				'link'		=> 	base_url() . 'test2',
				'show_condition'=>	1,
				'parent'	=>	2
			),								
			5 => 	array(
				'text'		=> 	'Blog',	
				'link'		=> 	base_url() . 'blog',
				'show_condition'=>	1,
				'parent'	=>	0
			),
			6 => 	array(
				'text'		=> 	'Projects',	
				'link'		=> 	base_url() . '',
				'show_condition'=>	1,
				'parent'	=>	0
			),
			7 => 	array(
				'text'		=> 	'News',	
				'link'		=> 	base_url() . 'news',
				'show_condition'=>	1,
				'parent'	=>	6
			),
			8 => 	array(
				'text'		=> 	'RSS',	
				'link'		=> 	base_url() . 'rss',
				'show_condition'=>	1,
				'parent'	=>	6
			),
			9 => 	array(
				'text'		=> 	'Customers',	
				'link'		=> 	base_url() . 'customer',
				'show_condition'=>	1,
				'parent'	=>	6
			),
			10 => 	array(
				'text'		=> 	'Contact',	
				'link'		=> 	base_url() . 'contact',
				'show_condition'=>	1,
				'parent'	=>	0
			)								
		); 
		$this->menu = $default_menu;
	}
		
	/*
	 * load - Return HTML navigation string
	 */
	public function load($selected)
	{
		$this->init($selected);
		$out = '<ul class="nav navbar-nav">';
		foreach ( $this->menu as $i=>$arr )
		{
			if ( is_array ( $this->menu [ $i ] ) ) {//must be by construction but let's keep the errors home
				if ( $this->menu [ $i ] [ 'show_condition' ] && $this->menu [ $i ] [ 'parent' ] == 0 ) //are we allowed to see this menu?
				{
					/*** Set class for current nav item ***/
					(strcasecmp($this->menu [ $i ] [ 'text' ], $selected) == 0 ) ? $class = "active" : $class = ""; //  Binary safe case-insensitive string comparison
					
					if($this->hasChildren($i))
					{
						$class .=" dropdown";
						$out .= "<li class=\"" . $class . "\">";
						$out .= "<a href=\"" . $this->menu [ $i ] [ 'link' ] . "\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">";
						$out .= $this->menu [ $i ] [ 'text' ];
						$out .= '<b class="caret"></b>';
						$out .= '</a>';
						$out .= $this->getChildren ( $i ); //loop through children
						$out .= '</li>' . "\n";
					}else{
						$out .= "<li class=\"" . $class . "\">";
						if($this->menu [ $i ] [ 'link' ]!=null)	{
							$out .= "<a href=\"" . $this->menu [ $i ] [ 'link' ] . "\">";
							$out .= $this->menu [ $i ] [ 'text' ];
							$out .= '</a>';
						} else {
							$out .= "<span>".$this->menu [ $i ] [ 'text' ]."</span>";
						}
						$out .= '</li>' . "\n";
					}
				}
			}
			else 
			{
				die ( sprintf ( 'menu nr %s must be an array', $i ) );
			}
		}

		$out .= '</ul>';
		return $out;
	}
	
	private function hasChildren($menu_id)
	{
		foreach ( $this->menu as $i=>$arr ){
		
			if ( $this->menu [ $i ] [ 'show_condition' ] && $this->menu [ $i ] [ 'parent' ] == $menu_id ) {
				return TRUE;
			}
		}
		
		return FALSE;
	}
	/**
	 *
	 * getChildren - build an html string of the menu children
	 *
	 * @access private
	 *
	 * @return HTML or boolean
	 *
	 */
	private function getChildren ( $el_id )
	{
		$has_subcats = FALSE;
		$out = '';
		$out .= "\n".'	<ul class="dropdown-menu">' . "\n";
		foreach ( $this->menu as $i=>$arr ){
		
			if ( $this->menu [ $i ] [ 'show_condition' ] && $this->menu [ $i ] [ 'parent' ] == $el_id ) {//are we allowed to see this menu?
				$has_subcats = TRUE;
				
				$out .= "<li><a href=\"{$this->menu[ $i ][ 'link' ]}\">{$this->menu [ $i ] [ 'text' ]}</a>" . $this->getChildren ( $this->menu, $i ) . "</li>";
			}
		}
		$out .= '	</ul>'."\n";
		
		
		return ( $has_subcats ) ? $out : FALSE;
	}
}	