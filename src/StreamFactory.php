<?php
/**
 * @package   Pls\Stream
 * @author    PHP Library Standards <https://github.com/PHP-library-standards>
 * @copyright 2017 PHP Library Standards
 * @license   https://opensource.org/licenses/MIT The MIT License
 */

namespace Pls\Stream;

/**
 * Interface describing a data stream factory.
 */
interface Stream
{
    /**
     * Creates a new stream from a string.
     *
     * The stream SHOULD be created with a temporary resource.
     *
     * This method MUST NOT throw an exception.
     */
    public function createStream(string $content = ''): Stream;

    /**
     * Creates a stream from an existing $filename, using any $mode supported
     * by `fopen()`.
     *
     * The file MUST be opened using the given $mode.
     *
     * @throws StreamException If $filename cannot be found or opened with the
     *     given $mode.
     */
    public function createStreamFromFile(
        string $filename,
        string $mode = 'r'
    ): Stream;

    /**
     * Creates a new stream from an existing resource.
     *
     * @param resource $resource MUST be readable and may be writable.
     *
     * @throws StreamException If $resource cannot be read.
     */
    public function createStreamFromResource($resource): Stream;
}
