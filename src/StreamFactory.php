<?php
/**
 * @package   Pls\Stream
 * @author    PHP Library Standards <https://github.com/PHP-library-standards>
 * @copyright 2017 PHP Library Standards
 * @license   https://opensource.org/licenses/MIT The MIT License
 */

namespace Pls\Data\Stream;

/**
 * Interface describing a data stream factory.
 */
interface StreamFactory
{
    /**
     * Creates a new stream from $content.
     *
     * The stream SHOULD be created with a temporary resource.
     *
     * This method MUST NOT throw an exception.
     *
     * @param string $content String to create the new stream from.
     *
     * @return Stream The new stream.
     */
    public function createStream(string $content = ''): Stream;

    /**
     * Creates a stream from an existing $filename, using any $mode supported
     * by `fopen()`.
     *
     * The file MUST be opened using the given $mode.
     *
     * @param string $filename The filename to create the new stream from.
     * @param string $mode     A mode string supported by `fopen()`.
     *
     * @throws StreamException If $filename cannot be found or opened with the
     *     given $mode.
     *
     * @return Stream The new stream.
     */
    public function createStreamFromFile(
        string $filename,
        string $mode = 'r'
    ): Stream;

    /**
     * Creates a new stream from an existing resource.
     *
     * @param resource $resource The resource to create the new stream from.
     *     $resource MUST be readable and may be writable.
     *
     * @throws StreamException If $resource cannot be read.
     *
     * @return Stream The new stream.
     */
    public function createStreamFromResource($resource): Stream;
}
