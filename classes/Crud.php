<?php

interface Crud
{
    public function create($data);
    public function read();
    public function update($data, $id);
    public function  delete($id);
}