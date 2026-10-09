<?php

/**
 * The goal of this file is to allow developers a location
 * where they can overwrite core procedural functions and
 * replace them with their own. This file is loaded during
 * the bootstrap process and is called during the framework's
 * execution.
 *
 * This can be looked at as a `master helper` file that is
 * loaded early on, and may also contain additional functions
 * that you'd like to use throughout your entire application
 *
 * @see: https://codeigniter.com/user_guide/extending/common.html
 */

if (! function_exists('ipb_text')) {
    /**
     * Escapes a title or name from the IPB tables for HTML. IPB stored these
     * with their special characters already as entities (&#39;, &#38;), so a
     * plain esc() would show the entities on the page. Decode first, then
     * escape, so the text reads the same and nothing in it can become markup.
     * Escaped with meta_attr(), so only use it in text or inside double quotes.
     */
    function ipb_text($text): string
    {
        return meta_attr(html_entity_decode((string) $text, ENT_QUOTES | ENT_HTML5, 'UTF-8'));
    }
}

if (! function_exists('meta_attr')) {
    /**
     * Escapes plain text for page text or a double-quoted attribute, such as
     * a meta description. Unlike esc() it leaves single quotes alone, so "I'm"
     * stays readable in the page source instead of turning into &#039;.
     * Never use it inside a single-quoted attribute.
     */
    function meta_attr($text): string
    {
        return htmlspecialchars((string) $text, ENT_COMPAT | ENT_SUBSTITUTE | ENT_HTML5, 'UTF-8');
    }
}
