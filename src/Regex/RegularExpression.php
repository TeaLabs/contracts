<?php
namespace Tea\Contracts\Regex;

interface RegularExpression extends Pattern
{

	/**
	 * Filter the given input and return only the entries that match the pattern.
	 * If invert is passed as TRUE, the elements of the input that do not match
	 * the given pattern will be returned.
	 *
	 * @param  array   $input
	 * @param  bool    $invert
	 *
	 * @return array
	*/
	public function filter(array $input, $invert = false);

	/**
	 * Determine if the given string matches the given regex pattern.
	 *
	 * @param string $subject
	 * @param int $flags
	 * @param int $offset
	 *
	 * @return bool
	 */
	public function is($subject, $flags =0, $offset = 0);


	/**
	 * Perform a regular expression match on given subject.
	 *
	 * @param string $subject
	 * @param int $flags
	 * @param int $offset
	 *
	 * @return \Tea\Regex\Result\Matches
	 */
	public function match($subject, $flags = 0, $offset = 0);

	/**
	 * Perform a global regular expression match on given subject.
	 *
	 * @param string $subject
	 * @param int $flags
	 * @param int $offset
	 *
	 * @return \Tea\Regex\Result\Matches
	 */
	public function matchAll($subject, $flags = 0, $offset = 0);

	/**
	 * Determine if the given string matches the given regex pattern.
	 *
	 * @see  \Tea\Regex\Adapter::matches()
	 *
	 * @param string $subject
	 * @param int $flags
	 * @param int $offset
	 *
	 * @return bool
	 */
	public function matches($subject, $flags =0, $offset = 0);

	/**
	 * Perform a regular expression search and replace.
	 *
	 * @param string|array|\Closure  $replacement
	 * @param string|array           $subject
	 * @param int                    $limit
	 *
	 * @return \Tea\Regex\Result\Replacement
	 */
	public function replace($replacement, $subject, $limit = -1);

	/**
	 * Perform a regular expression search and replace using a callback.
	 *
	 * @param callable        $callback
	 * @param string|array    $subject
	 * @param int             $limit
	 *
	 * @return \Tea\Regex\Result\Replacement
	 */
	public function replaceCallback(callable $callback, $subject, $limit = -1);

	/**
	 * Perform a regex search and replace. Identical to Adapter::replace()
	 * except it only returns the (possibly transformed) subjects where there
	 * was a match. Returns NULL if no matches are found regardless of whether
	 * the subject was a string or array.
	 *
	 * @param string|array           $replacement
	 * @param string|array           $subject
	 * @param int                    $limit
	 *
	 * @return \Tea\Regex\Result\Replacement|null
	*/
	public function replaced($replacement, $subject, $limit = -1);

	/**
	 * Split string using a regular expression. Returns an array containing
	 * substrings of subject split along boundaries matched by pattern.
	 *
	 * @param  string $subject
	 * @param  int $limit
	 * @param  int $flags
	 * @return array
	*/
	public function split($subject, $limit=-1, $flags =0);

}