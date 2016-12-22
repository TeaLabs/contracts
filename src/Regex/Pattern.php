<?php
namespace Tea\Contracts\Regex;

interface Pattern
{
	/**
	 * Get the regex pattern body.
	 *
	 * @return string
	 */
	public function getBody();

	/**
	 * Get the regex pattern modifiers.
	 *
	 * @return string
	 */
	public function getModifiers();

	/**
	 * Get the regex pattern delimiter.
	 *
	 * @return string
	 */
	public function getDelimiter();

	/**
	 * Get the complied value of the pattern. This should be a value that can be
	 * passed to {@see \Tea\Regex\Adapter} methods as the pattern. Most of these
	 * methods accept strings or objects that implement __toString() while some like
	 * {@see \Tea\Regex\Adapter::replace()}, {@see \Tea\Regex\Adapter::replaceCallback()}
	 * and {@see \Tea\Regex\Adapter::replaced()} also accept arrays.
	 *
	 * @return mixed
	 */
	public function compile();

	/**
	 * Cast the regex pattern object to string.
	 *
	 * @return string
	 */
	public function __toString();

	/**
	 * Add the given modifiers.
	 *
	 * @param  string|iterable   $modifiers
	 * @return void
	 */
	public function addModifiers($modifiers);

	/**
	 * Determine whether the pattern has all or any of the given modifiers.
	 * By default, this method checks if the regex has all the given modifiers.
	 * But accepts an optional $any which if set to TRUE, will return TRUE if
	 * at least one of the given modifiers is set.
	 *
	 * @param  string|iterable   $modifiers
	 * @param  bool              $any
	 * @return bool
	 */
	public function hasModifiers($modifiers, $any = false);

	/**
	 * Remove the given modifiers.
	 *
	 * @param  string|iterable   $modifiers
	 * @return void
	 */
	public function removeModifiers($modifiers);

}



