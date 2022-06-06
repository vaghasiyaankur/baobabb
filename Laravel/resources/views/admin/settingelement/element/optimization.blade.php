<form
    action="@if (isset($elementdata)) {{ route('admin.setting.element.put', ['elementupdate' => $element]) }}@else{{ route('admin.setting.element.store', ['element' => $element]) }} @endif"
    method="post" enctype="multipart/form-data">
    @csrf
    {{-- @if (isset($elementdata)) @method('PUT') @endif --}}
    <input type="hidden" name="name" value="{{ $element }}">
    <div class="row title-setting-element">
        <div class="col-md-6">
            <h3>
                <div class="mb-3 col-md-6">
                    <h3><b>Optimization</b></h3>
                </div>
            </h3>
        </div>
    </div>

    <div class="row title-setting-element">
        <div class="col-md-12">
            <div class="mb-1 col-md-6 mt-5">
                <h4>Database Caching System</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="facebook_client_id" class="form-label custom-file-label font-size-17">Caching Driver</label>
                @php $RecaptchVersion = config('optimization.cache_driver') @endphp
                <select name="cache_driver" style="width: 100%"
                    class="recaptcha_version form-select select2_field select2-hidden-accessible" tabindex="-1"
                    aria-hidden="true">
                    @foreach ($RecaptchVersion as $key => $rv)
                        <option value="{{ $key }}"
                            {{ @$elementdata->cache_driver == $key ? 'selected' : '' }}>{{ $rv }}</option>
                    @endforeach
                </select>
                <div class="form-text">Which method should be used for storing and retrieving cached items.</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="cache_expiration" class="form-label custom-file-label font-size-17">Cache Expiration Time</label>
                <input class="form-control custom-file-input" name="cache_expiration" type="number" id="cache_expiration"
                    value="@if (isset($elementdata)){{ @$elementdata->cache_expiration }}@endif">
                <div class="form-text">Cache Expiration Time (in seconds)</div>
            </div>
        </div>
        <div class="mb-3 col-md-12">
            <div class="card text-white bg-warning rounded mb-0">
                <div class="card-body">
                    <p><strong style="font-weight: bold;">NOTE:</strong> "File" is the best option for most cases and
                        should not be changed, unless you are familiar with another cache method and have it set up on
                        the server already. Choose <strong>None</strong> as driver to disable the caching (Not
                        recommended).</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row title-setting-element">
        <div class="col-md-12">
            <div class="mb-1 col-md-6 mt-5">
                <h4>WebP Image Format</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="webp_format" value="0">
                    <input type="checkbox" value="1" name="webp_format" class="form-check-input"
                        style="cursor: pointer;" {{ @$elementdata->webp_format == 1 ? 'checked' : '' }}>
                    <label class="form-check-label fw-bolder">
                        Enable the WebP format for the listings' pictures
                    </label>
                </div>
            </div>
            <div class="form-text"><a href="https://en.wikipedia.org/wiki/WebP" target="_blank">WebP</a> is an image format (just like png and jpg), developed by Google. Images in WebP format (.webp) are generally much smaller, which makes websites faster and use less bandwidth. Depending on the image, you may get a <a href="https://developers.google.com/speed/webp" target="_blank">reduction</a> of 25% to 70% in size.
                <br>NOTE: If enabled, this format will be applied to your website's listings' images. It is important to check browsers compatibility for the <a href="https://caniuse.com/webp" target="_blank">WebP usage</a> and for the HTML <a href="https://caniuse.com/picture" target="_blank">Picture element</a> (that allow to use JPEG images as fallback when the format WebP is not supported by the browsers versions). For WebP support GD driver must be used with PHP 5 &gt;= 5.5.0 or PHP 7 in order to use <a href="http://php.net/manual/en/function.imagewebp.php" target="_blank">imagewebp()</a>. If Imagick is used, it must be compiled with <a href="https://developers.google.com/speed/webp/download" target="_blank">libwebp</a> for WebP support.</div>
        </div>
    </div>
    <div class="row title-setting-element">
        <div class="col-md-12">
            <div class="mb-1 col-md-6 mt-5">
                <h4>Memcached</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="memcached_persistent_id" class="form-label custom-file-label font-size-17">Persistent ID</label>
                <input class="form-control custom-file-input" name="memcached_persistent_id" type="text"
                    id="facebook_client_secret" id="memcached_persistent_id"
                    value="@if (isset($elementdata)){{ @$elementdata->memcached_persistent_id }}@endif">
                <div class="form-text">By default the Memcached instances are destroyed at the end of the request. To create an instance that persists between requests, use <strong>persistent_id</strong> to specify a unique ID for the instance. All instances created with the same <strong>persistent_id</strong> will share the same connection. More information <a href="http://php.net/manual/en/memcached.construct.php" target="_blank">here</a>.</div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="memcached_sasl_username" class="form-label custom-file-label font-size-17">SASL Username</label>
                <input class="form-control custom-file-input" name="memcached_sasl_username" type="text"
                    id="facebook_client_secret" id="memcached_sasl_username"
                    value="@if (isset($elementdata)){{ @$elementdata->memcached_sasl_username }}@endif">
                <div class="form-text">Username for SASL authentication support</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="memcached_sasl_password" class="form-label custom-file-label font-size-17">SASL Password</label>
                <input class="form-control custom-file-input" name="memcached_sasl_password" type="text"
                    id="facebook_client_secret" id="memcached_sasl_password"
                    value="@if (isset($elementdata)){{ @$elementdata->memcached_sasl_password }}@endif">
                <div class="form-text">Password for SASL authentication support</div>
            </div>
        </div>
    </div>
    <div class="row title-setting-element">
        <div class="col-md-12">
            <div class="mb-1 col-md-6 mt-5">
                <h4>Memcached Servers</h4>
            </div>
        </div>
    </div>  
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="memcached_servers_1_host" class="form-label custom-file-label font-size-17">Server #1 Host</label>
                <input class="form-control custom-file-input" name="memcached_servers_1_host" type="text"
                    id="facebook_client_secret" id="memcached_servers_1_host"
                    value="@if (isset($elementdata)){{ @$elementdata->memcached_servers_1_host }}@endif">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="memcached_servers_1_port" class="form-label custom-file-label font-size-17">Server #1 Port</label>
                <input class="form-control custom-file-input" name="memcached_servers_1_port" type="number"
                    id="facebook_client_secret" id="memcached_servers_1_port"
                    value="@if (isset($elementdata)){{ @$elementdata->memcached_servers_1_port }}@endif">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="memcached_servers_2_host" class="form-label custom-file-label font-size-17">Server #2 Host (Optional)</label>
                <input class="form-control custom-file-input" name="memcached_servers_2_host" type="text"
                    id="facebook_client_secret" id="memcached_servers_2_host"
                    value="@if (isset($elementdata)){{ @$elementdata->memcached_servers_2_host }}@endif">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="memcached_servers_2_port" class="form-label custom-file-label font-size-17">Server #2 Port (Optional)</label>
                <input class="form-control custom-file-input" name="memcached_servers_2_port" type="number"
                    id="facebook_client_secret" id="memcached_servers_2_port"
                    value="@if (isset($elementdata)){{ @$elementdata->memcached_servers_2_port }}@endif">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="memcached_servers_1_host" class="form-label custom-file-label font-size-17">Server #3 Host (Optional)</label>
                <input class="form-control custom-file-input" name="memcached_servers_3_host" type="text"
                    id="memcached_servers_3_host" id="memcached_servers_3_host"
                    value="@if (isset($elementdata)){{ @$elementdata->memcached_servers_3_host }}@endif">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="memcached_servers_3_port" class="form-label custom-file-label font-size-17">Server #3 Port (Optional)</label>
                <input class="form-control custom-file-input" name="memcached_servers_3_port" type="number"
                    id="facebook_client_secret" id="memcached_servers_3_port"
                    value="@if (isset($elementdata)){{ @$elementdata->memcached_servers_3_port }}@endif">
            </div>
        </div>
    </div> 

    <div class="row title-setting-element">
        <div class="col-md-12">
            <div class="mb-1 col-md-6 mt-5">
                <h4>Redis</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="facebook_client_id" class="form-label custom-file-label font-size-17">Caching Driver</label>
                @php $RecaptchVersion = config('optimization.redis_client') @endphp
                <select name="redis_client" style="width: 100%"
                    class="recaptcha_version form-select select2_field select2-hidden-accessible" tabindex="-1"
                    aria-hidden="true">
                    @foreach ($RecaptchVersion as $key => $rv)
                        <option value="{{ $key }}"
                            {{ @$elementdata->redis_client == $key ? 'selected' : '' }}>{{ $rv }}</option>
                    @endforeach
                </select>
                <div class="form-text">Using <a href="https://github.com/phpredis/phpredis" target="_blank">PhpRedis</a> as Redis client requires its PHP extension to be installed via PECL. The extension is more complex to install but may yield better performance for applications that make heavy use of Redis.</div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="redis_cluster_activation" value="0">
                    <input type="checkbox" value="1" name="redis_cluster_activation" class="form-check-input"
                        style="cursor: pointer;" {{ @$elementdata->redis_cluster_activation == 1 ? 'checked' : '' }}>
                    <label class="form-check-label fw-bolder">Use Cluster</label>
                </div>
            </div>
            <div class="form-text">By enabling this option you have to provide the cluster(s) information below.</div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="facebook_client_id" class="form-label custom-file-label font-size-17">Caching Driver</label>
                @php $RecaptchVersion = config('optimization.redis_cluster') @endphp
                <select name="redis_cluster" style="width: 100%"
                    class="recaptcha_version form-select select2_field select2-hidden-accessible" tabindex="-1"
                    aria-hidden="true">
                    @foreach ($RecaptchVersion as $key => $rv)
                        <option value="{{ $key }}"
                            {{ @$elementdata->redis_cluster == $key ? 'selected' : '' }}>{{ $rv }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row title-setting-element">
        <div class="col-md-12">
            <div class="mb-1 col-md-6 mt-5">
                <h4>Redis Server (Unused if Cluster is used)</h4>
            </div>
        </div>
    </div>  
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="redis_host" class="form-label custom-file-label font-size-17">Host</label>
                <input class="form-control custom-file-input" name="redis_host" type="text"
                    id="facebook_client_secret" id="redis_host"
                    value="@if (isset($elementdata)){{ @$elementdata->redis_host }}@endif">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="redis_password" class="form-label custom-file-label font-size-17">Password</label>
                <input class="form-control custom-file-input" name="redis_password" type="text"
                    id="facebook_client_secret" id="redis_password"
                    value="@if (isset($elementdata)){{ @$elementdata->redis_password }}@endif">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="redis_port" class="form-label custom-file-label font-size-17">Port</label>
                <input class="form-control custom-file-input" name="redis_port" type="number"
                    id="facebook_client_secret" id="redis_port"
                    value="@if (isset($elementdata)){{ @$elementdata->redis_port }}@endif">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="redis_database" class="form-label custom-file-label font-size-17">Database</label>
                <input class="form-control custom-file-input" name="redis_database" type="text"
                    id="facebook_client_secret" id="redis_database"
                    value="@if (isset($elementdata)){{ @$elementdata->redis_database }}@endif">
            </div>
        </div>
    </div>
    <div class="row title-setting-element">
        <div class="col-md-12">
            <div class="mb-1 col-md-6 mt-5">
                <h4>Redis Clusters (Unused if Cluster is not used)</h4>
            </div>
        </div>
    </div>  
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="redis_cluster_1_host" class="form-label custom-file-label font-size-17">Cluster #1 Host</label>
                <input class="form-control custom-file-input" name="redis_cluster_1_host" type="text"
                    id="facebook_client_secret" id="redis_cluster_1_host"
                    value="@if (isset($elementdata)){{ @$elementdata->redis_cluster_1_host }}@endif">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="redis_cluster_1_password" class="form-label custom-file-label font-size-17">Cluster #1 Password</label>
                <input class="form-control custom-file-input" name="redis_cluster_1_password" type="text"
                    id="facebook_client_secret" id="redis_cluster_1_password"
                    value="@if (isset($elementdata)){{ @$elementdata->redis_cluster_1_password }}@endif">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="redis_cluster_1_port" class="form-label custom-file-label font-size-17">Cluster #1 Port</label>
                <input class="form-control custom-file-input" name="redis_cluster_1_port" type="number"
                    id="facebook_client_secret" id="redis_cluster_1_port"
                    value="@if (isset($elementdata)){{ @$elementdata->redis_cluster_1_port }}@endif">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="redis_cluster_1_database" class="form-label custom-file-label font-size-17">Cluster #1 Database</label>
                <input class="form-control custom-file-input" name="redis_cluster_1_database" type="text"
                    id="facebook_client_secret" id="redis_cluster_1_database"
                    value="@if (isset($elementdata)){{ @$elementdata->redis_cluster_1_database }}@endif">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="redis_cluster_2_host" class="form-label custom-file-label font-size-17">Cluster #2 Host (Optional)</label>
                <input class="form-control custom-file-input" name="redis_cluster_2_host" type="text"
                    id="facebook_client_secret" id="redis_cluster_2_host"
                    value="@if (isset($elementdata)){{ @$elementdata->redis_cluster_2_host }}@endif">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="redis_cluster_2_password" class="form-label custom-file-label font-size-17">Cluster #2 Password (Optional)</label>
                <input class="form-control custom-file-input" name="redis_cluster_2_password" type="text"
                    id="facebook_client_secret" id="redis_cluster_2_password"
                    value="@if (isset($elementdata)){{ @$elementdata->redis_cluster_2_password }}@endif">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="redis_cluster_2_port" class="form-label custom-file-label font-size-17">Cluster #2 Port (Optional)</label>
                <input class="form-control custom-file-input" name="redis_cluster_2_port" type="number"
                    id="facebook_client_secret" id="redis_cluster_2_port"
                    value="@if (isset($elementdata)){{ @$elementdata->redis_cluster_2_port }}@endif">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="redis_cluster_2_database" class="form-label custom-file-label font-size-17">Cluster #2 Database (Optional)</label>
                <input class="form-control custom-file-input" name="redis_cluster_2_database" type="text"
                    id="facebook_client_secret" id="redis_cluster_2_database"
                    value="@if (isset($elementdata)){{ @$elementdata->redis_cluster_2_database }}@endif">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="redis_cluster_3_host" class="form-label custom-file-label font-size-17">Cluster #3 Host (Optional)</label>
                <input class="form-control custom-file-input" name="redis_cluster_3_host" type="text"
                    id="facebook_client_secret" id="redis_cluster_3_host"
                    value="@if (isset($elementdata)){{ @$elementdata->redis_cluster_3_host }}@endif">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="redis_cluster_3_password" class="form-label custom-file-label font-size-17">Cluster #3 Password (Optional)</label>
                <input class="form-control custom-file-input" name="redis_cluster_3_password" type="text"
                    id="facebook_client_secret" id="redis_cluster_3_password"
                    value="@if (isset($elementdata)){{ @$elementdata->redis_cluster_3_password }}@endif">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="redis_cluster_3_port" class="form-label custom-file-label font-size-17">Cluster #3 Port (Optional)</label>
                <input class="form-control custom-file-input" name="redis_cluster_3_port" type="number"
                    id="facebook_client_secret" id="redis_cluster_3_port"
                    value="@if (isset($elementdata)){{ @$elementdata->redis_cluster_3_port }}@endif">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="redis_cluster_3_database" class="form-label custom-file-label font-size-17">Cluster #3 Database (Optional)</label>
                <input class="form-control custom-file-input" name="redis_cluster_3_database" type="text"
                    id="facebook_client_secret" id="redis_cluster_3_database"
                    value="@if (isset($elementdata)){{ @$elementdata->redis_cluster_3_database }}@endif">
            </div>
        </div>
    </div>
    <div class="row title-setting-element">
        <div class="col-md-12">
            <div class="mb-1 col-md-6 mt-5">
                <h4>Lazy Loading</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="lazy_loading_activation" value="0">
                    <input type="checkbox" value="1" name="lazy_loading_activation" class="form-check-input"
                        style="cursor: pointer;" {{ @$elementdata->lazy_loading_activation == 1 ? 'checked' : '' }}>
                    <label class="form-check-label fw-bolder">Enable Lazy Loading</label>
                </div>
            </div>
            <div class="form-text">Improve some pages speed be enabling the Lazy Loading option for the listings images and decrease the bandwidth consumption.
                <br>NOTE: This option can be only applied on listings images except bxSlider Carousels.</div>
        </div>
    </div>
    <div class="row title-setting-element">
        <div class="col-md-12">
            <div class="mb-1 col-md-6 mt-5">
                <h4>HTML Minification</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <div class="form-check form-switch" style="margin-top: 30px;">
                    <input type="hidden" name="minify_html_activation" value="0">
                    <input type="checkbox" value="1" name="minify_html_activation" class="form-check-input"
                        style="cursor: pointer;" {{ @$elementdata->minify_html_activation == 1 ? 'checked' : '' }}>
                    <label class="form-check-label fw-bolder">Enable HTML Minify</label>
                </div>
            </div>
            <div class="form-text">Remove unnecessary characters in the generated HTML source code.
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary ms-3"> Submit </button>
        </div>
    </div>
</form>
