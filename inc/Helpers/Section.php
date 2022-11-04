<?php


namespace Todo_It\Helpers;


class Section
{
	/**
	 * @var array
	 * (id : string),
	 * (title : string),
	 * (callback : callable),
	 * (page : string),
	 * (args : array),
	 */
	public array $section;

	/**
	 * @param array $section
	 * (id : string),
	 * (title : string),
	 * (callback : callable),
	 * (page : string),
	 * (args : array),
	 *
	 * @return $this
	 */
	public function setSection(array $section) : Section
	{
		$this->section = $section;

		return $this;
	}

	public function registerSection() : void
	{
		add_settings_section($this->section['id'], $this->section['title'], $this->section['callback'], $this->section['page'], $this->section['args']);
	}
}