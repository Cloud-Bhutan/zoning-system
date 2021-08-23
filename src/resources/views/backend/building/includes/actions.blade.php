
@if ($logged_in_user->hasAllAccess())
<x-utils.view-button :href="route('admin.building.show', $building)" />
<x-utils.edit-button :href="route('admin.building.edit', $building)" />
@endif
@if ($logged_in_user->hasAllAccess())
<x-utils.delete-button :href="route('admin.building.destroy', $building)" />
@endif