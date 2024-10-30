
(function() {
	tinymce.PluginManager.add('if_conditions', function( editor, url ) {
		editor.addButton( 'if_conditions', {
			title : if_statement_text_domain.add_new_if,//'إضافة شرط جديد',
			image : url + '/if.png',
			onclick: function() {
				editor.windowManager.open( {
					title: if_statement_text_domain.add_new_if_title_form,
					   width : 700,
					   height : 220,
					body: [
						{
							type: 'listbox',
							name: 'type_if',
							label: if_statement_text_domain.select_if_types,
							'values': [
								{text: if_statement_text_domain.if_type_custom_content_admin, value: 'current_user_can capability="administrator"'},
								{text: if_statement_text_domain.if_type_custom_content_editor, value: 'current_user_can capability="editor"'},
								{text: if_statement_text_domain.if_type_custom_content_author, value: 'current_user_can capability="author"' },
								{text: if_statement_text_domain.if_type_custom_content_contributor, value: 'current_user_can capability="contributor"' },
								{text: if_statement_text_domain.if_type_custom_content_subscriber, value: 'current_user_can capability="subscriber"'},
								{text: if_statement_text_domain.if_type_custom_content_logged_in, value: 'is_user_logged_in'},
								{text: if_statement_text_domain.if_type_custom_content_post_thumbnail, value: 'has_post_thumbnail'},
								{text: if_statement_text_domain.if_type_custom_content_comments_open, value: 'comments_open'},
								{text: if_statement_text_domain.if_type_custom_content_has_tag, value: 'has_tag'},
								{text: if_statement_text_domain.if_type_custom_content_is_attachment, value: 'is_attachment'},
								{text: if_statement_text_domain.if_type_custom_content_has_excerpt, value: 'has_excerpt'},
								{text: if_statement_text_domain.if_type_custom_content_pings_open, value: 'pings_open'},
								{text: if_statement_text_domain.if_type_custom_content_is_home, value: 'is_home'},
								{text: if_statement_text_domain.if_type_custom_content_is_rtl, value: 'is_rtl'}
							]
						},
						{
							type: 'textbox',
							multiline: true,
							name: 'content',
							label: if_statement_text_domain.centent_between_if,
							value: ''
						},
						{
							type: 'textbox',
							multiline: true,
							name: 'content_else',
							label: if_statement_text_domain.centent_between_else,
							value: ''
						},

					],
					onsubmit: function( e ) {
						editor.insertContent( '[if ' + e.data.type_if + ']'+ e.data.content + '[else]'+ e.data.content_else + '[/if]');
					}
				});
			}	
		});
	});
})();