<?php

namespace DanBaker\ToolBox\Traits\String;

trait Pluralize
{
    /** 
    * Pluralize a word based on the count.
    *
    * @param string $word
    * @param int $count
    * @return string
    */
   public static function pluralize(string $word, int $count): string
   {
       if ($count === 1) {
           return $word;
       }
   
       // Basic English pluralization rules
       if (preg_match('/(s|x|z|ch|sh)$/i', $word)) {
           return $word . 'es';
       }
   
       if (preg_match('/y$/i', $word) && !preg_match('/[aeiou]y$/i', $word)) {
           return preg_replace('/y$/i', 'ies', $word);
       }
   
       return $word . 's';
   }
}