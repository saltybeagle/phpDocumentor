<?php
/**
 * PhpDocumentor is a JavaDoc-like documentation tool for PHP.
 *
 * PHP versions 5.3
 *
 * @category  ToolsAndUtilities
 * @package   phpDocumentor2
 * @author    James Logsdon <jlogsdon@php.net>
 * @copyright 2010 phpDocumentor2 Team
 * @license   http://www.opensource.org/licenses/bsd-license.php BSD
 * @link      http://www.github.com/mfacenet/phpDocumentor
 */

namespace PEAR2\phpDocumentor2\Parser;

/**
 * PHP lexer
 *
 * @category  ToolsAndUtilities
 * @package   phpDocumentor2
 * @author    James Logsdon <jlogsdon@php.net>
 * @copyright 2010 phpDocumentor2 Team
 * @license   http://www.opensource.org/licenses/bsd-license.php BSD
 * @link      http://www.github.com/mfacenet/phpDocumentor
 */
class Tokenizer
{
    protected $buffer = null;

    protected $collecting = false;

    protected $depth = 0;

    protected $path = null;

    protected $source = null;

    protected $tokens = array();

    public function __construct($source = null)
    {
        if (is_file($source)) {
            $this->setFile($source);
        } else if (!empty($source)) {
            $this->setSource($source);
        }
    }

    public function setFile($path)
    {
        $this->path = $path;
        $this->setSource(file_get_contents($path));
    }

    public function setSource($source)
    {
        $this->source = $source;
    }

    public function nextToken()
    {
        $next = array_shift($this->tokens);

        if ($next[0] === '{') {
            $this->depth++;
        } else if ($next[0] === '}') {
            $this->depth = max(0, $this->depth - 1);
        }

        return $next;
    }

    /**
     * Tokenizes the source file
     *
     * @return void
     */
    public function tokenize()
    {
        $this->tokens = token_get_all($this->source);
        $this->depth = 0;

        $classes = array();
        $functions = array();
        $namespace = null;

        while (($token = $this->nextToken()) != false) {
            if ($token[0] === T_NAMESPACE) {
                $this->parseUntil(T_WHITESPACE);

                $namespace = trim($this->parseUntil(';')) . '\\';
                continue;
            }

            if (in_array($token[0], array(T_CLASS, T_INTERFACE))) {
                $this->parseUntil(T_WHITESPACE);

                $class = $this->parseUntil(array(T_WHITESPACE, '{'));
                $classes[] = $namespace . trim($class);
                continue;
            }

            // Functions only need to be passed on if they are not in a class
            if ($token[0] === T_FUNCTION && $this->depth === 0) {
                $this->parseUntil(T_WHITESPACE);

                $function = $this->parseUntil(array(T_WHITESPACE, '('));
                $functions[] = $namespace . trim($function);
                continue;
            }
        }

        if (isset($classes[0])) {
            #echo $classes[0] . "\n";
        } else {
            echo $this->path . "\n";
        }
    }

    /**
     * Traverses the token list until $stop is found.
     *
     * @param mixed $stop a token or array of tokens to stop on
     *
     * @return string the token contents found
     */
    public function parseUntil($stop)
    {
        $buffer = null;

        while (($token = $this->nextToken()) != false) {
            if (!is_array($stop) && $token[0] === $stop) {
                break;
            } else if (is_array($stop) && in_array($token[0], $stop, true)) {
                break;
            }

            $buffer .= is_array($token) ? $token[1] : $token;
        }

        return $buffer;
    }
}

?>
