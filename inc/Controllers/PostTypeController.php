<?php


namespace Todo_It\Controllers;

class PostTypeController
{
	public string $postTypeName = 'todoit-post';
	public array  $postType;

	public function __construct()
	{
		$labels       = array(
			'name'                  => _x( 'Todo List', 'Post type general name', 'todo-it' ),
			'singular_name'         => _x( 'Todo', 'Post type singular name', 'todo-it' ),
			'menu_name'             => _x( 'Todo List', 'Admin Menu text', 'todo-it' ),
			'name_admin_bar'        => _x( 'Todo', 'Add New on Toolbar', 'todo-it' ),
			'add_new'               => __( 'Add New', 'todo-it' ),
			'add_new_item'          => __( 'Add New Todo', 'todo-it' ),
			'new_item'              => __( 'New Todo', 'todo-it' ),
			'edit_item'             => __( 'Edit Todo', 'todo-it' ),
			'view_item'             => __( 'View Todo', 'todo-it' ),
			'all_items'             => __( 'All Todos', 'todo-it' ),
			'search_items'          => __( 'Search Todos', 'todo-it' ),
			'parent_item_colon'     => __( 'Parent Todos:', 'todo-it' ),
			'not_found'             => __( 'No todos found.', 'todo-it' ),
			'not_found_in_trash'    => __( 'No todos found in Trash.', 'todo-it' ),
			'featured_image'        => _x( 'Todo Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'todo-it' ),
			'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'todo-it' ),
			'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'todo-it' ),
			'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'todo-it' ),
			'archives'              => _x( 'Todo archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'todo-it' ),
			'insert_into_item'      => _x( 'Insert into todos', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'todo-it' ),
			'uploaded_to_this_item' => _x( 'Uploaded to this todo', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'todo-it' ),
			'filter_items_list'     => _x( 'Filter todos list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'todo-it' ),
			'items_list_navigation' => _x( 'Todos list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'todo-it' ),
			'items_list'            => _x( 'Todos list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'todo-it' ),
		);
		$postTypeArgs = array(
			'labels'             => $labels,
			'public'             => false,
			'publicly_queryable' => false,
			'show_ui'            => true,
			'show_in_menu'       => false,
			'query_var'          => true,
			'rewrite'            => false,
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title' ),
		);

		$this->postType = $postTypeArgs;

	}

	public function saveEditor( $post_id )
	{
		if ( isset( $_POST['todo_info'] ) ) {
		    $todo_info = $_POST['todo_info'];
			$todo_info['status'] = 1;
			update_post_meta( $post_id, 'todo_info', $todo_info );
			return $post_id;
		}
		update_post_meta( $post_id, 'todo_info', ['status' => 0] );
	}

	public function registerPostType()
	{
		register_post_type( $this->postTypeName, $this->postType );


	}

	public function removeActionRow( $actions, $post )
	{
		if ( $this->postTypeName == $post->post_type ) {
			return array();
		}

		return $actions;
	}

	public function removeFormBulkActions( $actions )
	{
		return array();
	}

	public function addCustomButtonsToPostsPage( $links )
	{
		return array();
	}

	public function tableNavOptions( $which )
	{
		return array();
	}

	public function removeMonthDropdown( $disable, $post_type )
	{
		$disable = true;

		return $disable;
	}

	public function removeCheckboxesFromTable( $columns )
	{
		//unset( $columns['cb'] );
		$new_columns['is_done'] = "<th class='column-is-done'>Done</th>";
		$new_columns            = array_merge( $new_columns, $columns );

		return $new_columns;
	}

	public function addCustomCheckboxColumn( $column_id, $post_id )
	{
		echo "<td class='$column_id cell-center'><input class='c-checkbox' type='checkbox' name='is_done' data-post-id='$post_id' /></td>";
	}

	public function newPostMetaBoxes()
	{

		remove_meta_box( 'submitdiv', 'todoit-post', 'side' );
	}

	public function dequeueAutoSaveScript()
	{
		if ( $this->postTypeName == get_post_type() ) {
			wp_dequeue_script( 'autosave' );
		}
	}

	function addFieldsAfterTitle()
	{
		$cuurent_screen = get_current_screen();
		$action_value   = ( $cuurent_screen->action == 'add' ? 'Publish' : 'Update' );

		if ( $cuurent_screen->post_type === 'todoit-post' ) {
			$todo_info = get_post_meta( get_the_ID(), 'todo_info', true );
			$todo_status = 0;
			if (isset($todo_info['status']) && $todo_info['status'] == 1) {
				$todo_status = 1;
			}
			?>
            <div class="checkbox">
                <input type="checkbox" <?php checked($todo_status , 1, true ) ?> class="c-checkbox js-todo-status" name="todo_info[status]" value="1"/>
            </div>
            <div class="submit-wrap">
                <input name="original_publish" type="hidden" id="original_publish" value="' . $action_value . '">
                <input  type="submit" name="publish" id="publish"
                       class="button todoit-submit-button button-primary button-large"
                       value="<?php _e( ($cuurent_screen->action == '' ? 'Update': 'Add'), 'todo-it' ); ?>">
            </div>
			<?php
		}
	}

	public function register()
	{
		add_action( 'init', [ $this, 'registerPostType' ] );
		add_action( 'disable_months_dropdown', '__return_true', 10, 2 );
		//add_action( 'manage_posts_extra_tablenav', [ $this, 'tableNavOptions' ], 20, 1 );
		//add_filter( 'post_row_actions', [ $this, 'removeActionRow' ], 10, 2 );
		//add_filter( 'month', [ $this, 'removeActionRow' ], 10, 2 );
		//add_filter( 'bulk_actions-edit-' . $this->postTypeName, [ $this, 'removeFormBulkActions' ] );
		//add_filter( 'views_edit-' . $this->postTypeName, [ $this, 'addCustomButtonsToPostsPage' ] );
		//add_filter( 'manage_' . $this->postTypeName . '_posts_columns', [ $this, 'removeCheckboxesFromTable' ] );
		//add_action( 'manage_posts_custom_column', [ $this, 'addCustomCheckboxColumn' ], 10, 2 );
		add_action( 'admin_head', [ $this, 'newPostMetaBoxes' ] );
		add_action( 'admin_enqueue_scripts', [ $this, 'dequeueAutoSaveScript' ] );
		add_action( 'edit_form_after_title', [ $this, 'addFieldsAfterTitle' ] );
		add_action( 'save_post', [ $this, 'saveEditor' ] );
	}
}