<form action="{{ route('modules::form-antrian.history') }}" method="get">
    <div class="ui item">
        <div class="ui calendar m-r-1" id="rangestart">
            <div class="ui input left icon">
                <i class="calendar icon"></i>
                <input type="text" id="created_at" name="date">
            </div>
        </div>
        <div class="item">
            <a target="_blank" class="ui button icon" rel="noopener" id="exportpdf">
                <i class='icon file pdf'></i> Export To Pdf</a>
        </div>
    </div>
</form>