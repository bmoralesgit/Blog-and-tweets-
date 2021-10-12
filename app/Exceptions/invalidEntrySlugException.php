<?php

namespace App\Exceptions;

use Exception;
use App\Models\Entry;
use Throwable;
class invalidEntrySlugException extends Exception
{
    private $entry;
    public function __construct(Entry $entry, $message ="", $code=0, Throwable $previous=null)
    {
        $this->entry = $entry;
        parent::__construct($message,$code,$previous);
    }
    public function render(){
        return redirect($this->entry->getUrl());
    }

}
