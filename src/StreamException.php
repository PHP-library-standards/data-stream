<?php
/**
 * @package   Pls\Stream
 * @author    PHP Library Standards <https://github.com/PHP-library-standards>
 * @copyright 2017 PHP Library Standards
 * @license   https://opensource.org/licenses/MIT The MIT License
 */

namespace Pls\Stream;

use Throwable;

/**
 * Base exception interface for all types of stream exceptions.
 *
 * This interface MUST be implemented by all exceptions thrown by a `Stream`
 * implementation.
 */
interface StreamException extends Throwable
{
}
