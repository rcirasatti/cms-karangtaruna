<?php

namespace App\Helpers;

class TextHelper
{
    /**
     * Convert text with numbered or bulleted lists to HTML formatted lists
     * 
     * @param string $text
     * @return string
     */
    public static function formatList($text)
    {
        if (empty($text)) {
            return $text;
        }

        $lines = explode("\n", $text);
        $result = [];
        $inOrderedList = false;
        $inUnorderedList = false;
        $currentItem = '';

        foreach ($lines as $line) {
            $trimmedLine = trim($line);

            if (preg_match('/^(\d+)[\.\)]\s+(.+)$/', $trimmedLine, $matches)) {
                // Save previous item if exists
                if (!empty($currentItem)) {
                    $result[] = '<li class="pl-2">' . $currentItem . '</li>';
                    $currentItem = '';
                }

                if (!$inOrderedList) {
                    if ($inUnorderedList) {
                        $result[] = '</ul>';
                        $inUnorderedList = false;
                    }
                    $result[] = '<ol class="list-decimal list-outside space-y-2 ml-6 pl-0">';
                    $inOrderedList = true;
                }
                $currentItem = htmlspecialchars($matches[2]);
            }
            // Check for bullet list (-, *, •)
            elseif (preg_match('/^[\-\*•]\s+(.+)$/', $trimmedLine, $matches)) {
                // Save previous item if exists
                if (!empty($currentItem)) {
                    $result[] = '<li class="pl-2">' . $currentItem . '</li>';
                    $currentItem = '';
                }

                if (!$inUnorderedList) {
                    if ($inOrderedList) {
                        $result[] = '</ol>';
                        $inOrderedList = false;
                    }
                    $result[] = '<ul class="list-disc list-outside space-y-2 ml-6 pl-0">';
                    $inUnorderedList = true;
                }
                $currentItem = htmlspecialchars($matches[1]);
            }
            // Continuation line (part of current list item)
            elseif (($inOrderedList || $inUnorderedList) && !empty($trimmedLine)) {
                // Add line break and continue current item
                $currentItem .= '<br>' . htmlspecialchars($line);
            }
            // Regular line (not part of any list)
            else {
                // Save current item if exists
                if (!empty($currentItem)) {
                    $result[] = '<li class="pl-2">' . $currentItem . '</li>';
                    $currentItem = '';
                }

                if ($inOrderedList) {
                    $result[] = '</ol>';
                    $inOrderedList = false;
                }
                if ($inUnorderedList) {
                    $result[] = '</ul>';
                    $inUnorderedList = false;
                }
                if (!empty($trimmedLine)) {
                    $result[] = '<p>' . htmlspecialchars($line) . '</p>';
                } else {
                    $result[] = '<br>';
                }
            }
        }

        // Save last item if exists
        if (!empty($currentItem)) {
            $result[] = '<li class="pl-2">' . $currentItem . '</li>';
        }

        // Close any open lists
        if ($inOrderedList) {
            $result[] = '</ol>';
        }
        if ($inUnorderedList) {
            $result[] = '</ul>';
        }

        return implode("\n", $result);
    }
}
