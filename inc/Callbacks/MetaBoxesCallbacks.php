<?php


namespace Todo_It\Callbacks;


class MetaBoxesCallbacks
{

	public static function todoItMetaBox()
	{
	    $todo_info = get_post_meta( get_the_ID(), 'todo_info', true );
	    $todo_status = 0;
	    if (isset($todo_info['status']) && $todo_info['status'] == 1) {
		    $todo_status = 1;
        }
		?>
        <label for="todo-status">
            <input id="todo-status" <?php checked($todo_status , 1, true ) ?>
                   type="checkbox" class="c-checkbox js-todo-status" name="todo_info[status]" value="1">
            Status</label>
		<?php
	}
}