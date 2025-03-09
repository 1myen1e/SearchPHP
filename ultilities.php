<?php
function getSortIcon($column, $sort_by, $order) {
    return $column === $sort_by ? ($order === 'asc' ? '🔼' : '🔽') : '⬍';
}
?>