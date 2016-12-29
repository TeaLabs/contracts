<?php
namespace Tea\Contracts\General;

/**
 * Interface to provide extraction of slices of an object.
 *
 * If a Sliceable class implements ArrayAccess, ArrayAccess::offsetGet('2:5')
 * can be used to extract a slice by calling Sliceable::slice(2,5) with 2 as the
 * offset and 5 as the length. When implementing this, make sure the offset string
 * is valid. The regex {@see Tea\Contracts\General\Sliceable::SLICE_OFFSET_REGEX},
 * can be used to match against the offset string.
 *
 * More \ArrayAccess::offsetGet() Examples:
 *   $object[':5'] == $object->slice(0,5)
 *   $object['3:'] == $object->slice(3)
 *   $object['-5:3'] == $object->slice(-5,3)
 *   $object['5:-3'] == $object->slice(5,-3)
*/
interface Sliceable
{
	const SLICE_OFFSET_REGEX = '^(?P<offset>(?:-?[0-9]+)?)\:(?P<length>(?:-?[0-9]+)?)$';

	/**
	 * Extract a slice of the collection as specified by the offset and length.
	 *
	 * If offset is non-negative, the sequence will start at that offset in the
	 * collection. If offset is negative, the sequence will start that far from
	 * the end of the collection.
	 *
	 * If length is given and is positive, then the sequence will have up to that
	 * many elements in it. If the collection is shorter than the length, then only
	 * the available elements will be present. If length is given and is negative
	 * then the sequence will stop that many elements from the end of the collection.
	 * If it is omitted, then the sequence will have everything from offset up until
	 * the end of the collection.
	 *
	 * @param  int   $offset
	 * @param  int   $length
	 * @return mixed
	 */
	public function slice($offset, $length = null);

}
