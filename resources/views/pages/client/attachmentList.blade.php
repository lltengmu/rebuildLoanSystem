@foreach($data as $key => $item)
<div class="col-xl-6 mt-1">
    <div class="grid-col bg-light d-flex align-items-center justify-content-between single-attachment">
        <i class="fa fa-paperclip p-1"></i>
        <p class="m-0 ml-2 attachment-title">{{ $item["title"] }}</p>
        @if(session("_user_info.identify") == "clients")
        <a class="badge badge-light" style="cursor: pointer;float: right;">
            <i class="fa fa-trash"></i>
        </a>
        @endif
        <a class="badge badge-light" style="cursor: pointer;float: right;" attachmentID="{{$item['id']}}" onclick="_downloadAttachment(this)">
            <i class="fa fa-download"></i>
        </a>
    </div>
</div>
@endforeach