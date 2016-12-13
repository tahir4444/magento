<?php



$tree = array(
    'H' => 'G',
    'F' => 'G',
    'G' => 'D',
    'E' => 'D',
    'A' => 'E',
    'B' => 'C',
    'C' => 'E',
    'D' => null
);

function parseTree($tree, $root = null) {
    $return = array();
    # Traverse the tree and search for direct children of the root
    foreach($tree as $child => $parent) {
        # A direct child is found
        if($parent == $root) {
            # Remove item from tree (we don't need to traverse this again)
            unset($tree[$child]);
            # Append the child into result array and parse its children
            $return[] = array(
                'name' => $child,
                'children' => parseTree($tree, $child)
            );
        }
    }
    return empty($return) ? null : $return;    
}

function printTree($tree, $str) {
                $nestedtr = '';
    if(!is_null($tree) && count($tree) > 0) {
        
        foreach($tree as $node) {
            $nestedtr .= '<tr><td>'.$str.$node['name'].'</td></tr>';
            $nestedtr .= printTree($node['children'], $str.'-');
        
        }
        
    }
    return  $nestedtr;
}

$result = parseTree($tree);
/*echo '<pre>';
print_r($result);
echo '</pre>';*/
echo '<table>';
echo printTree($result, '');
echo '</table>';

?>
