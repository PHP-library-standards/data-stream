<?php
/**
 * @package   Pls\Stream
 * @author    PHP Library Standards <https://github.com/PHP-library-standards>
 * @copyright 2017 PHP Library Standards
 * @license   https://opensource.org/licenses/MIT The MIT License
 */

namespace Pls\Stream;

/**
 * Interface describing a data stream.
 *
 * Typically, an instance will wrap a PHP stream; this interface provides
 * a wrapper around the most common operations, including serialization of
 * the entire stream to a string.
 */
interface Stream
{
    /**
     * Reads all data from the stream into a string, from the beginning to end.
     *
     * This method MUST attempt to seek to the beginning of the stream before
     * reading data and read the stream until the end is reached.
     *
     * Warning: This could attempt to load a large amount of data into memory.
     *
     * This method MUST NOT throw an exception.
     *
     * @return string The string value of the stream.
     */
    public function __toString(): string;

    /**
     * Closes the stream and any underlying resources.
     *
     * This method MUST NOT throw an exception.
     *
     * @return void
     */
    public function close(): void;

    /**
     * Separates any underlying resources from the stream.
     *
     * After the stream has been detached, the stream is in an unusable state.
     *
     * This method MUST NOT throw an exception.
     *
     * @return ?resource Underlying PHP stream, if any.
     */
    public function detach();

    /**
     * Returns whether the stream pointer is at the end of the stream.
     *
     * This method MUST NOT throw an exception.
     *
     * @return bool `true` if the stream pointer is at the end of the stream,
     *     `false` otherwise.
     */
    public function eof(): bool;

    /**
     * Reads the remaining data from the stream into a string, from the
     * current pointer position to end of the stream.
     *
     * @throws StreamException If unable to read or an error occurs while
     *     reading.
     *
     * @return string The string value of the remaining data in the stream.
     */
    public function getContents(): string;

    /**
     * Get stream metadata as an associative array or retrieve a specific key.
     *
     * The keys returned are identical to the keys returned from PHP's
     * `stream_get_meta_data()` function.
     *
     * This method MUST NOT throw an exception.
     *
     * @param ?string $key Optional. A key from `stream_get_meta_data()`.
     *
     * @return array|mixed|null Returns an associative array if no key is
     *     provided. Returns a specific key value if a key is provided and the
     *     value is found, or null if the key is not found.
     */
    public function getMetadata(string $key = null);

    /**
     * Gets the size of the stream in bytes, if known.
     *
     * This method MUST NOT throw an exception.
     *
     * @return ?int The size of the stream in bytes if known, `null` otherwise.
     */
    public function getSize(): ?int;

    /**
     * Returns whether the stream is readable.
     *
     * This method MUST NOT throw an exception.
     *
     * @return bool `true` if the stream is readable, `false` otherwise.
     */
    public function isReadable(): bool;

    /**
     * Returns whether the stream is seekable.
     *
     * This method MUST NOT throw an exception.
     *
     * @return bool `true` if the stream is seekable, `false` otherwise.
     */
    public function isSeekable(): bool;

    /**
     * Returns whether the stream is writable.
     *
     * This method MUST NOT throw an exception.
     *
     * @return bool `true` if the stream is writable, `false` otherwise.
     */
    public function isWritable(): bool;

    /**
     * Reads up to $length bytes from the stream.
     *
     * Fewer than $length bytes may be returned if the underlying stream call
     * returns fewer bytes.
     *
     * This method MUST return an empty string if no bytes are available.
     *
     * @param int $length The length in bytes to read from the stream.
     *
     * @throws StreamException If an error occurs.
     *
     * @return string
     */
    public function read(int $length): string;

    /**
     * Seeks to $offset position in the stream.
     *
     * $whence specifies how the cursor position will be calculated based on the
     * seek offset. Valid values are identical to the built-in PHP $whence
     * values for `fseek()`.
     *
     * @throws StreamException On failure.
     */
    public function seek(int $offset, int $whence = \SEEK_SET): void;

    /**
     * Returns the current position of the file read/write pointer.
     *
     * @throws StreamException If an error occurs.
     */
    public function tell(): int;

    /**
     * Writes $string to the stream, returning the number of bytes written.
     *
     * @throws StreamException On failure.
     */
    public function write(string $string): int;
}
