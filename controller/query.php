<?php
class query
{
    public function all($table)
    {
        return $query = 'SELECT * From ' . $table . '';
    }
}
