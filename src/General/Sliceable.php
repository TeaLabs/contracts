<?php
namespace Tea\Contracts\General;

interface Sliceable
{
	/**
	 * Slice the underlying collection array.
	 *
	 * @param  int   $offset
	 * @param  int   $length
	 * @param  bool  $preserveKeys
	 * @return static
	 */
	public static function slice($offset, $length = null, $preserveKeys = false);

}
