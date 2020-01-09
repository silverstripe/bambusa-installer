<form $FormAttributes class="inline-form page-searchform form-group" role="search">
    <div class="input-group input-group-lg">
        <input id="SearchForm_SearchForm_Search"
            aria-label="<%t CWP_Search.Button "Search" %>"
            type="text"
            name="Search"
            class="text form-control searchfield form-control-lg"
            value="$SearchQuery.ATT"
            placeholder="<%t CWP_Search.Placeholder "Search..." %>"/>
        <label class="sr-only" for="SearchForm_SearchForm_Search"><%t CWP_Search.Button "Search" %></label>
        <div class="input-group-append">
            <button type="submit" class="btn btn-primary btn-lg"><%t CWP_Search.Button "Search" %></button>
        </div>
    </div>
</form>
