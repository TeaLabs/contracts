<?php
namespace Tea\Contracts\General;

/**
 * Interface to provide extraction of slices of an object.
 *
 * @method  mixed slice($offset, $length = null, $preserveKeys = false)
 * 			Returns a portion of the object of size "length" starting from the
 * 			"offset" element.
 *
 * @method  mixed offsetGet($index)
 * 		Get the element at the given index or a slice of the object if the
 * 		index is in "offset:length"	format.
 * 		If the object implements \ArrayAccess, $object[2] should return the element
 * 		at index 2 while $object['2:5'] should return a slice with 2 as the offset
 * 		and 5 as the length.
 *
 * 		More Slice Examples:
 * 			$object[':5'] == $object->slice(0,5)
 * 			$object['3:'] == $object->slice(3)
 * 			$object['-5:3'] == $object->slice(-5,3)
 * 			$object['5:-3'] == $object->slice(5,-3)
*/
interface Sliceable
{
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
	 * @param  bool  $preserveKeys
	 * @return mixed
	 */
	public static function slice($offset, $length = null, $preserveKeys = false);

	/**
	 * Get the element at the given index. If the given index is a string in the format:
	 * "offset:length", "offset:" or ":length" (where "offset" and "length" are integers),
	 * a slice equivalent to calling $this->slice($offset, $length); is returned.
	 *
	 * @param  mixed $index
	 * @return mixed
	 */
	public function offsetGet($index);

}
