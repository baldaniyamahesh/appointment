( function( api ) {

	// Extends our custom "dentaris" section.
	api.sectionConstructor['dentaris'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );