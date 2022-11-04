<?php


namespace Todo_It\Helpers;


class Field
{
	public array $field;

	/**
	 * @param array $field
	 * (id : string),
	 * (title : string),
	 * (callback : callable),
	 * (page : string),
	 * (section : string),
	 * (args : array),
	 *
	 * @return $this
	 */
	public function setField( $field ): Field
	{
		$this->field = $field;

		return $this;
	}

	public function registerField(): void
	{
		add_settings_field( $this->field['id'], $this->field['title'], $this->field['callback'], $this->field['page'], $this->field['section'], $this->field['args'] );
	}
}