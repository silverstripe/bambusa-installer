<form $FormAttributes  role="search">
    <div class="input-group">
        <div class="autosuggest" data-locale="$CurrentLocale">
            <input name="q" value="$Fields.dataFieldByName('q').Value.ATT" aria-label="search" type="text" class="form-control" placeholder="<%t CWP_Search.Placeholder "Search..." %>">
        </div>
        <div class="input-group-append">
            <button type="submit" class="btn btn-secondary">
                <i class="fa fa-search" aria-hidden="true"></i>
                <span class="sr-only"><%t CWP_Search.Button "Search" %></span>
            </button>
        </div>
    </div>
</form>
