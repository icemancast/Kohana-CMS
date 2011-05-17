<?php

/**
 * F1 Church urls for people realm
 */

return array(

	'household_create' => '/v1/Households',
	'household_people' => '/v1/Households/{householdID}/People',
	'people_create' => '/v1/People',
	'people_edit' => '/v1/People/{id}/Edit',
	'people_show' => '/v1/People/{id} ',
	'people_update' => '/v1/People/{id}' ;
	'people_new' => '/v1/People/New' ;
	'statuses_list' => '/v1/People/Statuses',
	'householdMemberTypes_list' => '/v1/People/HouseholdMemberTypes',
	'householdMemberTypes_show' => '/v1/People/HouseholdMemberTypes/{id}',
	'people_search' => '/v1/People/Search',
	'people_address' => '/v1/People/{personID}/Addresses',
	'people_address_update' => '/v1/People/{personID}/Addresses/{id}',
	'people_communications' => '/v1/People/{id}/Communications',
	'people_communications_update' => '/v1/People/{personID}/Communications/{id}',
	'addresstypes' => '/v1/Addresses/AddressTypes',
	'communicationtypes' => '/v1/Communications/CommunicationType',

	'household_address' => '/v1/Households/{householdID}/Addresses',
	'household_address_show' => '/v1/Households/{householdID}/Addresses/{id}',

	'householdAddress_new' => '/v1/Households/{householdID}/Addresses/New',
	'householdAddress_edit' => '/v1/Households/{householdID}/Addresses/{id}/Edit',
	'householdAddress_update' => '/v1/Households/{householdID}/Addresses/{id}',
	'householdAddress_delete' => '/v1/Households/{householdID}/Addresses/{id}',
	'household_communications' => '/v1/Households/{householdID}/Communications',
	'household_communication_show' => '/v1/Households/{householdID}/Communications/{id}',

	'peopleAddress_list' => '/v1/People/{personID}/Addresses',
	'peopleAddress_show' => '/v1/People/{personID}/Addresses/{id}',
	'peopleAddress_new' => '/v1/People/{personID}/Addresses/New',
	'peopleAddress_edit' => '/v1/People/{personID}/Addresses/{id}/Edit',
	'peopleAddress_create' => '/v1/People/{personID}/Addresses',
	'peopleAddress_update' => '/v1/People/{personID}/Addresses/{id}',
	'peopleAddress_delete' => '/v1/People/{personID}/Addresses/{id}',

	'householdCommunications_list' => '/v1/Households/{householdID}/Communications',
	'householdCommunications_show' => '/v1/Households/{householdID}/Communications/{id}',
	'householdCommunications_new' => '/v1/Households/{householdID}/Communications/New',
	'householdCommunications_edit' => '/v1/Households/{householdID}/Communications/{id}/Edit',
	'householdCommunications_create' => '/v1/Households/{householdID}/Communications',
	'householdCommunications_update' => '/v1/Households/{householdID}/Communications/{id}',
	'householdCommunications_delete' => '/v1/Households/{householdID}/Communications/{id}',

	'peopleCommunications_list' => '/v1/People/{personID}/Communications',
	'peopleCommunications_show' => '/v1/People/{personID}/Communications/{id}',
	'peopleCommunications_new' => '/v1/People/{personID}/Communications/New',
	'peopleCommunications_edit' => 'v1/People/{personID}/Communications/{id}/Edit',
	'peopleCommunications_createt' => '/v1/People/{personID}/Communications',
	'peopleCommunications_update' => '/v1/People/{personID}/Communications/{id}',
	'peopleCommunications_delete' => '/v1/People/{personID}/Communications/{id}',

	'household_show' => '/v1/Households/{id}',
	'household_edit' => '/v1/Households/{id}/Edit',
	'household_new' => '/v1/Households/New',
	'household_update' => '/v1/Households/{id}',
	'household_search' => '/v1/Households/Search',

	'peopleAttributes_list' => '/v1/People/{peopleID}/Attributes',
	'peopleAttributes_show' => 'v1/People/{peopleID}/Attributes/{id}',
	'peopleAttributes_new' => '/v1/People/{peopleID}/Attributes/New',
	'peopleAttributes_edit' => '/v1/People/{peopleID}/Attributes/{id}/Edit',
	'peopleAttributes_create' => '/v1/People/{peopleID}/Attributes',
	'peopleAttributes_update' => '/v1/People/{peopleID}/Attributes/{id}',
	'peopleAttributes_delete' => '/v1/People/{peopleID}/Attributes/{id}',

	'addresstype_show' => '/v1/Addresses/AddressTypes/{id}',

	'address_show' => '/v1/Addresses/{id}',
	'address_new' => '/v1/Addresses/New',
	'address_edit' => '/v1/Addresses/{id}/Edit',
	'address_create' => '/v1/Addresses',
	'address_update' => '/v1/Addresses/{id}',
	'address_delete' => '/v1/Addresses/{id}',

	'attributeGroups_list' => '/v1/People/AttributeGroups',
	'attributeGroups_show' => '/v1/People/AttributeGroups/{id}',

	'attribute_list' => '/v1/People/AttributeGroups/{attributeGroupID}/Attributes',
	'attribute_show' => '/v1/People/AttributeGroups/{attributeGroupID}/Attributes/{id}',

	'communications_show' => '/v1/Communications/{id}',
	'communications_new' => '/v1/Communications/New',
	'communications_edit' => '/v1/Communications/{id}/Edit',
	'communications_create' => '/v1/Communications',
	'communications_update' => '/v1/Communications/{id}',
	'communications_delete' => '/v1/Communications/{id}',

	'communicationtypes_show' => '/v1/Communications/CommunicationTypes/{id}',

	'denominations_list' => '/v1/People/Denominations',
	'denominations_show' => '/v1/People/Denominations/{id}',

	'occupations_list' => '/v1/People/Occupations',
	'occupations_show' => '/v1/People/Occupations/{id}',

	'schools_list' => '/v1/People/Schools',
	'schools_show' => '/v1/People/Schools/{id}',

	'statuses_show' => '/v1/People/Statuses/{id}',

	'substatuses_list' => '/v1/People/Statuses/{statusID}/SubStatuses',
	'substatuses_show' => '/v1/People/Statuses/{statusID}/SubStatuses/{id}',

);

?>