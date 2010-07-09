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

namespace PEAR2\phpDocumentor2\Console;

/**
 * Command line argument parser
 *
 * @category  ToolsAndUtilities
 * @package   phpDocumentor2
 * @author    James Logsdon <jlogsdon@php.net>
 * @copyright 2010 phpDocumentor2 Team
 * @license   http://www.opensource.org/licenses/bsd-license.php BSD
 * @link      http://www.github.com/mfacenet/phpDocumentor
 */
class ArgumentParser
{
    /**
     * An array of arguments to be parsed.
     *
     * @var array
     */
    protected $arguments = array();

    /**
     * Collection of flags where each key is the flag name and its value will
     * be `true` if found in the argument list.
     *
     * @var array
     */
    protected $flags = array();

    /**
     * Collection of options where each element is an array of option parameters.
     *
     * @var array
     */
    protected $options = array();

    /**
     * Collection of stacks where each key is the stack name and its value
     * will be the number of times stacked.
     *
     * @var array
     */
    protected $stacks = array();

    protected $isParsed = false;

    /**
     * Constructor
     *
     * @param array $flags an array of flags
     */
    public function __construct(array $flags = array())
    {
        if (!empty($flags['flags'])) {
            $this->addFlags($flags['flags']);
        }
        if (!empty($flags['options'])) {
            $this->addOptions($flags['options']);
        }
        if (!empty($flags['stacks'])) {
            $this->addStacks($flags['stacks']);
        }
    }

    /**
     * Returns the arguments in use by the parser.
     *
     * @return array the argument array
     */
    public function getArguments()
    {
        return $this->arguments;
    }

    /**
     * Adds a flag to the parser. Flags are one character long and are prefixed
     * with a dash (-).
     *
     * @param string $flag the character that represents the flag
     *
     * @return void
     */
    public function addFlag(array $flag)
    {
        $defaults = array('toggled' => false, 'short' => null, 'long' => null);
        $flag += $defaults;

        if (empty($flag['long']) && empty($flag['short'])) {
            throw new \InvalidArgumentException('Must provide a long or short flag for an flag');
        }

        $this->flags[] = $flag;
    }

    /**
     * Add an array of flags.
     *
     * @param array $flags an array of flags
     *
     * @see addFlag()
     * @return void
     */
    public function addFlags(array $flags)
    {
        foreach ($flags as $flag) {
            $this->addFlag($flag);
        }
    }

    /**
     * Check if a flag has been set in the argument list.
     *
     * @param string $arg the name of the flag
     *
     * @return bool `true` if toggled, `false` otherwise
     */
    public function getFlag($arg)
    {
        foreach ($this->flags as $flag) {
            if (strcmp($flag['short'], $arg) === 0 || strcmp($flag['long'], $arg) === 0) {
                return $flag['toggled'];
            }
        }
    }

    /**
     * Returns the available flags and their value (`true` or `false`).
     *
     * @return array an array of flags and their values
     */
    public function getFlags()
    {
        $flags = array();

        foreach ($this->flags as $flag) {
            $flags[$flag['short']] = $flag['toggled'];
        }

        return $flags;
    }

    /**
     * Check if a flag has been set in the argument list.
     *
     * @param string $flag the name of the flag
     *
     * @return bool `true` if toggled, `false` otherwise
     */
    public function hasFlag($flag)
    {
        return $this->getFlag($flag);
    }

    /**
     * Adds an option (long or short or both) to the parser.
     *
     * @param array $option an array of option parameters
     *
     * @return void
     */
    public function addOption(array $option)
    {
        $defaults = array('value' => null, 'short' => null, 'long' => null);
        $option += $defaults;

        if (empty($option['long']) && empty($option['short'])) {
            throw new \InvalidArgumentException('Must provide a long or short flag for an option');
        }

        $this->options[] = $option;
    }

    /**
     * Add an array of options.
     *
     * @param array $options an array of options
     *
     * @see addOption()
     * @return void
     */
    public function addOptions(array $options)
    {
        foreach ($options as $option) {
            $this->addOption($option);
        }
    }

    /**
     * Get an option by name.
     *
     * @param string $option the long or short name of the option
     *
     * @return string the option value
     */
    public function getOption($option)
    {
        foreach ($this->options as $opt) {
            if (strcmp($opt['long'], $option) === 0 || strcmp($opt['short'], $option) === 0) {
                return $opt['value'];
            }
        }
    }

    /**
     * Return all options.
     *
     * @return array an array of options and their values
     */
    public function getOptions()
    {
        $options = array();

        foreach ($this->options as $option) {
            $options[$option['short']] = $option['value'];
        }

        return $options;
    }

    /**
     * Checks if an option exists in the argument list.
     *
     * @param string $option the long or short name of the option
     *
     * @return bool `true` if found, `false` otherwise
     */
    public function hasOption($option)
    {
        return $this->getOption($option) !== null;
    }

    /**
     * Adds a stackable flag.
     *
     * @param string $flag the flag name
     *
     * @return void
     */
    public function addStack($flag)
    {
        $defaults = array('count' => 0, 'max' => false, 'short' => null);
        $flag += $defaults;

        if (!isset($flag['short'])) {
            throw new \InvalidArgumentException('Stacks only work with a short flag');
        }

        $this->stacks[] = $flag;
    }

    /**
     * Add an array of stackable flags.
     *
     * @param array $flags an array of flags to add
     *
     * @see addStack()
     * @return void
     */
    public function addStacks(array $flags)
    {
        foreach ($flags as $flag) {
            $this->addStack($flag);
        }
    }

    /**
     * Gets the value (depth) of a stack flag.
     *
     * @param string $flag the name of the stackable flag
     *
     * @return int the number of times the flag was stacked
     */
    public function getStack($flag)
    {
        foreach ($this->stacks as $stack) {
            if (strcmp($stack['short'], $flag) === 0) {
                return $stack['count'];
            }
        }
    }

    /**
     * Returns all stackable flags.
     *
     * @return array an array of stackable flags and their depths
     */
    public function getStacks()
    {
        $stacks = array();

        foreach ($this->stacks as $stack) {
            $stacks[$stack['short']] = $stack['count'];
        }

        return $stacks;
    }

    /**
     * Checks if the given stack flag is present in the arguments list.
     *
     * @param string $stack the name of the stackable flag
     *
     * @return bool `true` if found, `false` otherwise
     */
    public function hasStack($stack)
    {
        return $this->getStack($stack) > 0;
    }

    /**
     * Parses the input arguments.
     *
     * @param array $arguments an array of arguments
     *
     * @return void
     */
    public function parse(array $arguments = array())
    {
        if (empty($arguments)) {
            $arguments = $this->getArguments();
        }

        // References used for parsing
        $refShort = array();
        $refLong = array();
        $this->buildReferences('flag', $refShort, $refLong);
        $this->buildReferences('option', $refShort, $refLong);
        $this->buildReferences('stack', $refShort, $refLong);

        // Add an empty final argument so the loop can check for errors
        array_push($arguments, '');
        $this->reset();

        while (($arg = array_shift($arguments)) !== null) {
            if (isset($ref)) {
                unset($ref);
            }

            if (strpos($arg, '--') === 0) {
                $name = substr($arg, 2);

                if (!isset($refLong[$name])) {
                    throw new \InvalidArgumentException($name);
                }

                $ref =& $refLong[$name];
            } else if (strpos($arg, '-') === 0) {
                $name = substr($arg, 1);

                if (strlen($name) > 1) {
                    // Split out multiple short options/flags and prepend to $argv
                    $names = array_filter(preg_split('//', substr($name, 1)));

                    // We have to prepend a dash for the parser to pick them up
                    array_walk($names, function(&$value) {
                        $value = '-' . $value;
                    });

                    $arguments = array_merge($names, $arguments);
                    // Now work on the first character of the current arg
                    $name = $name[0];
                }

                if (!isset($refShort[$name])) {
                    throw new \InvalidArgumentException($name);
                }

                $ref =& $refShort[$name];
            }

            if (isset($ref)) {
                if (isset($value) && empty($value['value'])) {
                    throw new \InvalidArgumentException($value['long'] . ' expects a value');
                }

                switch ($ref['type']) {
                case 'stack':
                    if (!empty($ref['max'])) {
                        $ref['count'] = min($ref['max'], $ref['count'] + 1);
                    } else {
                        $ref['count']++;
                    }
                    break;
                case 'flag':
                    $ref['toggled'] = true;
                    break;
                case 'option':
                    $value =& $ref;
                    break;
                }

                unset($ref);
                continue;
            }

            if (isset($value)) {
                $value['value'] = trim($value['value'] . ' ' . $arg);

                if (empty($arguments) && empty($value['value'])) {
                    throw new \InvalidArgumentException($value['long'] . ' expects a value');
                }
            }
        }

        $this->isParsed = true;
    }

    /**
     * Builds out the short and long reference arrays.
     *
     * @param string $type   the type of flag (flag, option or stack)
     * @param array  &$short a reference to the short flag container
     * @param array  &$long  a reference to the long flag container
     *
     * @return void
     */
    protected function buildReferences($type, &$short, &$long)
    {
        $var = $type . 's';

        foreach ($this->{$var} as $i => $arg) {
            $arg['type'] = $type;
            $this->{$var}[$i] = $arg;

            if (isset($arg['short'])) {
                $short[$arg['short']] =& $this->{$var}[$i];
            }
            if (isset($arg['long'])) {
                $long[$arg['long']] =& $this->{$var}[$i];
            }
        }
    }

    /**
     * Reset all flag, option and stack values.
     *
     * @return void
     */
    public function reset()
    {
        $this->isParsed = false;

        foreach ($this->flags as $i => $flag) {
            $this->flags[$i]['toggled'] = false;
        }

        foreach ($this->options as $i => $option) {
            $this->options[$i]['value'] = null;
        }

        foreach ($this->stacks as $i => $stack) {
            $this->stacks[$i]['count'] = 0;
        }
    }
}

?>
