<?php

namespace DanBaker\ToolBox\Traits\String;

trait Singularize
{
    /**
     * Convert a plural word to its singular form using basic English rules.
     *
     * @param string $word
     * @return string
     */
    public static function singularize(string $word): string
    {
        // babies → baby
        if (preg_match('/ies$/i', $word)) {
            return preg_replace('/ies$/i', 'y', $word);
        }

        // boxes → box, churches → church
        if (preg_match('/(ches|shes|xes|ses|zes)$/i', $word)) {
            return preg_replace('/es$/i', '', $word);
        }

        // general fallback: remove trailing s (but avoid stripping it from short words like 'is')
        if (
            preg_match('/s$/i', $word)
            && strlen($word) > 1
            && !preg_match('/us$/i', $word)
        ) {
            return preg_replace('/s$/i', '', $word);
        }

        return $word;
    }
}