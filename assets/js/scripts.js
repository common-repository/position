var position_input							= jQuery('#position input');
var position_telephone						= jQuery('#position_telephone');
var position_twitter						= jQuery('#position_twitter');
var position_map_height						= jQuery('#position_map_height');

position_input.bind('blur', function(){

	if( position_telephone.length && position_telephone.val() != '' )
	{
		position_telephone.val( jQuery.trim( position_telephone.val().replace(/[^0-9\s]/g,'') ).replace( /\s\s+/g, ' ' ) );
	}

	if( position_twitter.length && position_twitter.val() != '' )
	{
		position_twitter.val( position_twitter.val().replace(/[^0-9a-zA-Z_]/g,'') );
	}

	if( position_map_height.length && position_map_height.val() != '' )
	{
		position_map_height.val( position_map_height.val().replace(/[^0-9]/g,'') );
	}

});