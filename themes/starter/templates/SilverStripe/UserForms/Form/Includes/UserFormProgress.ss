<% if $Steps.Count > 1 %>
    <div id="userform-progress" class="userform-progress" style="display:none;">
        <p><%t EditableFormStep.STEP_TITLE "Page {page}" page='<span class="current-step-number">1</span>' %> <%t EditableFormStep.STEP_LIMIT 'of <span class="total-step-number">{count}</span>' count=$Steps.Count %></p>
        <div class="progress" aria-hidden="true">
            <div class="progress-bar progress-bar-success" role="progressbar"></div>
        </div>
        <nav aria-hidden="true">
            <ul class="step-buttons mt-4">
                <% loop $Steps %>
                <li class="step-button-wrapper<% if $First %> current<% end_if %>" data-for="$Name">
                    <%-- Remove js-align class to remove javascript positioning --%>
                    <button class="btn btn-secondary rounded btn-md step-button-jump js-align" disabled="disabled" data-step="$Pos"><% if $Top.ButtonText %>$Top.ButtonText <% end_if %>$Pos</button>
                </li>
                <% end_loop %>
            </ul>
        </nav>
    </div>
    <h2 class="progress-title"></h2>
<% end_if %>
