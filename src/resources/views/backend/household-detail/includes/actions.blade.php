
@if ($logged_in_user->hasAllAccess())
<x-utils.view-button :href="route('admin.household-detail.show', $householdDetail)" />
<x-utils.edit-button :href="route('admin.household-detail.edit', $householdDetail)" />
@endif
@if ($logged_in_user->hasAllAccess())
<x-utils.delete-button :href="route('admin.household-detail.destroy', $householdDetail)" />
@endif