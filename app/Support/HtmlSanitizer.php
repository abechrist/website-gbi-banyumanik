<?php

namespace App\Support;

use DOMDocument;
use DOMElement;

class HtmlSanitizer
{
    private const ALLOWED_TAGS = [
        'p', 'div', 'br', 'hr', 'strong', 'b', 'em', 'i', 'u', 's', 'strike',
        'a', 'ul', 'ol', 'li', 'h2', 'h3', 'h4', 'blockquote', 'span',
        'img', 'figure', 'figcaption', 'pre', 'code',
        'table', 'thead', 'tbody', 'tr', 'th', 'td',
    ];

    private const ALLOWED_ATTRS = ['href', 'title', 'alt', 'width', 'height', 'src', 'target', 'rel', 'class', 'style'];

    public static function sanitize(?string $html): string
    {
        if (! $html) {
            return '';
        }

        libxml_use_internal_errors(true);

        $dom = new DOMDocument();
        $dom->encoding = 'UTF-8';
        $wrapped = htmlspecialchars_decode(static::wrapForUtf8($html), ENT_QUOTES);
        @$dom->loadHTML($wrapped, LIBXML_NOERROR | LIBXML_NOWARNING);

        $dirty = $dom->getElementsByTagName('body')->item(0);

        if (! $dirty) {
            return '';
        }

        $toRemove = [];

        foreach ($dirty->getElementsByTagName('*') as $node) {
            if (! $node instanceof DOMElement) {
                continue;
            }

            $tag = strtolower($node->tagName);

            if (! in_array($tag, self::ALLOWED_TAGS, true)) {
                $toRemove[] = $node;
                continue;
            }

            $kept = $node->hasAttribute('class') || $node->hasAttribute('style')
                ? static::scrubElement($node)
                : static::scrubAttributes($node);

            if ($tag === 'a') {
                $kept->setAttribute('rel', 'noopener noreferrer');
                if (! $kept->hasAttribute('target')) {
                    $kept->setAttribute('target', '_self');
                }
            }
        }

        foreach ($toRemove as $node) {
            if ($node->parentNode) {
                $node->parentNode->removeChild($node);
            }
        }

        $html = '';
        foreach ($dirty->childNodes as $child) {
            $html .= $dom->saveHTML($child);
        }

        libxml_clear_errors();

        return trim((string) $html);
    }

    private static function scrubElement(DOMElement $node): DOMElement
    {
        $keep = [];

        foreach ($node->attributes as $attr) {
            $name = strtolower((string) $attr->nodeName);
            $value = trim((string) $attr->nodeValue);

            if (! in_array($name, self::ALLOWED_ATTRS, true)) {
                continue;
            }

            if ($name === 'href' || $name === 'src') {
                $value = static::sanitizeUrl($value);
                if ($value === null) {
                    continue;
                }
            }

            if ($name === 'style') {
                $value = static::sanitizeStyle($value);
                if ($value === '') {
                    continue;
                }
            }

            $keep[$name] = $value;
        }

        while ($node->attributes->length > 0) {
            $node->removeAttributeNode($node->attributes->item(0));
        }

        foreach ($keep as $name => $value) {
            $node->setAttribute($name, $value);
        }

        return $node;
    }

    private static function scrubAttributes(DOMElement $node): DOMElement
    {
        return static::scrubElement($node);
    }

    private static function sanitizeUrl(string $url): ?string
    {
        $url = trim((string) $url);

        if ($url === '') {
            return null;
        }

        if (preg_match('#^(https?:)?//#i', $url) || str_starts_with($url, '/') || str_starts_with($url, '#')) {
            return $url;
        }

        if (preg_match('#^(mailto:|tel:)#i', $url)) {
            return $url;
        }

        return null;
    }

    private static function sanitizeStyle(string $style): string
    {
        $style = trim((string) $style);

        if (preg_match('/url\s*\(|expression\s*\(|javascript\s*:|behavior\s*:|-moz-binding/i', $style)) {
            return '';
        }

        return $style;
    }

    private static function wrapForUtf8(string $html): string
    {
        return '<?xml encoding="UTF-8"><html><body>'.$html.'</body></html>';
    }
}