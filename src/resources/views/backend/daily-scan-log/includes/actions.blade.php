
@if ($logged_in_user->hasAllAccess())
<x-utils.view-button :href="route('admin.daily-scan-log.show', $dailyscan)" />
<x-utils.edit-button :href="route('admin.daily-scan-log.edit', $dailyscan)" />
@endif
@if ($logged_in_user->hasAllAccess())
<x-utils.delete-button :href="route('admin.daily-scan-log.destroy', $dailyscan)" />
@endif