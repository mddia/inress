<?php
	//Plugin orderby
	function array_sort_by_fields(&$data, $orderby){
		  static $sort_funcs = array();
		 
		if (empty($sort_funcs[$orderby])) {
			$code = "\$c=0;";
			foreach (explode(',', $orderby) as $key) {
				$d = '1';
				if (substr($key, 0, 1) == '-') {
					$d = '-1';
					$key = substr($key, 1);
				}
				if (substr($key, 0, 1) == '#') {
					$key = substr($key, 1);
					$code .= "if ( ( \$c = (\$a['$key'] - \$b['$key'])) != 0 ) return $d * \$c;\n";
				}
				else {
					$code .= "if ( (\$c = strcasecmp(\$a['$key'],\$b['$key'])) != 0 ) return $d * \$c;\n";
				}
			}
			$code .= 'return $c;';
			$sort_func = $sort_funcs[$orderby] = create_function('$a, $b', $code);
		}
		else {
			$sort_func = $sort_funcs[$orderby];
		}   
		uasort($data, $sort_func);
	}

	//Fonction order by
	function smarty_modifier_orderby($arrData,$sortfields) {
		array_sort_by_fields($arrData,$sortfields);
		return $arrData;
	} 
?>