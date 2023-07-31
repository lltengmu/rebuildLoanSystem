@foreach($loanTemplateList as $key=>$item)
<div class="col-xl-4 col-xxl-6 col-lg-6 col-sm-6 single-template" style="position: relative;">
    @if($item['status'] == 1)
    <div class="active">
        <i class="mdi mdi-check"></i>
    </div>
    @endif
    <div class="card mb-3">
        <img class="card-img-top img-fluid" src="{{ asset($item['template_image']) }}" alt="Card image cap">
        <div class="card-header">
            <h5 class="card-title">{{ $item["title"] }}</h5>
            <button class="btn btn-primary" loan-template="{{ $item['id'] }}" onclick="_setupTemplateContent(this)">
                <i class="mdi mdi-settings"></i>
                Setting
            </button>
        </div>
        <div class="card-body">
            <p class="card-text">{{ $item["template_text"] }}</p>
        </div>
    </div>
</div>
@endforeach