
@if ($logged_in_user->hasAllAccess())
<x-utils.view-button :href="route('admin.all-scan-log.show', $allscan)" />
<x-utils.edit-button :href="route('admin.all-scan-log.edit', $allscan)" />
@endif
@if ($logged_in_user->hasAllAccess())
<x-utils.delete-button :href="route('admin.all-scan-log.destroy', $allscan)" />
@endif