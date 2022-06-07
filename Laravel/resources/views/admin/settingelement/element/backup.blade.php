<form
    action="@if (isset($elementdata)){{ route('admin.setting.element.put', ['elementupdate' => $element]) }}@else{{ route('admin.setting.element.store', ['element' => $element]) }}@endif"
    method="post" enctype="multipart/form-data">
    @csrf
    {{-- @if (isset($elementdata))@method('PUT')@endif --}}
    <input type="hidden" name="name" value="{{ $element }}">
    <div class="row title-setting-element">
        <div class="col-md-6">
            <h3>
                <div class="mb-3 col-md-6">
                    <h3><b>Backup</b></h3>
                </div>
            </h3>
        </div>
    </div>

    <div class="row title-setting-element">
        <div class="col-md-12">
            <div class="mb-1 col-md-6 mt-5">
                <h4>Backups List</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3">Click on the button below to display all the backups or to make manual backups.</div>
        <div class="mb-3 col-md-12">
            <a class="btn btn-primary" href="https://demo.laraclassifier.com/admin/backups"><i
                    class="fa fa-hdd-o"></i> Go to the Backups</a>
        </div>
    </div>

    <div class="row title-setting-element">
        <div class="col-md-6">
            <div class="mb-1 col-md-6 mt-5">
                <h4>Backup Storage Disk</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="storage_disk" class="form-label custom-file-label font-size-17">Allow a WYSIWYG
                    Editor</label>
                @php $RecaptchVersion = config('backup.storage_disk') @endphp
                <select name="storage_disk" style="width: 100%"
                    class="recaptcha_version form-select select2_field select2-hidden-accessible" tabindex="-1"
                    aria-hidden="true">
                    @foreach ($RecaptchVersion as $key => $rv)
                        <option value="{{ $key }}"
                            {{ @$elementdata->storage_disk == $key ? 'selected' : '' }}>{{ $rv }}</option>
                    @endforeach
                </select>
                <div class="form-text">Cloud disk can be: <a
                        href="https://support.bedigit.com/help-center/articles/1/8/85/configuring-the-backup-storage#ftp"
                        target="_blank">ftp</a>, <a
                        href="https://support.bedigit.com/help-center/articles/1/8/85/configuring-the-backup-storage#sftp"
                        target="_blank">sftp</a>, <a
                        href="https://support.bedigit.com/help-center/articles/1/8/85/configuring-the-backup-storage#amazon-s3"
                        target="_blank">s3</a>, <a
                        href="https://support.bedigit.com/help-center/articles/1/8/85/configuring-the-backup-storage#dropbox"
                        target="_blank">dropbox</a>, <a
                        href="https://support.bedigit.com/help-center/articles/1/8/85/configuring-the-backup-storage#digitalocean"
                        target="_blank">digitalocean</a></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="disable_notifications" value="0">
                    <input type="checkbox" value="1" name="disable_notifications" class="form-check-input"
                        style="cursor: pointer;" {{ @$elementdata->disable_notifications == 1 ? 'checked' : '' }}>
                    <label class="form-check-label fw-bolder">Disable Notifications</label>
                    <div class="form-text">By unchecking the field above, notifications will be sent to
                        contact@demosite.com when a backup or a cleanup goes wrong.</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row title-setting-element">
        <div class="col-md-12">
            <div class="mb-1 col-md-6 mt-5">
                <h4>Backup Schedule</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="mb-3 col-md-12">
            <div class="card bg-light-warning rounded mb-0">
                <div class="card-body">Before using this feature, you have to:
                    <ul>
                        <li>Make sure <code>mysqldump</code> is installed on your system if the website's database need
                            to be backup.</li>
                        <li>Then, you have to set the <code>mysqldump</code>'s path in the variable
                            <code>DB_DUMP_BINARY_PATH</code> in the <strong>/.env</strong> file. (The path need to be
                            set without mentioning <code>mysqldump</code> at the end)
                        </li>
                    </ul>
                    e.g. With MAMP (on Mac OS) we can done it like that:
                    <code>DB_DUMP_BINARY_PATH=/Applications/MAMP/Library/bin/</code>.
                    <br>NOTE: The local storage's backups are available in the <code>/storage/backups</code> directory.
                </div>
            </div>
        </div>
        <div class="mb-3 col-md-12">
            <hr>
        </div>
        <div class="mb-3 col-md-12">
            You have to add <code>* * * * * /usr/bin/php /path/to/your/website/artisan schedule:run &gt;&gt; /dev/null
                2&gt;&amp;1</code> in your Cron Job tab. Click <a
                href="http://support.bedigit.com/help-center/articles/19/configuring-the-cron-job"
                target="_blank">here</a> for more information.
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="taking_backup" class="form-label custom-file-label font-size-17">Taking Backup</label>
                @php $RecaptchVersion = config('backup.taking_backup') @endphp
                <select name="taking_backup" style="width: 100%"
                    class="recaptcha_version form-select select2_field select2-hidden-accessible" tabindex="-1"
                    aria-hidden="true">
                    @foreach ($RecaptchVersion as $key => $rv)
                        <option value="{{ $key }}"
                            {{ @$elementdata->taking_backup == $key ? 'selected' : '' }}>{{ $rv }}</option>
                    @endforeach
                </select>
                <div class="form-text">Taking backup <code>daily</code>, <code>weekly</code>, <code>monthly</code>
                    or <code>yearly</code>. All website (files &amp; database) will be backup.</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="taking_backup_at" class="form-label custom-file-label font-size-17">Taking Backup</label>
                @php $RecaptchVersion = config('backup.taking_backup_at') @endphp
                <select name="taking_backup_at" style="width: 100%"
                    class="recaptcha_version form-select select2_field select2-hidden-accessible" tabindex="-1"
                    aria-hidden="true">
                    @foreach ($RecaptchVersion as $key => $rv)
                        <option value="{{ $key }}"
                            {{ @$elementdata->taking_backup_at == $key ? 'selected' : '' }}>{{ $rv }}
                        </option>
                    @endforeach
                </select>
                <div class="form-text">Run the task every Africa/Abidjan time (above) related to the selected
                    frequency.</div>
            </div>
        </div>
    </div>

    <div class="row title-setting-element">
        <div class="col-md-12">
            <div class="mb-1 col-md-6 mt-5">
                <h4>Cleaning Up Old Backups</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="mb-3 col-md-12">
            <div class="card bg-light rounded mb-0">
                <div class="card-body">
                    <h5 class="mt-0">The strategy that determine which old backups should be deleted works
                        with these rules:</h5>
                    <ol class="mb-2">
                        <li>It will never delete the latest backup regardless of its size or age</li>
                        <li>It will keep all backups for the number of days specified in <code>Keep All Backups For
                                Days</code></li>
                        <li>It will only keep daily backups for the number of days specified in <code>Keep Daily Backups
                                For Days</code> for all backups older than those covered by <code>rule #2</code></li>
                        <li>It will only keep weekly backups for the number of months specified in <code>Keep Monthly
                                Backups For Months</code> for all backups older than those covered by <code>rule
                                #3</code></li>
                        <li>It'll only keep yearly backups for the number of years specified in <code>Keep Yearly
                                Backups For Years</code> for all backups older than those covered by <code>rule
                                #4</code></li>
                        <li>It will start deleting old backups until the volume of storage used is lower than the amount
                            specified in <code>Delete Oldest Backups When Using More Megabytes Than</code>.</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="keep_all_backups_for_days" class="form-label custom-file-label font-size-17">Keep All Backups For Days</label>
                <input class="form-control custom-file-input" name="keep_all_backups_for_days" type="number" id="keep_all_backups_for_days"
                    value="@if (isset($elementdata)){{ @$elementdata->keep_all_backups_for_days }}@endif">
                <div class="form-text">The number of days for which backups must be kept.</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="keep_daily_backups_for_days" class="form-label custom-file-label font-size-17">Keep Daily Backups For Days</label>
                <input class="form-control custom-file-input" name="keep_daily_backups_for_days" type="number" id="keep_daily_backups_for_days"
                    value="@if (isset($elementdata)){{ @$elementdata->keep_daily_backups_for_days }}@endif">
                <div class="form-text">The number of days that all daily backups must be kept.</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="keep_weekly_backups_for_weeks" class="form-label custom-file-label font-size-17">Keep Weekly Backups For Weeks</label>
                <input class="form-control custom-file-input" name="keep_weekly_backups_for_weeks" type="number" id="keep_weekly_backups_for_weeks"
                    value="@if (isset($elementdata)){{ @$elementdata->keep_weekly_backups_for_weeks }}@endif">
                <div class="form-text">The number of weeks of which one weekly backup must be kept.</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="keep_monthly_backups_for_months" class="form-label custom-file-label font-size-17">Keep Monthly Backups For Months</label>
                <input class="form-control custom-file-input" name="keep_monthly_backups_for_months" type="number" id="keep_monthly_backups_for_months"
                    value="@if (isset($elementdata)){{ @$elementdata->keep_monthly_backups_for_months }}@endif">
                <div class="form-text">The number of months of which one monthly backup must be kept.</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="keep_yearly_backups_for_years" class="form-label custom-file-label font-size-17">Keep Yearly Backups For Years</label>
                <input class="form-control custom-file-input" name="keep_yearly_backups_for_years" type="number" id="keep_yearly_backups_for_years"
                    value="@if (isset($elementdata)){{ @$elementdata->keep_yearly_backups_for_years }}@endif">
                <div class="form-text">The number of years of which one yearly backup must be kept.</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="maximum_storage_in_megabytes" class="form-label custom-file-label font-size-17 w-100">Delete Oldest Backups When Using More Megabytes Than</label>
                <input class="form-control custom-file-input" name="maximum_storage_in_megabytes" type="number" id="maximum_storage_in_megabytes"
                    value="@if (isset($elementdata)){{ @$elementdata->maximum_storage_in_megabytes }}@endif">
                <div class="form-text">After cleaning up the backups remove the oldest backup until this amount of megabytes has been reached.</div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary ms-3"> Submit </button>
        </div>
    </div>
</form>
