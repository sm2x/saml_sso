<?php

$entity = elgg_extract('entity', $vars);

echo elgg_view_field([
	'#type' => 'hidden',
	'name' => 'guid',
	'value' => $entity ? $entity->guid : null,
]);

echo elgg_view_field([
	'#type' => 'text',
	'#label' => elgg_echo('title'),
	'required' => true,
	'name' => 'title',
	'value' => $entity ? $entity->title : null,
]);

if ($entity && $entity->settings) {
	echo elgg_format_element('pre', [], var_export(unserialize($entity->settings), true));
	
} else {
	echo elgg_view_field([
		'#type' => 'url',
		'#label' => elgg_echo('saml_sso:saml_idp:sso_url'),
		'required' => true,
		'name' => 'sso_url',
		'value' => $entity ? $entity->sso_url : null,
	]);
	
	echo elgg_view_field([
		'#type' => 'url',
		'#label' => elgg_echo('saml_sso:saml_idp:slo_url'),
		'name' => 'slo_url',
		'value' => $entity ? $entity->slo_url : null,
	]);
}

echo elgg_view_field([
	'#type' => 'plaintext',
	'#label' => elgg_echo('saml_sso:saml_idp:x509cert'),
	'name' => 'x509cert',
	'rows' => 3,
	'value' => $entity ? $entity->x509cert : null,
]);

echo elgg_view_field([
	'#type' => 'plaintext',
	'#label' => elgg_echo('saml_sso:saml_idp:private_key'),
	'name' => 'private_key',
	'rows' => 3,
	'value' => $entity ? $entity->private_key : null,
]);

$footer = elgg_view_field([
	'#type' => 'submit',
	'value' => elgg_echo('save'),
]);

elgg_set_form_footer($footer);
