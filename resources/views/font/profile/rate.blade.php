<style>
    button {
        padding: 8px;
    }

</style>
<table id="table" data-toggle="table" data-height="500" data-ajax="show_rate" data-pagination="true"
    data-show-refresh="true" data-search="true">
    <thead>
        <tr>
            <th data-checkbox="true" data-footer-formatter="total"></th>
            <th data-field="productimagee" data-formatter="rate_image">@lang('order.Product Image')</th>
            <th data-field="message">@lang('order.Comment')
            </th>
            <th data-field="rating" data-formatter="rate_star">@lang('order.Rating')
            </th>
            <th data-field="created_at" data-formatter="change_date_format">@lang('order.Date')</th>
            </th>
        </tr>
    </thead>
</table>
